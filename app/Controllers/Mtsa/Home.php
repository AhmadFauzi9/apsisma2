<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;

class Home extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $levelId;

    public function __construct()
    {
        $this->Admin    = new AdminsModel();
        $this->Teacher  = new TeachersModel();
        $this->Student  = new StudentsModel();
        $this->Absens   = new AbsensiModel();

        $this->levelId = [
            'AdminsModel'   => $this->Admin->level_id,
            'TeachersModel' => $this->Teacher->level_id,
            'StudentsModel' => $this->Student->level_id,
        ];
    }

    public function index()
    {
        return view('auth/login');
    }

    public function dashboard()
    {
        return view('templates/index');
    }

    public function forgot()
    {
        return view('auth/forgot');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function spp()
    {
        return view('siswa/spp');
    }

    public function prestasi()
    {
        return view('siswa/prestasi');
    }

    public function raport()
    {
        return view('siswa/raport');
    }

    public function riwayatKelas()
    {
        return view('siswa/riwayatKelas');
    }

    public function alumni()
    {
        return view('siswa/alumni');
    }

    public function profil()
    {
        return view('tentang/profil');
    }

    public function visimisi()
    {
        return view('tentang/visimisi');
    }

    public function prokel()
    {
        return view('tentang/prokel');
    }
}
