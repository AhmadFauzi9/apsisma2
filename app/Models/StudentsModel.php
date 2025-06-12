<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table = "students";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'nisn', 'fullname', 'gender', 'tempatLahir', 'tanggalLahir', 'kelas', 'bagian', 'asrama', 'kode', 'angkatan', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'dusun', 'kodePos', 'namaAyah', 'namaIbu', 'nomorHp', 'user_img', 'status'];


    // Pesan Validasi register
    // ------------------------------------------------------------------------------
    protected $registerStudentsAlert =
    [
        'username' => [
            'rules'     => 'required|integer|min_length[6]|max_length[6]|is_unique[students.username]',
            'errors'    => [
                'required'      => 'NIS harus diisi dong!',
                'integer'       => 'NIS harus berupa angka dong',
                'min_length'    => 'Minimal 6 karakter dong!',
                'max_length'    => 'Maksimal 6 karakter dong!',
                'is_unique'     => 'NIS sudah digunakan dong!'
            ]
        ],
        'password' => [
            'rules'     => 'required|matches[username]',
            'errors'    => [
                'required'      => 'Isi passwordnya dong!',
                'matches'       => 'Password tidak sesuai NIS dong!',
            ]
        ],
        'fullname'  => [
            'rules'     => 'required|min_length[4]|max_length[100]',
            'errors'    => [
                'required'      => 'Nama Lengkap harus diisi dong!',
                'min_length'    => 'Minimal 4 karakter dong!',
                'max_length'    => 'Maksimal 100 karakter dong!',
            ]
        ],
        'kelas'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Kelas harus diisi dong!',
            ]
        ],
        'bagian'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Bagian harus diisi dong!',
            ],
        ],
        'gender'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Pilih jenis kelamin dong!',
            ]
        ],
        'tempatLahir'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Isi tempat lahirnya dong!',
            ]
        ],
        'tanggalLahir'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Isi tanggal lahirnya dong!',
            ]
        ]
    ];


    // Pesan Validasi Edit Detail Siswa
    // ------------------------------------------------------------------------------
    protected $editStudents =
    [
        'fullname'  => [
            'rules'     => 'required|min_length[4]|max_length[100]',
            'errors'    => [
                'required'      => 'Nama Lengkap harus diisi dong!',
                'min_length'    => 'Minimal 4 karakter dong!',
                'max_length'    => 'Maksimal 100 karakter dong!',
            ]
        ],
        'kelas'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Kelas harus diisi dong!',
            ]
        ],
        'bagian'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Bagian harus diisi dong!',
            ],
        ],
        'gender'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Pilih jenis kelamin dong!',
            ]
        ],
        'tempatLahir'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Isi tempat lahirnya dong!',
            ]
        ],
        'tanggalLahir'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Isi tanggal lahirnya dong!',
            ]
        ]
    ];


    // hasil inputan absen yang tampil di user siswa
    // ------------------------------------------------------------------------------
    public function hasilAbsen($id)
    {
        $getdata        = $this->Absensi->dataAbsen($id);
        $data = [
            'judul'         => "Absen Siswa",
            'dataStudents'  => $getdata,
        ];
        return view('siswa/absensi', $data);
    }


    // Ambil data hanya kelas vii
    // ------------------------------------------------------------------------------
    public function kelas7()
    {
        $builder = $this->table('students');
        $getdata = $builder->getWhere(['kelas' => 'vii']);
        return $getdata->getResult();
    }


    // Ambil isi field {bagian} dari tabel students
    // ------------------------------------------------------------------------------
    public function bagian()
    {
        $builder = $this->db->table('students');
        $getdata = $builder->select('bagian');
        dd($getdata->get()->getResult());
        return $getdata->get()->getResult();
    }


    // Search Siswa All Class
    // ------------------------------------------------------------------------------
    public function Search($keyword_siswa)
    {
        // "SELECT CONCAT (kelas, ' - ', bagian) AS kelas_bagian FROM students"

        return $this->table('students')->like('username', $keyword_siswa)->orLike('fullname', $keyword_siswa)->orLike('kelas', $keyword_siswa)->orLike('bagian', $keyword_siswa);
    }


    function SearchAndDisplay($keyword = null, $start = 0, $length = 0)
    {
        $builder = $this->table('students');
        if ($keyword) {
            $arr_keyword = explode(" ", $keyword);
            for ($x = 0; $x < count($arr_keyword); $x++) {
                $builder = $builder->orLike('username', $arr_keyword[$x]);
                $builder = $builder->orLike('fullname', $arr_keyword[$x]);
                $builder = $builder->orLike('gender', $arr_keyword[$x]);
                $builder = $builder->orLike('kelas', $arr_keyword[$x]);
                $builder = $builder->orLike('bagian', $arr_keyword[$x]);
                $builder = $builder->orLike('asrama', $arr_keyword[$x]);
                $builder = $builder->orLike('kode', $arr_keyword[$x]);
                $builder = $builder->orLike('status', $arr_keyword[$x]);
            }
        }
        if ($start != 0 or $length != 0) {
            $builder = $builder->limit($length, $start);
        }
        return $builder->orderBy('username')->get()->getResult();
    }


    // Search Siswa Class 7
    // ------------------------------------------------------------------------------
    public function Search_kelas_7($keyword_siswa)
    {
        return $this->table('students')->where('kelas', 'vii')->like('username', $keyword_siswa)->orLike('fullname', $keyword_siswa);
    }


    // Search Siswa Class 8
    // ------------------------------------------------------------------------------
    public function Search_kelas_8($keyword_siswa)
    {
        return $this->table('students')->where('kelas', 'viii')->like('username', $keyword_siswa)->orLike('fullname', $keyword_siswa);
    }


    // Search Siswa Class 9
    // ------------------------------------------------------------------------------
    public function Search_kelas_9($keyword_siswa)
    {
        return $this->table('students')->where('kelas', 'ix')->like('username', $keyword_siswa)->orLike('fullname', $keyword_siswa);
    }
}
