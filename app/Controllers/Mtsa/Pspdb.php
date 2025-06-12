<?php

namespace App\Controllers\Mtsa;

use \App\Models\PspdbModel;

class Pspdb extends BaseController
{
    // index
    // ------------------------------------------------------------------------------
    public function index()
    {
        return view('pspdb/index');
    }


    // daftar
    // ------------------------------------------------------------------------------
    public function daftar()
    {
        $this->Pspdb = new PspdbModel();
        $this->validation = \Config\Services::validation();

        // validasi
        // ------------------------------------------------------------------------------
        $validasiPspdb = $this->validate($this->Pspdb->pspdbAlert);

        // jika validasi kosong/belum isi apapun di form dan klik submit
        // ------------------------------------------------------------------------------
        if (!$validasiPspdb) {
            return redirect()->back()->withInput();
        } else {
            $this->Pspdb->insert([
                'fullname'      => $this->request->getVar('fullname'),
                'gender'        => $this->request->getVar('gender'),
                'tempatLahir'   => $this->request->getVar('tempatLahir'),
                'tanggalLahir'  => $this->request->getVar('tanggalLahir'),
                'namaWali'      => $this->request->getVar('namaWali'),
                'asalSekolah'   => $this->request->getVar('asalSekolah'),
                'nomorHp'       => $this->request->getVar('nomorHp'),
                'programKelas'  => $this->request->getVar('programKelas'),
                'ekskul'        => $this->request->getVar('extrakulikuler')
            ]);

            $pspdbSuccess = "Pendaftaran anda berhasil, silakan hubungi panitia untuk informasi selanjutnya.";
            session()->setFlashdata('daftar', $pspdbSuccess);
            return redirect()->back();
        }
    }
}
