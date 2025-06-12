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

class Admin extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;
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


    // index
    // ----------------------------------------------------------------------------------
    public function index()
    {
        $data['absensi'] = $this->Absensi->edit();
        return view('siswa/absensi', $data);
    }

    public function profile($id)
    {
        $getdata = $this->Admins->where('id', $id)->first();
        $data = [
            'judul'         => "User Admin",
            'hari'          => $this->daftar_hari,
            'bulan'         => $this->bulan,
            'dataAdmins'    => $getdata,
        ];
        return view('admin/userAdmins', $data);
    }


    // Detail
    // ----------------------------------------------------------------------------------
    public function detail($username)
    {
        $getdata        = $this->Admins->find($username);

        $data = [
            'judul'         => "Detail Admin",
            'hari'          => $this->daftar_hari,
            'bulan'         => $this->bulan,
            'dataAdmins'    => $getdata,
            'firstname'     => @explode(" ", $getdata->name),
        ];
        return view('admin/profile', $data);
    }


    // userAdmin
    // ----------------------------------------------------------------------------------
    public function userAdmin($username = 0)
    {
        $getusername        = $this->Admins->find($username);
        $data = [
            'judul'         => "User Admin",
            'dataAdmins'    => $this->Admins->findAll(),
            'username'      => $getusername,
        ];
        return view('admin/userAdmin', $data);
    }

    // editUserAdmin
    // ----------------------------------------------------------------------------------
    public function editUserAdmin($id = 0)
    {
        $getusername        = $this->Admins->find($id)->first();
        $data = [
            'judul'         => "User Admin",
            'dataAdmins'    => $this->Admins->findAll(),
            'username'      => $getusername,
        ];
        return view('admin/userAdmin', $data);
    }


    // delete
    // ----------------------------------------------------------------------------------
    public function delete($username)
    {
        $this->Admins->delete($username);

        $deleteAlert = "Data berhasil dihapus";

        session()->setFlashdata('hapus', $deleteAlert);
        return redirect()->back()->withInput();
    }


    // edit profile
    // ----------------------------------------------------------------------------------
    public function edit($name)
    {
        $this->Admins->update($name, [
            'name'          => strtolower($this->request->getVar('name1')),
            'username'      => strtolower($this->request->getVar('username1')),
            'password'      => password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
        ]);
        $updateAlert = "Data Updated Successfully";
        session()->setFlashdata('update', $updateAlert);
        return redirect()->back()->withInput();
    }
}
