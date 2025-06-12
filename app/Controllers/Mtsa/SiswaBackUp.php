<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;
use App\Models\KelasBagianModel;
use App\Models\KelasModel;
use App\Models\BagianModel;

class Siswa extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;
    protected $KelasBagian;
    protected $Kelas;
    protected $Bagian;

    public function __construct()
    {
        $this->Admins   = new AdminsModel();
        $this->Teachers = new TeachersModel();
        $this->Students = new StudentsModel();
        $this->Absensi  = new AbsensiModel();
        $this->KelasBagian  = new KelasBagianModel();
    }


    // index
    // ----------------------------------------------------------------------------------
    public function index()
    {
        return view('siswa/index');
    }


    // Profile
    // -------------------------------------------------------------------------------
    public function profile($id)
    {
        $daftar_hari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];
        $bulan = [
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $getdata = $this->Students->where('id', $id)->first();
        $data = [
            'judul'        => "User Siswa",
            'hari'          => $daftar_hari,
            'bulan'         => $bulan,
            'dataStudent'  => $getdata
        ];
        return view('siswa/profile', $data);
    }


    // Detail
    // -------------------------------------------------------------------------------
    public function detail($username)
    {
        $daftar_hari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];
        $bulan = [
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $getdata = $this->Students->find($username);
        $data = [
            'judul'         => "Detail Siswa",
            'hari'          => $daftar_hari,
            'bulan'         => $bulan,
            'dataStudent'   => $getdata,
            'firstname'     => @explode(" ", $getdata->fullname),
        ];
        return view('siswa/profile', $data);
    }


    // Pilih kelas
    // -------------------------------------------------------------------------------
    public function pilih_kelas()
    {
        // Ambil parameter 'pilih_kelas' di view userSiswa
        $kelas       = $this->request->getVar('pilih_kelas');
        $bagian      = $this->request->getVar('pilih_bagian');

        // Option Box / Combo Box
        $kabeh_kelas    = 'all';
        $kabeh_bagian   = 'all';
        $list_kelas     = $this->Kelas->findColumn('kelas');
        $list_bagian    = $this->Bagian->findColumn('bagian');

        if ($kelas == $kabeh_kelas && $bagian !== $kabeh_bagian) {
            // Pilih semua kelas bagian tertentu
            $pilih_bagianTok  = $this->Students->getWhere(['bagian' => $bagian])->getResult();
            $data = [
                'judul'         => "User Siswa",
                'dataStudents'  => $pilih_bagianTok,
                'dataKelas'     => $list_kelas,
                'dataBagian'    => $list_bagian,
                'kabeh_kelas'   => $kabeh_kelas,
                'kabeh_bagian'  => $kabeh_bagian,
            ];
            return view('siswa/userSiswa', $data);
            // ------------------------------------------------------------------------------
        } elseif ($kelas !== $kabeh_kelas && $bagian == $kabeh_bagian) {
            // Pilih kelas tertentu Semua bagian
            $pilih_kelasTok      = $this->Students->getWhere(['kelas' => $kelas])->getResult();
            $data = [
                'judul'         => "User Siswa",
                'dataStudents'  => $pilih_kelasTok,
                'dataKelas'     => $list_kelas,
                'dataBagian'    => $list_bagian,
                'kabeh_kelas'   => $kabeh_kelas,
                'kabeh_bagian'  => $kabeh_bagian,
            ];
            return view('siswa/userSiswa', $data);
            // ------------------------------------------------------------------------------
        } elseif ($kelas !== $kabeh_kelas && $bagian !== $kabeh_bagian) {
            // Pilih kelas Pilih bagian
            $pilih_kelasBagian      = $this->Students->getWhere(['kelas' => $kelas, 'bagian' => $bagian])->getResult();
            $data = [
                'judul'         => "User Siswa",
                'dataStudents'  => $pilih_kelasBagian,
                'dataKelas'     => $list_kelas,
                'dataBagian'    => $list_bagian,
                'kabeh_kelas'   => $kabeh_kelas,
                'kabeh_bagian'  => $kabeh_bagian,
            ];
            return view('siswa/userSiswa', $data);
            // ------------------------------------------------------------------------------
        } else {
            // Tidak Pilih kelas Tidak pilih Bagian
            $semua_kelas  = $this->Students->get()->getResult();
            $data = [
                'judul'         => "User Siswa",
                'dataStudents'  => $semua_kelas,
                'dataKelas'     => $list_kelas,
                'dataBagian'    => $list_bagian,
                'kabeh_kelas'   => $kabeh_kelas,
                'kabeh_bagian'  => $kabeh_bagian,
            ];
            return view('siswa/userSiswa', $data);
        }
    }


    // User Siswa
    // -------------------------------------------------------------------------------
    public function userSiswa()
    {
        $kabeh_kelas    = "all";
        $kabeh_bagian   = "all";
        $list_kelas     = $this->Kelas->findColumn('kelas');
        $list_bagian    = $this->Bagian->findColumn('bagian');
        $getdata        = $this->Students->get();
        $jumlahSiswa    = $this->Students->Select('username')->countAllResults();
        $siswa_aktif    = $this->Students->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('status', 'boyong')->countAllResults();
        $query          = $getdata->getResult();
        $data = [
            'judul'         => "User Siswa",
            'dataStudents'  => $query,
            'dataKelas'     => $list_kelas,
            'dataBagian'    => $list_bagian,
            'kabeh_kelas'   => $kabeh_kelas,
            'kabeh_bagian'  => $kabeh_bagian,
            'jumlahSiswa'   => $jumlahSiswa,
            'siswa_aktif'   => $siswa_aktif,
            'siswa_boyong'  => $siswa_boyong
        ];
        return view('siswa/userSiswa', $data);
    }


    // User Siswa kelas 7
    // -------------------------------------------------------------------------------
    public function KelasTujuh()
    {
        $kabeh_bagian   = "all";
        $list_bagian    = $this->Bagian->findColumn('bagian');

        // Pilih hanya kelas 7
        $getdata        = $this->Students->getWhere(['kelas' => 'vii']);
        $query          = $getdata->getResult();
        $jumlahSiswaTujuh    = $this->Students->where('kelas', 'vii')->countAllResults();
        $siswa_aktif    = $this->Students->where('kelas', 'vii')->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('kelas', 'vii')->where('status', 'boyong')->countAllResults();
        $data = [
            'judul'         => "User Siswa Kelas 7",
            'dataStudents'  => $query,
            'dataBagian'    => $list_bagian,
            'kabeh_bagian'  => $kabeh_bagian,
            'jumlahSiswaTujuh'  => $jumlahSiswaTujuh,
            'siswa_aktif'   => $siswa_aktif,
            'siswa_boyong'  => $siswa_boyong
        ];
        return view('siswa/KelasTujuh', $data);
    }


    // Pilih  bagian atau kode kelas 7
    // -------------------------------------------------------------------------------
    public function pilih_bagianTujuh()
    {
        // Ambil parameter 'pilih_kelas' di view userSiswa
        $option_bagian = $this->request->getVar('pilih_bagian');

        $kabeh_bagian        = "all";
        // panggil bagian A-N untuk selec option/combo box
        $data_bagian         = $this->Bagian->select('bagian')->where('bagian', $option_bagian);
        $list_bagian         = $data_bagian->get()->getResult();
        $pilihan_bagian      = $this->Bagian->findColumn('bagian');

        // Kelas 7 Semua Bagian
        $kelas7_semuaBagian  = $this->Students->where('kelas', 'vii');
        $query               = $kelas7_semuaBagian->get()->getResult();

        foreach ($list_bagian as $bagian) :
            foreach ($bagian as $kode) :
                // -------------------------------------------------------------------------------
                if ($option_bagian == $kode) :

                    $kelas_bagian       = $this->Students->getWhere(['kelas' => 'vii', 'bagian' => $option_bagian]);
                    $hasil_kelasBagian  = $kelas_bagian->getResult();

                    $data = [
                        'judul'         => "User Siswa Kelas 7",
                        'dataStudents'  => $hasil_kelasBagian,
                        'dataBagian'    => $pilihan_bagian,
                        'kabeh_bagian'  => $kabeh_bagian
                    ];
                    return view('siswa/KelasTujuh', $data);
                // -------------------------------------------------------------------------------
                endif;
            endforeach;
        // -------------------------------------------------------------------------------
        endforeach;
        if ($option_bagian == $kabeh_bagian) {

            $data = [
                'judul'         => "User Siswa Kelas 7",
                'dataStudents'  => $query,
                'dataBagian'    => $pilihan_bagian,
                'kabeh_bagian'  => $kabeh_bagian
            ];
            return view('siswa/KelasTujuh', $data);
        }
    }


    // User Siswa kelas 8
    // -------------------------------------------------------------------------------
    public function KelasDelapan()
    {
        $kabeh_bagian   = "all";
        $list_bagian    = $this->Bagian->findColumn('bagian');

        // Pilih hanya kelas 8
        $getdata        = $this->Students->getWhere(['kelas' => 'viii']);
        $query          = $getdata->getResult();
        $jumlahSiswaDelapan = $this->Students->where('kelas', 'viii')->countAllResults();
        $siswa_aktif    = $this->Students->where('kelas', 'viii')->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('kelas', 'viii')->where('status', 'boyong')->countAllResults();
        $data = [
            'judul'         => "User Siswa Kelas 8",
            'dataStudents'  => $query,
            'dataBagian'    => $list_bagian,
            'kabeh_bagian'  => $kabeh_bagian,
            'jumlahSiswaDelapan' => $jumlahSiswaDelapan,
            'siswa_aktif'   => $siswa_aktif,
            'siswa_boyong'  => $siswa_boyong
        ];
        return view('siswa/KelasDelapan', $data);
    }


    // Pilih  bagian atau kode kelas 8
    // -------------------------------------------------------------------------------
    public function pilih_bagianDelapan()
    {
        // Ambil parameter 'pilih_kelas' di view userSiswa
        $option_bagian = $this->request->getVar('pilih_bagian');

        $kabeh_bagian        = "all";
        // panggil bagian A-L untuk selec option/combo box
        $data_bagian         = $this->Bagian->select('bagian')->where('bagian', $option_bagian);
        $list_bagian         = $data_bagian->get()->getResult();
        $pilihan_bagian      = $this->Bagian->findColumn('bagian');

        // Kelas 8 Semua Bagian
        $kelas8_semuaBagian  = $this->Students->where('kelas', 'viii');
        $query               = $kelas8_semuaBagian->get()->getResult();

        foreach ($list_bagian as $bagian) :
            foreach ($bagian as $kode) :
                // -------------------------------------------------------------------------------
                if ($option_bagian == $kode) :

                    $kelas_bagian       = $this->Students->getWhere(['kelas' => 'viii', 'bagian' => $option_bagian]);
                    $hasil_kelasBagian  = $kelas_bagian->getResult();
                    $data = [
                        'judul'         => "User Siswa Kelas 8",
                        'dataStudents'  => $hasil_kelasBagian,
                        'dataBagian'    => $pilihan_bagian,
                        'kabeh_bagian'  => $kabeh_bagian
                    ];
                    return view('siswa/KelasDelapan', $data);
                // -------------------------------------------------------------------------------
                endif;
            endforeach;
        // -------------------------------------------------------------------------------
        endforeach;
        if ($option_bagian == $kabeh_bagian) {

            $data = [
                'judul'         => "User Siswa Kelas 8",
                'dataStudents'  => $query,
                'dataBagian'    => $pilihan_bagian,
                'kabeh_bagian'  => $kabeh_bagian
            ];
            return view('siswa/KelasDelapan', $data);
        }
    }


    // User Siswa kelas 9
    // -------------------------------------------------------------------------------
    public function KelasSembilan()
    {
        $kabeh_bagian   = "all";
        $list_bagian    = $this->Bagian->findColumn('bagian');


        // Pilih hanya kelas 9
        $getdata        = $this->Students->getWhere(['kelas' => 'ix']);
        $query          = $getdata->getResult();
        $jumlahSiswaSembilan = $this->Students->where('kelas', 'ix')->countAllResults();
        $siswa_aktif    = $this->Students->where('kelas', 'ix')->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('kelas', 'ix')->where('status', 'boyong')->countAllResults();
        $data = [
            'judul'         => "User Siswa Kelas 9",
            'dataStudents'  => $query,
            'dataBagian'    => $list_bagian,
            'kabeh_bagian'  => $kabeh_bagian,
            'jumlahSiswaSembilan' => $jumlahSiswaSembilan,
            'siswa_aktif'   => $siswa_aktif,
            'siswa_boyong'  => $siswa_boyong
        ];
        return view('siswa/KelasSembilan', $data);
    }


    // Pilih  bagian atau kode kelas 9
    // -------------------------------------------------------------------------------
    public function pilih_bagianSembilan()
    {
        // Ambil parameter 'pilih_kelas' di view userSiswa
        $option_bagian = $this->request->getVar('pilih_bagian');

        $kabeh_bagian        = "all";
        // panggil bagian A-J untuk selec option/combo box
        $data_bagian         = $this->Bagian->select('bagian')->where('bagian', $option_bagian);
        $list_bagian         = $data_bagian->get()->getResult();
        $pilihan_bagian      = $this->Bagian->findColumn('bagian');

        // Kelas 9 Semua Bagian
        $kelas8_semuaBagian  = $this->Students->where('kelas', 'ix');
        $query               = $kelas8_semuaBagian->get()->getResult();

        foreach ($list_bagian as $bagian) :
            foreach ($bagian as $kode) :
                // -------------------------------------------------------------------------------
                if ($option_bagian == $kode) :

                    $kelas_bagian       = $this->Students->getWhere(['kelas' => 'ix', 'bagian' => $option_bagian]);
                    $hasil_kelasBagian  = $kelas_bagian->getResult();
                    $data = [
                        'judul'         => "User Siswa Kelas 9",
                        'dataStudents'  => $hasil_kelasBagian,
                        'dataBagian'    => $pilihan_bagian,
                        'kabeh_bagian'  => $kabeh_bagian
                    ];
                    return view('siswa/KelasSembilan', $data);
                // -------------------------------------------------------------------------------
                endif;
            endforeach;
        // -------------------------------------------------------------------------------
        endforeach;
        if ($option_bagian == $kabeh_bagian) {

            $data = [
                'judul'         => "User Siswa Kelas 9",
                'dataStudents'  => $query,
                'dataBagian'    => $pilihan_bagian,
                'kabeh_bagian'  => $kabeh_bagian
            ];
            return view('siswa/KelasDelapan', $data);
        }
    }


    // Delete
    // -------------------------------------------------------------------------------
    public function delete($username)
    {
        $this->Absensi->delete($username);
        $deleteAlert = "Data berhasil dihapus";
        session()->setFlashdata('hapus', $deleteAlert);
        return redirect()->back()->withInput();
    }


    // Edit
    // -------------------------------------------------------------------------------
    public function edit($username)
    {
        $editStudentsAlert = $this->validate($this->Students->editStudents);

        // jika tidak ada validasi
        if (!$editStudentsAlert) {
            return redirect()->back()->withInput($editStudentsAlert);
        }

        $alamat = $this->request->getPost('dusun')
            . " " . $this->request->getPost('desa')
            . " " . $this->request->getPost('kecamatan')
            . " " . $this->request->getPost('kabupaten')
            . " " . $this->request->getPost('provinsi')
            . " " . $this->request->getPost('kodePos');

        $this->Students->update($username, [
            // 'username'      => $this->request->getPost('username'),
            'nisn'          => $this->request->getPost('nisn'),
            'fullname'      => $this->request->getPost('fullname'),
            'gender'        => $this->request->getPost('gender'),
            'tempatLahir'   => $this->request->getPost('tempatLahir'),
            'tanggalLahir'  => $this->request->getPost('tanggalLahir'),
            'kelas'         => $this->request->getPost('kelas'),
            'bagian'        => $this->request->getPost('bagian'),
            'asrama'        => $this->request->getPost('asrama'),
            'kode'          => $this->request->getPost('kode'),
            'alamat'        => $alamat,
            'namaAyah'      => $this->request->getPost('namaAyah'),
            'namaIbu'       => $this->request->getPost('namaIbu'),
            'nomorHp'       => $this->request->getPost('nomorHp'),
        ]);

        $updateAlert = "Data Updated Successfully";
        session()->setFlashdata('update', $updateAlert);
        return redirect()->back()->withInput();
    }
}
