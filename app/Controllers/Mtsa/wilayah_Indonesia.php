<?php

namespace App\Controllers\Mtsa;

use App\Models\ProvinsiModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\DesaModel;
use App\Models\AdminsModel;

class wilayah_Indonesia extends BaseController
{
    protected $Admins;
    protected $Provinsi;
    protected $Kabupaten;
    protected $Kecamatan;
    protected $Desa;

    public function __construct()
    {
        $this->Admins       = new AdminsModel();
        $this->Provinsi     = new ProvinsiModel();
        $this->Kabupaten    = new KabupatenModel();
        $this->Kecamatan    = new KecamatanModel();
        $this->Desa         = new DesaModel();
    }

    // Dapatkan Alamat
    // -------------------------------------------------------------------------------
    public function getKabupaten()
    {
        $id_provinsi = $this->request->getVar('id_provinsi');
        $id_prov = $this->request->getVar('id_prov');
        if ($id_provinsi != '') {
            $dataKabupaten = $this->Kabupaten->where('provinsi_id', $this->request->getVar('id_provinsi'))->orderBy('nama')->findAll();
        } else {
            $dataKabupaten = $this->Kabupaten->where('provinsi_id', $this->request->getVar('id_prov'))->orderBy('nama')->findAll();
        }
        echo json_encode($dataKabupaten);
    }
    public function getKecamatan()
    {
        $id_kabupaten = $this->request->getVar('id_kabupaten');
        if ($id_kabupaten != '') {
            $dataKecamatan  = $this->Kecamatan->where('kabupaten_id', $this->request->getVar('id_kabupaten'))->orderBy('nama')->findAll();
        }
        echo json_encode($dataKecamatan);
    }
    public function getDesa()
    {
        $id_kecamatan = $this->request->getVar('id_kecamatan');
        if ($id_kecamatan != '') {
            $dataDesa  = $this->Desa->where('kecamatan_id', $this->request->getVar('id_kecamatan'))->orderBy('nama')->findAll();
        }
        echo json_encode($dataDesa);
    }
}
