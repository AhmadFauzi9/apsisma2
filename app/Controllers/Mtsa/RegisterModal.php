<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;

class RegisterModal extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;

    public function __construct()
    {
        $this->Admins      = new AdminsModel();
        $this->Teachers    = new TeachersModel();
        $this->Students    = new StudentsModel();
        $this->Absensi     = new AbsensiModel();

        $this->validation = \Config\Services::validation();
    }


    // Method Register Admin
    // ----------------------------------------------------------------------------------
    public function prosesadmin()
    {
        // Validasi        
        $registerAdminAlert = $this->validate($this->Admins->registerAdminsAlert);

        if (!$registerAdminAlert) {
            return redirect()->back()->withInput();
        }

        // Simpan data dari form ke database
        // yang request->getVar = data dari form
        $this->Admins->insert([
            'username'      => strtolower($this->request->getVar('username1')),
            'password'      => password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
            'fullname'      => strtolower($this->request->getVar('fullname1')),
            'title'         => $this->request->getVar('title1'),
            'gender'        => strtolower($this->request->getVar('gender1')),
            'tempatLahir'   => strtolower($this->request->getVar('tempatLahir1')),
            'tanggalLahir'  => $this->request->getVar('tanggalLahir1'),
        ]);

        // jika berhasil daftar arahkan ke login
        $registerAlert = ['registerSukses' => 'Registrasi Sukses.'];
        session()->setFlashdata('success', $registerAlert);
        return redirect()->back()->withInput();
    }


    // Method Register Guru
    // ----------------------------------------------------------------------------------
    public function prosesguru()
    {
        // Validasi
        $registerGuruAlert = $this->validate($this->Teachers->registerTeachersAlert);


        if (!$registerGuruAlert) {
            return redirect()->back()->withInput($registerGuruAlert);
        }
        // Simpan data dari form ke database
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

        $registerAlert = ['registerSukses' => 'Registrasi Sukses.'];
        session()->setFlashdata('success', $registerAlert);
        return redirect()->back()->withInput();
    }


    // Method Register Siswa
    // ----------------------------------------------------------------------------------
    public function prosessiswa()
    {
        // Validasi
        $registerSiswaAlert = $this->validate($this->Students->registerStudentsAlert);

        if (!$registerSiswaAlert) {
            return redirect()->back()->withInput($registerSiswaAlert);
        } else {
            // Simpan data dari form ke database students
            // ------------------------------------------------------------------------------
            $insertStudents = $this->Students->insert([
                'username'      => strtolower($this->request->getVar('username')),
                'password'      => md5("*" . $this->request->getVar('password')),
                'fullname'      => strtolower($this->request->getVar('fullname')),
                'kelas'         => strtolower($this->request->getVar('kelas')),
                'bagian'        => strtolower($this->request->getVar('bagian')),
                'gender'        => strtolower($this->request->getVar('gender')),
                'tempatLahir'   => strtolower($this->request->getVar('tempatLahir')),
                'tanggalLahir'  => $this->request->getVar('tanggalLahir'),
            ]);
            $registerAlert = 'Anda berhasil mendaftar, silahkan login';
            session()->setFlashdata('success', $registerAlert);
            return redirect()->back()->withInput();

            // Simpan data dari form ke database absensi
            // ------------------------------------------------------------------------------
            //     if ($insertStudents) {
            //         $this->Absensi->insert([
            //             'username'      => $this->request->getVar('username'),
            //             'fullname'      => strtolower($this->request->getVar('fullname')),
            //         ]);

            //         // jika berhasil daftar arahkan ke login
            //         // ------------------------------------------------------------------------------
            //         session()->setFlashdata('success', 'Anda berhasil mendaftar, silahkan login');
            //         return redirect()->back()->withInput();
            //     }
        }
    }
}
