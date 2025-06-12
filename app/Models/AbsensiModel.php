<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = "absensi";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'username', 'fullname', 'kelas', 'bagian', 'tanggal', 'absen', 'keterangan'];

    // pesan validasi insert absen
    // ------------------------------------------------------------------------------
    protected $inputAbsenAlert = [
        'tanggal' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'Tanggal wajib diisi dong!',
            ]
        ],
        'pilih_kelas' => [
            'rules'     => 'required',
            'errors'    => [
                'required'  => 'Pilih kelas dulu dong!'
            ]
        ],
        'pilih_bagian' => [
            'rules' => 'required',
            'errors'    => [
                'required'  => 'Pilih Bagian juga dong!'
            ]
        ]
    ];


    // Ambil isi field dari kolom yang di pilih (select()) dari tabel students
    // ------------------------------------------------------------------------------
    public function dataAbsen($username)
    {
        $builder = $this->db->table('absensi');
        $getdata = $builder->select(['username', 'fullname', 'kelas', 'bagian', 'tanggal', 'absen'])->where('username', $username);
        return $getdata->get()->getResult();
    }


    public function input($data)
    {
        $this->db->table('absensi')->insert($data);
    }


    public function Search($keyword_absen)
    {
        return $this->table('absensi')->like('fullname', $keyword_absen)->orLike('username', $keyword_absen)->orLike('tanggal', $keyword_absen);
    }
}
