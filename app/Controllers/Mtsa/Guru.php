<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;
use App\Models\ProvinsiModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\DesaModel;

class Guru extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;
    protected $Kelas;
    protected $Bagian;
    protected $daftar_hari;
    protected $bulan;
    protected $Provinsi;
    protected $Kabupaten;
    protected $Kecamatan;
    protected $Desa;

    public function __construct()
    {
        $this->Admins       = new AdminsModel();
        $this->Teachers     = new TeachersModel();
        $this->Students     = new StudentsModel();
        $this->Absensi      = new AbsensiModel();
        $this->Provinsi     = new ProvinsiModel();
        $this->Kabupaten    = new KabupatenModel();
        $this->Kecamatan    = new KecamatanModel();
        $this->Desa         = new DesaModel();

        $this->daftar_hari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];
        $this->bulan = [
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
    }


    // profile
    // ----------------------------------------------------------------------------------
    public function profile($id)
    {
        $getdata = $this->Teachers->where('id', $id)->first();
        $data = [
            'judul'         => "User Admin",
            'hari'          => $this->daftar_hari,
            'bulan'         => $this->bulan,
            'dataTeachers'  => $getdata
        ];
        return view('guru/profile', $data);
    }


    // detail
    // ----------------------------------------------------------------------------------
    public function detail($username)
    {
        $getdata = $this->Teachers->find($username);
        $data = [
            'judul'         => "Detail Guru",
            'listProvinsi'  => $this->Provinsi->select('id, nama')->orderBy('nama')->findAll(),
            'hari'          => $this->daftar_hari,
            'bulan'         => $this->bulan,
            'dataTeachers'  => $getdata,
            'firstname'     => @explode(" ", $getdata->fullname),
        ];

        return view('guru/profile', $data);
    }


    // userGuru
    // ----------------------------------------------------------------------------------
    public function userGuru()
    {
        $keyword_guru   = $this->request->getVar('keyword_guru');
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        if ($keyword_guru) {
            $data_search = $this->Teachers->search($keyword_guru);
            $data = [
                'judul'        => "Users Guru",
                'dataTeachers' => $data_search->paginate(10, 'pages_absen_harian'),
                'pager'        => $data_search->where('kelas', 'ix')->orderBy('bagian', 'asc')->pager,
                'current_page' => $current_page,
            ];
        } else {
            $data = [
                'judul'        => "Users Guru",
                'dataTeachers' => $this->Teachers->paginate(10, 'pages_absen_harian'),
                'pager'        => $this->Teachers->where('kelas', 'ix')->orderBy('bagian', 'asc')->pager,
                'current_page' => $current_page,
            ];
        }
        return view('guru/userGuru', $data);
    }


    // delete
    // ----------------------------------------------------------------------------------
    public function delete($username)
    {
        $this->Teachers->delete($username);

        $deleteAlert = "Data berhasil dihapus";

        session()->setFlashdata('hapus', $deleteAlert);
        return redirect()->back();
    }


    // edit profile
    // ----------------------------------------------------------------------------------
    public function edit($username)
    {
        $kodepos        = $this->request->getPost('kodePos');
        $dusun          = $this->request->getPost('dusun');

        $id_desa        = $this->request->getPost('desa');
        $desa           = $this->Desa->select('nama')->like('id', $id_desa)->get()->getResult();

        $id_kecamatan   = $this->request->getPost('kecamatan');
        $kecamatan      = $this->Kecamatan->select('nama')->like('id', $id_kecamatan)->get()->getResult();

        $id_kabupaten   = $this->request->getPost('kabupaten');
        $kabupaten      = $this->Kabupaten->select('nama')->like('id', $id_kabupaten)->get()->getResult();

        $id_provinsi    = $this->request->getPost('provinsi');
        $provinsi       = $this->Provinsi->select('nama')->like('id', $id_provinsi)->get()->getResult();

        $this->Teachers->update($username, [
            'fullname'      => $this->request->getPost('fullname2'),
            'title'         => $this->request->getPost('title2'),
            'nip'           => $this->request->getPost('nip2'),
            'nipy'          => $this->request->getPost('nipy2'),
            'jabatan'       => $this->request->getPost('jabatan2'),
            'gender'        => $this->request->getPost('gender2'),
            'tempatLahir'   => $this->request->getPost('tempatLahir2'),
            'tanggalLahir'  => $this->request->getPost('tanggalLahir2'),
            'provinsi'      => @$provinsi[0]->nama,
            'kabupaten'     => @$kabupaten[0]->nama,
            'kecamatan'     => @$kecamatan[0]->nama,
            'desa'          => @$desa[0]->nama,
            'dusun'         => $dusun,
            'kodePos'       => $kodepos,
            'user_img'      => '',
            'status'        => 'aktif',
            'nomorHp'       => $this->request->getPost('nomorHp2'),
        ]);

        $updateAlert = "Data Updated Successfully";
        session()->setFlashdata('update', $updateAlert);
        return redirect()->back()->withInput();
    }


    public function Kontak()
    {
        $getdata = $this->Teachers->findAll();
        $data = [
            'judul' => "Kontak",
            'Kntk' => $getdata
        ];
        return view('guru/kontak', $data);
    }
}
