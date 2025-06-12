<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\KelasBagianModel;

class KelasBagian extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $KelasBagian;
    protected $list_kelas;
    protected $list_bagian;

    function __construct()
    {
        $this->Admins       = new AdminsModel();
        $this->Teachers     = new TeachersModel();
        $this->Students     = new StudentsModel();
        $this->KelasBagian  = new KelasBagianModel();

        $this->list_kelas   = $this->KelasBagian->Select('kelas')->groupBy('kelas')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian  = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
    }


    function index()
    {
        $data = [
            'dataKelas_Tujuh'   => $this->KelasBagian->where('kelas', 'VII')->get()->getResult(),
            'dataKelas_Delapan' => $this->KelasBagian->where('kelas', 'VIII')->get()->getResult(),
            'dataKelas_Sembilan' => $this->KelasBagian->where('kelas', 'IX')->get()->getResult()
        ];
        return view('menu/kelas_bagian', $data);
    }


    function tambah_kelas()
    {
        $validasi = $this->validate($this->KelasBagian->validasiTambah_kelas);
        if (!$validasi) {
            return redirect()->back()->withInput();
        }

        $insert = $this->KelasBagian->insert([
            'kelas'      => $this->request->getPost('kelas'),
            'bagian'     => $this->request->getPost('bagian'),
            'gender'     => $this->request->getPost('gender'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'nomorHp'    => $this->request->getPost('nomorHp')
        ]);

        if ($insert) {
            $tambah_kelasAlert = "Kelas dan Bagian berhasil di tambahkan";
            session()->setFlashdata('berhasil', $tambah_kelasAlert);
            return redirect()->back()->withInput();
        } else {
            $tambah_kelasAlert = "Kesalahan saat menambahkan data";
            session()->setFlashdata('gagal', $tambah_kelasAlert);
            return redirect()->back()->withInput();
        }
    }

    function edit_kelas()
    {
        $id         = $this->request->getPost('id');
        $validasi   = $this->validate($this->KelasBagian->validasiEdit_kelas);

        // jika tidak ada validasi
        if (!$validasi) {
            return redirect()->back()->withInput();
        }

        $this->KelasBagian->update($id, [
            'kelas'         => $this->request->getPost('kelas'),
            'bagian'        => $this->request->getPost('bagian'),
            'gender'        => $this->request->getPost('gender'),
            'wali_kelas'    => $this->request->getPost('wali_kelas'),
            'nomorHp'       => $this->request->getPost('nomorHp'),
        ]);

        $updateAlert = "Data berhasil di Ubah";
        session()->setFlashdata('update', $updateAlert);
        return redirect()->back()->withInput();
    }


    // Delete
    // -------------------------------------------------------------------------------
    public function delete($id)
    {
        $delete = $this->KelasBagian->delete($id);
        if ($delete) {
            $deleteAlert = "Data berhasil dihapus";
            session()->setFlashdata('hapus', $deleteAlert);
            return redirect()->back()->withInput();
        } else {
            $deleteAlert = "Kesalahan saat menghapus data";
            session()->setFlashdata('hapus', $deleteAlert);
            return redirect()->back()->withInput();
        }
    }
}
