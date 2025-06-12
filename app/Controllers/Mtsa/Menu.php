<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\KelasBagianModel;

class Menu extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $KelasBagian;

    function __construct()
    {
        $this->Admins       = new AdminsModel();
        $this->Teachers     = new TeachersModel();
        $this->Students     = new StudentsModel();
        $this->KelasBagian  = new KelasBagianModel();
    }

    // index
    // ------------------------------------------------------------------------------
    public function index()
    {
        if (session()->levelId == null) {
            $loginAlert = [
                'description'   => 'Anda harus login sebagai siswa/siswi terdaftar di lembaga untuk menggunakan fitur ini.'
            ];
        }
        @session()->setFlashdata($loginAlert);
        return view('menu/index');
    }


    function settings()
    {
        return view('menu/settings');
    }
}
