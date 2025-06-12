<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;

class Register extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;

    public function __construct()
    {
        $this->Admins     = new AdminsModel();
        $this->Teachers   = new TeachersModel();
        $this->Students   = new StudentsModel();
        $this->Absensi    = new AbsensiModel();

        $this->validation = \Config\Services::validation();
    }


    // index
    // ----------------------------------------------------------------------------------
    public function index()
    {
        return view('auth/register');
    }


    // Method Register Admin
    // ----------------------------------------------------------------------------------
    public function prosesadmin()
    {
        // Validasi        
        $registerAdminsAlert = $this->validate($this->Admins->registerAdminsAlert);

        // jika tidak ada validasi
        if (!$registerAdminsAlert) {
            return redirect()->back()->withInput();
        }

        // Simpan data dari form ke database
        // yang request->getVar = data dari form
        $this->Admins->insert([
            'name'          => strtolower($this->request->getVar('name1')),
            'username'      => strtolower($this->request->getVar('username1')),
            'password'      => password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
        ]);

        // jika berhasil daftar arahkan ke login
        session()->setFlashdata('success', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('login');
    }


    // Method Register Guru
    // ----------------------------------------------------------------------------------
    public function prosesguru()
    {
        // Validasi
        // ------------------------------------------------------------------------------
        $registerGuruAlert = $this->validate($this->Teachers->registerTeachersAlert);

        // jika tidak ada validasi
        // ------------------------------------------------------------------------------
        if (!$registerGuruAlert) {
            return redirect()->back()->withInput($registerGuruAlert);
        }

        // Simpan data dari form ke database
        // ------------------------------------------------------------------------------
        $this->Teachers->insert([
            'username'      => strtolower($this->request->getVar('username2')),
            'password'      => password_hash($this->request->getVar('password2'), PASSWORD_BCRYPT),
            'fullname'      => strtolower($this->request->getVar('fullname2')),
            'title'         => $this->request->getVar('title2'),
            'gender'        => strtolower($this->request->getVar('gender2')),
            'tempatLahir'   => strtolower($this->request->getVar('tempatLahir2')),
            'tanggalLahir'  => $this->request->getVar('tanggalLahir2'),
        ]);

        // jika berhasil daftar arahkan ke login
        // ------------------------------------------------------------------------------
        session()->setFlashdata('success', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('login');
    }
}
