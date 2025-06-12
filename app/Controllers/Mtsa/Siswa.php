<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;
use App\Models\KelasBagianModel;
use App\Models\ProvinsiModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\DesaModel;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request;
 */

class Siswa extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;
    protected $KelasBagian;
    protected $list_kelas;
    protected $list_bagian;
    protected $Provinsi;
    protected $Kabupaten;
    protected $Kecamatan;
    protected $Desa;
    protected $daftar_hari;
    protected $bulan;

    public function __construct()
    {
        $this->Admins       = new AdminsModel();
        $this->Teachers     = new TeachersModel();
        $this->Students     = new StudentsModel();
        $this->Absensi      = new AbsensiModel();
        $this->KelasBagian  = new KelasBagianModel();
        $this->Provinsi     = new ProvinsiModel();
        $this->Kabupaten    = new KabupatenModel();
        $this->Kecamatan    = new KecamatanModel();
        $this->Desa         = new DesaModel();

        $this->list_kelas   = $this->KelasBagian->Select('kelas')->groupBy('kelas')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian  = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian_7  = $this->KelasBagian->Select('bagian')->where('kelas', 'vii')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian_8  = $this->KelasBagian->Select('bagian')->where('kelas', 'viii')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian_9  = $this->KelasBagian->Select('bagian')->where('kelas', 'ix')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();

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
        return view('siswa/index');
    }


    // Profile
    // -------------------------------------------------------------------------------
    public function profile($id)
    {
        $getdata = $this->Students->where('id', $id)->first();
        $data = [
            'judul'        => "User Siswa",
            'hari'         => $this->daftar_hari,
            'bulan'        => $this->bulan,
            'dataStudent'  => $getdata
        ];
        return view('siswa/profile', $data);
    }


    // Dapatkan Alamat
    // -------------------------------------------------------------------------------
    public function getKabupaten()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');
            if ($action == 'get_kabupaten') {
                $dataKabupaten = $this->Kabupaten->where('provinsi_id', $this->request->getVar('id_provinsi'))->findAll();
            }
            echo json_encode($dataKabupaten);
        }
    }
    public function getKecamatan()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');
            if ($action == 'get_kecamatan') {
                $dataKecamatan  = $this->Kecamatan->where('kabupaten_id', $this->request->getVar('id_kabupaten'))->findAll();
            }
            echo json_encode($dataKecamatan);
        }
    }
    public function getDesa()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');
            if ($action == 'get_desa') {
                $dataDesa  = $this->Desa->where('kecamatan_id', $this->request->getVar('id_kecamatan'))->findAll();
            }
            echo json_encode($dataDesa);
        }
    }


    // Detail
    // -------------------------------------------------------------------------------
    public function detail($username)
    {
        $getdata        = $this->Students->find($username);
        $data = [
            'judul'         => "Detail Siswa",
            'listProvinsi'  => $this->Provinsi->select('id, nama')->orderBy('nama')->findAll(),
            'hari'          => $this->daftar_hari,
            'bulan'         => $this->bulan,
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
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        // Option Box / Combo Box
        $kabeh_kelas    = 'all';
        $kabeh_bagian   = 'all';

        if ($kelas == $kabeh_kelas && $bagian !== $kabeh_bagian) {
            // Pilih semua kelas bagian tertentu
            $pilih_bagianTok  = $this->Students->getWhere(['bagian' => $bagian])->getResult();
            $data = [
                'judul'         => "User Siswa",
                'dataStudents'  => $this->Students->where(['bagian' => $bagian])->paginate(10, 'pages_absen_harian'), // untuk pagination manual php
                'pager'         => $this->Students->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
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
                'dataStudents'  => $this->Students->where(['kelas' => $kelas])->paginate(10, 'pages_absen_harian'), // untuk pagination manual php
                'pager'         => $this->Students->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
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
                'dataStudents'  => $this->Students->where(['kelas' => $kelas, 'bagian' => $bagian])->paginate(10, 'pages_absen_harian'), // untuk pagination manual php
                'pager'         => $this->Students->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
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
                'dataStudents'  => $this->Students->paginate(10, 'pages_absen_harian'), // untuk pagination manual php
                'pager'         => $this->Students->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
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
        $keyword_siswa  = $this->request->getVar('keyword_siswa');

        $kabeh_kelas    = "all";
        $kabeh_bagian   = "all";
        $list_kelas     = $this->KelasBagian->Select('kelas')->groupBy('kelas')->orderBy('id', 'asc')->get()->getResult();
        $list_bagian    = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
        $totalSiswa     = $this->Students->Select('username')->countAllResults();
        $jml_kelas_7    = $this->Students->where('kelas', 'vii')->countAllResults();
        $jml_kelas_8    = $this->Students->where('kelas', 'viii')->countAllResults();
        $jml_kelas_9    = $this->Students->where('kelas', 'ix')->countAllResults();
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        if ($keyword_siswa) {
            $data_search = $this->Students->search($keyword_siswa);
            $data = [
                'judul'         => "List user iswa",
                // 'dataStudents'  => $data_search->orderBy('kelas', 'desc')->orderBy('bagian', 'asc')->get()->getResult(), //untuk datatables
                'dataStudents'  => $data_search->orderBy('kelas', 'desc')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'), // untuk pagination manual php
                'pager'         => $data_search->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $list_kelas,
                'dataBagian'    => $list_bagian,
                'kabeh_kelas'   => $kabeh_kelas,
                'kabeh_bagian'  => $kabeh_bagian,
                'totalSiswa'    => $totalSiswa,
                'jml_kelas_7'   => $jml_kelas_7,
                'jml_kelas_8'   => $jml_kelas_8,
                'jml_kelas_9'   => $jml_kelas_9,
            ];
        } else {
            $data = [
                'judul'         => "List user iswa",
                // 'dataStudents'  => $this->Students->orderBy('kelas', 'desc')->orderBy('bagian', 'asc')->get()->getResult(), //untuk datatables
                'dataStudents'  => $this->Students->orderBy('kelas', 'desc')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'), // untuk pagination manual php
                'pager'         => $this->Students->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $list_kelas,
                'dataBagian'    => $list_bagian,
                'kabeh_kelas'   => $kabeh_kelas,
                'kabeh_bagian'  => $kabeh_bagian,
                'totalSiswa'    => $totalSiswa,
                'jml_kelas_7'   => $jml_kelas_7,
                'jml_kelas_8'   => $jml_kelas_8,
                'jml_kelas_9'   => $jml_kelas_9,
            ];
        }
        return view('siswa/userSiswa', $data);
    }


    public function userSiswaAjax()
    {
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $data = $this->Students->SearchAndDisplay($search_value, $start, $length);
        $total_count = $this->Students->SearchAndDisplay($search_value);

        $json_data = [
            'draw' => intval($param['draw']),
            'recordsTotal' => count($total_count),
            'recordsFiltered' => count($total_count),
            'data' => $data
        ];

        echo json_encode($json_data);
    }


    // User Siswa kelas 7
    // -------------------------------------------------------------------------------
    public function KelasTujuh()
    {
        $keyword_siswa  = $this->request->getVar('keyword_siswa');
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;
        $kabeh_bagian   = "all";
        $jml_kelas_7    = $this->Students->where('kelas', 'vii')->countAllResults();
        $siswa_aktif    = $this->Students->where('kelas', 'vii')->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('kelas', 'vii')->where('status', 'boyong')->countAllResults();

        if ($keyword_siswa) {
            $data_search = $this->Students->search_kelas_7($keyword_siswa);
            $data = [
                'judul'             => "Users siswa kelas 7",
                'dataStudents'      => $data_search->where('kelas', 'vii')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'             => $data_search->where('kelas', 'vii')->orderBy('bagian', 'asc')->pager,
                'current_page'      => $current_page,
                'dataBagian'        => $this->list_bagian_7,
                'kabeh_bagian'      => $kabeh_bagian,
                'jml_kelas_7'       => $jml_kelas_7,
            ];
        } else {
            $data = [
                'judul'             => "Users siswa kelas 7",
                'dataStudents'      => $this->Students->where('kelas', 'vii')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'             => $this->Students->where('kelas', 'vii')->orderBy('bagian', 'asc')->pager,
                'current_page'      => $current_page,
                'dataBagian'        => $this->list_bagian_7,
                'kabeh_bagian'      => $kabeh_bagian,
                'jml_kelas_7'       => $jml_kelas_7,
            ];
        }
        return view('siswa/KelasTujuh', $data);
    }


    // Pilih  bagian atau kode kelas 7
    // -------------------------------------------------------------------------------
    public function pilih_bagianTujuh()
    {
        $kabeh_bagian       = "all";
        $option_bagian      = $this->request->getVar('pilih_bagian'); // Ambil parameter 'pilih_kelas' di view userSiswa
        $current_page       = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        // panggil bagian A-N untuk selec option/combo box
        $pilihan_bagian     = $this->KelasBagian->select('bagian')->groupBy('bagian')->where('bagian', $option_bagian)->get()->getResult();

        foreach ($pilihan_bagian as $bagian) :
            foreach ($bagian as $kode) :
                if ($option_bagian == $kode) :
                    $data = [
                        'judul'         => "User Siswa Kelas 7",
                        'dataStudents'  => $this->Students->where(['kelas' => 'vii', 'bagian' => $option_bagian])->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                        'pager'         => $this->Students->where(['kelas' => 'vii', 'bagian' => $option_bagian])->orderBy('bagian', 'asc')->pager,
                        'current_page'  => $current_page,
                        'dataBagian'    => $this->list_bagian,
                        'kabeh_bagian'  => $kabeh_bagian
                    ];
                    return view('siswa/KelasTujuh', $data);
                endif;
            endforeach;
        // -------------------------------------------------------------------------------
        endforeach;
        if ($option_bagian == $kabeh_bagian) {
            $data = [
                'judul'         => "User Siswa Kelas 7",
                'dataStudents'  => $this->Students->where(['kelas' => 'vii'])->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'         => $this->Students->where(['kelas' => 'vii'])->orderBy('bagian', 'asc')->pager,
                'current_page'  => $current_page,
                'dataBagian'    => $this->list_bagian,
                'kabeh_bagian'  => $kabeh_bagian
            ];
            return view('siswa/KelasTujuh', $data);
        }
    }


    // User Siswa kelas 8
    // -------------------------------------------------------------------------------
    public function KelasDelapan()
    {
        $keyword_siswa  = $this->request->getVar('keyword_siswa');
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;
        $kabeh_bagian   = "all";
        $jml_kelas_8    = $this->Students->where('kelas', 'viii')->countAllResults();
        $siswa_aktif    = $this->Students->where('kelas', 'viii')->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('kelas', 'viii')->where('status', 'boyong')->countAllResults();

        if ($keyword_siswa) {
            $data_search = $this->Students->search_kelas_8($keyword_siswa);
            $data = [
                'judul'                 => "User Siswa Kelas 8",
                'dataStudents'          => $data_search->where('kelas', 'viii')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'                 => $data_search->where('kelas', 'viii')->orderBy('bagian', 'asc')->pager,
                'current_page'          => $current_page,
                'dataBagian'            => $this->list_bagian_8,
                'kabeh_bagian'          => $kabeh_bagian,
                'jml_kelas_8'           => $jml_kelas_8,
                'siswa_aktif'           => $siswa_aktif,
                'siswa_boyong'          => $siswa_boyong
            ];
        } else {
            $data = [
                'judul'                 => "User Siswa Kelas 8",
                'dataStudents'          => $this->Students->where('kelas', 'viii')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'                 => $this->Students->where('kelas', 'viii')->orderBy('bagian', 'asc')->pager,
                'current_page'          => $current_page,
                'dataBagian'            => $this->list_bagian_8,
                'kabeh_bagian'          => $kabeh_bagian,
                'jml_kelas_8'           => $jml_kelas_8,
                'siswa_aktif'           => $siswa_aktif,
                'siswa_boyong'          => $siswa_boyong
            ];
        }
        return view('siswa/KelasDelapan', $data);
    }


    // Pilih  bagian atau kode kelas 8
    // -------------------------------------------------------------------------------
    public function pilih_bagianDelapan()
    {
        $kabeh_bagian       = "all";
        $option_bagian      = $this->request->getVar('pilih_bagian'); // Ambil parameter 'pilih_kelas' di view userSiswa
        $current_page       = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        // panggil bagian A-L untuk selec option/combo box
        $pilih_bagian       = $this->KelasBagian->select('bagian')->groupBy('bagian')->where('bagian', $option_bagian)->get()->getResult();

        foreach ($pilih_bagian as $bagian) :
            foreach ($bagian as $kode) :
                if ($option_bagian == $kode) :
                    $data = [
                        'judul'         => "User Siswa Kelas 8",
                        'dataStudents'  => $this->Students->where(['kelas' => 'viii', 'bagian' => $option_bagian])->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                        'pager'         => $this->Students->where(['kelas' => 'viii', 'bagian' => $option_bagian])->orderBy('bagian', 'asc')->pager,
                        'current_page'  => $current_page,
                        'dataBagian'    => $this->list_bagian,
                        'kabeh_bagian'  => $kabeh_bagian
                    ];
                    return view('siswa/KelasDelapan', $data);
                endif;
            endforeach;
        // -------------------------------------------------------------------------------
        endforeach;
        if ($option_bagian == $kabeh_bagian) {
            $data = [
                'judul'         => "User Siswa Kelas 8",
                'dataStudents'  => $this->Students->where(['kelas' => 'viii'])->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'         => $this->Students->where(['kelas' => 'viii'])->orderBy('bagian', 'asc')->pager,
                'current_page'  => $current_page,
                'dataBagian'    => $this->list_bagian,
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
        $keyword_siswa  = $this->request->getVar('keyword_siswa');
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;
        $jml_kelas_9    = $this->Students->where('kelas', 'ix')->countAllResults();
        $jml_bagian_9   = $this->Students->select('bagian')->where('kelas', 'ix')->countAllResults();
        $siswa_aktif    = $this->Students->where('kelas', 'ix')->where('status', 'aktif')->countAllResults();
        $siswa_boyong   = $this->Students->where('kelas', 'ix')->where('status', 'boyong')->countAllResults();

        if ($keyword_siswa) {
            $data_search = $this->Students->search_kelas_9($keyword_siswa);
            $data = [
                'judul'                 => "User Siswa Kelas 9",
                'dataStudents'          => $data_search->where('kelas', 'ix')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'                 => $data_search->where('kelas', 'ix')->orderBy('bagian', 'asc')->pager,
                'current_page'          => $current_page,
                'dataBagian'            => $this->list_bagian_9,
                'kabeh_bagian'          => $kabeh_bagian,
                'jml_kelas_9'           => $jml_kelas_9,
                'siswa_aktif'           => $siswa_aktif,
                'siswa_boyong'          => $siswa_boyong
            ];
        } else {
            $data = [
                'judul'                 => "User Siswa Kelas 9",
                'dataStudents'          => $this->Students->where('kelas', 'ix')->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'                 => $this->Students->where('kelas', 'ix')->orderBy('bagian', 'asc')->pager,
                'current_page'          => $current_page,
                'dataBagian'            => $this->list_bagian_9,
                'kabeh_bagian'          => $kabeh_bagian,
                'jml_kelas_9'           => $jml_kelas_9,
                'siswa_aktif'           => $siswa_aktif,
                'siswa_boyong'          => $siswa_boyong
            ];
        }
        return view('siswa/KelasSembilan', $data);
    }


    // Pilih  bagian atau kode kelas 9
    // -------------------------------------------------------------------------------
    public function pilih_bagianSembilan()
    {
        $kabeh_bagian       = "all";
        $option_bagian      = $this->request->getVar('pilih_bagian'); // Ambil parameter 'pilih_kelas' di view userSiswa
        $current_page       = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        // panggil bagian A-J untuk selec option/combo box
        $pilih_bagian       = $this->KelasBagian->select('bagian')->groupBy('bagian')->where('bagian', $option_bagian)->get()->getResult();

        foreach ($pilih_bagian as $bagian) :
            foreach ($bagian as $kode) :
                if ($option_bagian == $kode) :
                    $data = [
                        'judul'         => "User Siswa Kelas 9",
                        'dataStudents'  => $this->Students->where(['kelas' => 'ix', 'bagian' => $option_bagian])->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                        'pager'         => $this->Students->where(['kelas' => 'ix', 'bagian' => $option_bagian])->orderBy('bagian', 'asc')->pager,
                        'current_page'  => $current_page,
                        'dataBagian'    => $this->list_bagian,
                        'kabeh_bagian'  => $kabeh_bagian
                    ];
                    return view('siswa/KelasSembilan', $data);
                endif;
            endforeach;
        // -------------------------------------------------------------------------------
        endforeach;
        if ($option_bagian == $kabeh_bagian) {
            $data = [
                'judul'         => "User Siswa Kelas 9",
                'dataStudents'  => $this->Students->where(['kelas' => 'ix'])->orderBy('bagian', 'asc')->paginate(10, 'pages_absen_harian'),
                'pager'         => $this->Students->where(['kelas' => 'ix'])->orderBy('bagian', 'asc')->pager,
                'current_page'  => $current_page,
                'dataBagian'    => $this->list_bagian,
                'kabeh_bagian'  => $kabeh_bagian
            ];
            return view('siswa/KelasDelapan', $data);
        }
    }


    // Delete
    // -------------------------------------------------------------------------------
    public function delete()
    {
        $username = $this->request->getPost('username');
        $delete   = $this->Students->delete($username);
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


    // Edit
    // -------------------------------------------------------------------------------
    public function edit($username)
    {
        $editStudentsAlert = $this->validate($this->Students->editStudents);

        // jika tidak ada validasi
        if (!$editStudentsAlert) {
            return redirect()->back()->withInput($editStudentsAlert);
        }

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
            'provinsi'      => @$provinsi[0]->nama,
            'kabupaten'     => @$kabupaten[0]->nama,
            'kecamatan'     => @$kecamatan[0]->nama,
            'desa'          => @$desa[0]->nama,
            'dusun'         => $dusun,
            'kodePos'       => $kodepos,
            'namaAyah'      => $this->request->getPost('namaAyah'),
            'namaIbu'       => $this->request->getPost('namaIbu'),
            'nomorHp'       => $this->request->getPost('nomorHp'),
        ]);

        $updateAlert = "Data Updated Successfully";
        session()->setFlashdata('update', $updateAlert);
        return redirect()->back()->withInput();
    }
}
