<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;
use App\Models\AbsensiModel;
use App\Models\RekapAbsenModel;
use App\Models\KelasBagianModel;

class Absensi extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $Absensi;
    protected $RekapAbsen;
    protected $KelasBagian;
    protected $daftar_hari;
    protected $bulan;
    protected $bulan_2dgit;
    protected $list_kelas;
    protected $list_bagian;
    protected $hari_efektif;
    protected $jum_hari;

    public function __construct()
    {
        $this->Admins       = new AdminsModel();
        $this->Teachers     = new TeachersModel();
        $this->Students     = new StudentsModel();
        $this->Absensi      = new AbsensiModel();
        $this->RekapAbsen   = new RekapAbsenModel();
        $this->KelasBagian  = new KelasBagianModel();

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
        $this->bulan_2dgit  = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $this->list_kelas   = $this->KelasBagian->Select('kelas')->groupBy('kelas')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian  = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();

        $kalender           = CAL_GREGORIAN;
        $a_bulan            = date('m');
        $a_tahun            = date('Y');
        $this->jum_hari     = cal_days_in_month($kalender, $a_bulan, $a_tahun);
        $this->hari_efektif = $this->jum_hari - 4;
    }


    // index
    // ------------------------------------------------------------------------------
    public function index()
    {
        $absensi        = $this->Absensi->getAbsen();
        $data = [
            'judul'         => "User Siswa",
            'absensi'       => $absensi,
            'dataKelas'     => $this->list_kelas,
            'dataBagian'    => $this->list_bagian,
            'kabeh_kelas'   => "all",
            'kabeh_bagian'  => "all",
        ];
        return view('siswa/insertAbsen', $data);
    }


    // hasil Absen siswa
    // ------------------------------------------------------------------------------
    public function hasilAbsen($username)
    {
        // Limit banyak absen bulan sekarang ----------------------------------------------------------------------------
        $limit_absen    = $this->Absensi->where('month(tanggal)', date('m'))->countAllResults();

        // Data Absen berdasarkan bulan sekarang ------------------------------------------------------------------------
        $pilih_dataAbsensi      = $this->Absensi->where(['username' => $username, 'month(tanggal)' => date('m')]);
        $dataAbsensi            = $pilih_dataAbsensi->orderBy('month(tanggal)', 'desc')->Limit($limit_absen)->get()->getResult();

        $wali_kelas     = $this->KelasBagian->get()->getResult();
        $alpa           = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'alpa'])->countAllResults();
        $sakit          = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'sakit'])->countAllResults();
        $izin           = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'izin'])->countAllResults();
        $telat          = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'telat'])->countAllResults();
        $masuk          = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'masuk'])->countAllResults();
        $persen_masuk   = ($masuk / $this->hari_efektif * 100);
        $persen_sakit   = ($sakit / $this->hari_efektif * 100);
        $persen_izin    = ($izin / $this->hari_efektif * 100);
        $persen_alpa    = ($alpa / $this->hari_efektif * 100);
        $persen_telat   = ($telat / $this->hari_efektif * 100);
        $data = [
            'judul'         => "Absen Siswa",
            'nama_hari'     => $this->daftar_hari,
            'nama_bulan'    => $this->bulan,
            'dataAbsensi'   => $dataAbsensi,
            'wali_kelas'    => $wali_kelas,
            'alpa'          => $alpa,
            'sakit'         => $sakit,
            'izin'          => $izin,
            'telat'         => $telat,
            'masuk'         => $masuk,
            'persen_masuk'  => $persen_masuk,
            'persen_sakit'  => $persen_sakit,
            'persen_izin'   => $persen_izin,
            'persen_alpa'   => $persen_alpa,
            'persen_telat'  => $persen_telat,
        ];
        return view('siswa/absenSiswa', $data);
    }


    // Pilih Bulan Absen siswa
    // ------------------------------------------------------------------------------
    public function pilih_bulan()
    {
        $pilih_bulan    = $this->request->getVar('pilih_bulan');
        $username       = $this->request->getVar('username');
        $wali_kelas     = $this->KelasBagian->get()->getResult();
        // Data Absen berdasarkan bulan sekarang
        $dataAbsensi    = $this->Absensi->where(['month(tanggal)' => $pilih_bulan, 'username' => $username,])->orderBy('month(tanggal)', 'desc')->get()->getResult();
        $alpa           = $this->Absensi->where(['month(tanggal)' => $pilih_bulan, 'username' => $username, 'absen' => 'alpa'])->countAllResults();
        $sakit          = $this->Absensi->where(['month(tanggal)' => $pilih_bulan, 'username' => $username, 'absen' => 'sakit'])->countAllResults();
        $izin           = $this->Absensi->where(['month(tanggal)' => $pilih_bulan, 'username' => $username, 'absen' => 'izin'])->countAllResults();
        $telat          = $this->Absensi->where(['month(tanggal)' => $pilih_bulan, 'username' => $username, 'absen' => 'telat'])->countAllResults();
        $masuk          = $this->Absensi->where(['month(tanggal)' => $pilih_bulan, 'username' => $username, 'absen' => 'masuk'])->countAllResults();
        $persen_masuk   = ($masuk / $this->hari_efektif * 100);
        $persen_sakit   = ($sakit / $this->hari_efektif * 100);
        $persen_izin    = ($izin / $this->hari_efektif * 100);
        $persen_alpa    = ($alpa / $this->hari_efektif * 100);
        $persen_telat   = ($telat / $this->hari_efektif * 100);
        $data = [
            'judul'         => "Absen Siswa",
            'nama_hari'     => $this->daftar_hari,
            'nama_bulan'    => $this->bulan,
            'nama_bulan2'   => $this->bulan_2dgit,
            'dataAbsensi'   => $dataAbsensi,
            'wali_kelas'    => $wali_kelas,
            'alpa'          => $alpa,
            'sakit'         => $sakit,
            'izin'          => $izin,
            'telat'         => $telat,
            'masuk'         => $masuk,
            'persen_masuk'  => $persen_masuk,
            'persen_sakit'  => $persen_sakit,
            'persen_izin'   => $persen_izin,
            'persen_alpa'   => $persen_alpa,
            'persen_telat'  => $persen_telat,
        ];
        return view('siswa/absenSiswa', $data);
    }


    // insert absen user guru / admin
    // ------------------------------------------------------------------------------
    public function pilih_insertAbsen()
    {
        $dataSiswa      = $this->Students->orderBy('kelas', 'bagian', 'ASC');
        $dataSiswa      = $this->Students->getWhere(['kelas' => null])->getResult();
        $alpa           = $this->Absensi->where('day(tanggal)', date('d'))->where('absen', 'alpa')->countAllResults();
        $sakit          = $this->Absensi->where('day(tanggal)', date('d'))->where('absen', 'sakit')->countAllResults();
        $izin           = $this->Absensi->where('day(tanggal)', date('d'))->where('absen', 'izin')->countAllResults();
        $telat          = $this->Absensi->where('day(tanggal)', date('d'))->where('absen', 'telat')->countAllResults();
        $masuk          = $this->Absensi->where('day(tanggal)', date('d'))->where('absen', 'masuk')->countAllResults();
        $dataAbsensi    = $this->Absensi->where('day(tanggal)', date('d'))->orderBy('fullname', 'asc')->get()->getResult();
        $data = [
            'judul'         => "Absen Siswa",
            'hari'          => $this->daftar_hari,
            'bulan'         => $this->bulan,
            'dataStudents'  => $dataSiswa,
            'dataAbsensi'   => $dataAbsensi,
            'dataKelas'     => $this->list_kelas,
            'dataBagian'    => $this->list_bagian,
            'kabeh_kelas'   => 'all',
            'kabeh_bagian'  => 'all',
            'alpa'          => $alpa,
            'sakit'         => $sakit,
            'izin'          => $izin,
            'telat'         => $telat,
            'masuk'         => $masuk,
        ];
        return view('siswa/insertAbsen', $data);
    }


    // Pilih kelas tanggal
    // -------------------------------------------------------------------------------
    public function pilih_kelas_tanggal()
    {
        $pilih_kelas    = @strtolower($this->request->getVar('pilih_kelas'));
        $pilih_bagian   = @strtolower($this->request->getVar('pilih_bagian'));
        $tanggal        = $this->request->getVar('tanggal');

        // session()->set('tanggal', $tanggal );
        // dd($pilih_kelas);
        // dd(session('tanggal'));

        $validasi_insert = $this->validate($this->Absensi->inputAbsenAlert);
        if (!$validasi_insert) {
            return redirect()->to(site_url('absensi/pilih_insertAbsen'))->withInput();
        }

        $alpa           = $this->Absensi->where('absen', 'alpa')->countAllResults();
        $sakit          = $this->Absensi->where('absen', 'sakit')->countAllResults();
        $izin           = $this->Absensi->where('absen', 'izin')->countAllResults();
        $telat          = $this->Absensi->where('absen', 'telat')->countAllResults();
        $masuk          = $this->Absensi->where('absen', 'masuk')->countAllResults();

        if (!empty($pilih_kelas) && !empty($pilih_bagian)) {

            $pilih_kelasBagian  = $this->Students->getWhere(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian])->getResult();
            $data = [
                'judul'         => "User Siswa",
                'dataStudents'  => $pilih_kelasBagian,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
                'alpa'          => $alpa,
                'sakit'         => $sakit,
                'izin'          => $izin,
                'telat'         => $telat,
                'masuk'         => $masuk,
                'nama_hari'     => $this->daftar_hari,
                'tanggal'       => $tanggal,
                'nama_bulan'    => $this->bulan,
                'pilih_kelas'   => $pilih_kelas,
                'pilih_bagian'  => $pilih_bagian,
                'kabeh_kelas'   => 'all',
                'kabeh_bagian'  => 'all',
                // Untuk Pengulangan Pada name, id, dan for di file view absen,
                'username'      => 1, 'fullname' => 1, 'nameKelas' => 1, 'nameBagian' => 1,
                'nameAlpa'      => 1, 'nameSakit' => 1, 'nameIzin' => 1,  'nameMasuk' => 1, 'nameTelat' => 1,
                'idAlpa'        => 1000, 'forAlpa' => 1000, 'idSakit' => 2000, 'forSakit' => 2000,
                'idIzin'        => 3000, 'forIzin' => 3000, 'idMasuk' => 4000, 'forMasuk' => 4000,
                'idTelat'       => 5000, 'forTelat' => 5000,
            ];
            return view('siswa/insertAbsen', $data);
            // ------------------------------------------------------------------------------
        }
    }


    // Pilih kelas
    // -------------------------------------------------------------------------------
    public function pilih_kelas()
    {
        $pilih_kelas    = $this->request->getVar('pilih_kelas');
        $pilih_bagian   = $this->request->getVar('pilih_bagian');
        $tanggal        = $this->request->getVar('tanggal');

        // $validasi_insert = $this->validate(
        //     [
        //         'pilih_kelas' => [
        //             'rules'     => 'required',
        //             'errors'    => [
        //                 'required'  => 'Pilih kelas dulu dong!'
        //             ]
        //         ],
        //         'pilih_bagian' => [
        //             'rules' => 'required',
        //             'errors'    => [
        //                 'required'  => 'Pilih Bagian juga dong!'
        //             ]
        //         ]
        //     ]
        // );

        $validasi_insert    = $this->validate($this->Absensi->inputAbsenAlert);
        if (!$validasi_insert) {
            return redirect()->to(site_url('absensi/rekapAbsen_Harian/'))->withInput();
        }

        $current_page       = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        if (!empty($pilih_kelas) && $pilih_bagian == 'all') {

            $dataAbsensi        = $this->Absensi->where(['kelas' => $pilih_kelas, 'tanggal' => $tanggal])->orderBy('fullname', 'asc');
            $data = [
                'judul'         => "User Siswa",
                'dataAbsensi'   => $dataAbsensi->paginate(10, 'pages_absen_harian'),
                'pager'         => $dataAbsensi->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
                'nama_hari'     => $this->daftar_hari,
                'nama_bulan'    => $this->bulan,
                'pilih_kelas'   => $pilih_kelas,
                'pilih_bagian'  => $pilih_bagian,
                'kabeh_kelas'   => 'all',
                'kabeh_bagian'  => 'all',
                // Untuk Pengulangan Pada name, id, dan for di file view absen,
                'username'      => 1, 'fullname' => 1, 'nameKelas' => 1, 'nameBagian' => 1,
                'nameAlpa'      => 1, 'nameSakit' => 1, 'nameIzin' => 1,  'nameMasuk' => 1, 'nameTelat' => 1,
                'idAlpa'        => 1000, 'forAlpa' => 1000, 'idSakit' => 2000, 'forSakit' => 2000,
                'idIzin'        => 3000, 'forIzin' => 3000, 'idMasuk' => 4000, 'forMasuk' => 4000,
                'idTelat'       => 5000, 'forTelat' => 5000,
            ];
            return view('siswa/rekapAbsen_Harian', $data);
            // ------------------------------------------------------------------------------
        } elseif (!empty($pilih_kelas) && !empty($pilih_bagian)) {

            $alpa           = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'tanggal' => $tanggal, 'absen' => 'alpa'])->countAllResults();
            $sakit          = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'tanggal' => $tanggal, 'absen' => 'sakit'])->countAllResults();
            $izin           = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'tanggal' => $tanggal, 'absen' => 'izin'])->countAllResults();
            $telat          = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'tanggal' => $tanggal, 'absen' => 'telat'])->countAllResults();
            $masuk          = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'tanggal' => $tanggal, 'absen' => 'masuk'])->countAllResults();
            $dataAbsensi    = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'tanggal' => $tanggal])->orderBy('fullname', 'asc');
            $data = [
                'judul'         => "User Siswa",
                'dataAbsensi'   => $dataAbsensi->paginate(10, 'pages_absen_harian'),
                'pager'         => $dataAbsensi->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
                'alpa'          => $alpa,
                'sakit'         => $sakit,
                'izin'          => $izin,
                'telat'         => $telat,
                'masuk'         => $masuk,
                'nama_hari'     => $this->daftar_hari,
                'nama_bulan'    => $this->bulan,
                'pilih_kelas'   => $pilih_kelas,
                'pilih_bagian'  => $pilih_bagian,
                'kabeh_kelas'   => 'all',
                'kabeh_bagian'  => 'all',
                // Untuk Pengulangan Pada name, id, dan for di file view absen,
                'username'      => 1, 'fullname' => 1, 'nameKelas' => 1, 'nameBagian' => 1,
                'nameAlpa'      => 1, 'nameSakit' => 1, 'nameIzin' => 1,  'nameMasuk' => 1, 'nameTelat' => 1,
                'idAlpa'        => 1000, 'forAlpa' => 1000, 'idSakit' => 2000, 'forSakit' => 2000,
                'idIzin'        => 3000, 'forIzin' => 3000, 'idMasuk' => 4000, 'forMasuk' => 4000,
                'idTelat'       => 5000, 'forTelat' => 5000,
            ];
            return view('siswa/rekapAbsen_Harian', $data);
            // ------------------------------------------------------------------------------
        }
    }


    // edit / tambah absen di untuk guru/admin
    // ------------------------------------------------------------------------------
    public function insert()
    {
        $validasi_insert = $this->validate($this->Absensi->inputAbsenAlert);
        if (!$validasi_insert) {

            session()->setFlashdata('error', $validasi_insert);
            return redirect()->back()->withInput();
            // ------------------------------------------------------------------------------
        } else {
            // Variabel untuk looping name getVar
            $nameUsername   = 1;
            $nameFullname   = 1;
            $nameKelas      = 1;
            $nameBagian     = 1;
            $nameAbsen      = 1;
            $noKelas        = 1;
            $noBagian       = 1;
            $noUser         = 1;
            // ------------------------------------------------------------------------------            
            do {
                $pilih_kelas        = $this->request->getVar('kelas' . $noKelas++);
                $pilih_bagian       = $this->request->getVar('bagian' . $noBagian++);
                $user               = $this->request->getVar('username' . $noUser++);

                if ($user == null) break;

                $data = ([
                    'username'   => $this->request->getVar('username' . $nameUsername++),
                    'fullname'   => $this->request->getVar('fullname' . $nameFullname++),
                    'kelas'      => $this->request->getVar('kelas' . $nameKelas++),
                    'bagian'     => $this->request->getVar('bagian' . $nameBagian++),
                    'tanggal'    => $this->request->getVar('tanggal'),
                    'absen'      => $this->request->getVar('absen' . $nameAbsen++),
                ]);
                $this->Absensi->insert($data);
                // ------------------------------------------------------------------------------  
            } while ($user != null && $pilih_kelas != null && $pilih_bagian != null);

            $updateAlert = "Absen berhasil ditambahkan";
            session()->setFlashdata('update', $updateAlert);
            return redirect()->to(site_url('Absensi/pilih_insertAbsen'))->withInput();
        }
    }


    public function rekapAbsen_Harian()
    {
        $pilih_kelas    = $this->request->getVar('pilih_kelas');
        $pilih_bagian   = $this->request->getVar('pilih_bagian');
        $keyword_absen  = $this->request->getVar('keyword_absen');


        $bulan_ini      = date("Y-m-d");
        $tgl_pertama    = date('Y-m-01', strtotime($bulan_ini));
        $tgl_terakhir   = date('Y-m-t', strtotime($bulan_ini));

        // Ambil Absen pada tanggal paling besar Maksimal berdasarkan hari pada bulan sekarang
        $akhirBulan     = $this->Absensi->selectMax('tanggal')->where('month(tanggal)', date('m'))->get()->getResult();

        // Data Absen berdasarkan tanggal sekarang ------------------------------------------------------------------------
        $dataAbsensi    = $this->Absensi->orderBy('month(tanggal)', 'desc')->get()->getResult();
        $alpa           = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'absen' => 'alpa'])->countAllResults();
        $sakit          = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'absen' => 'sakit'])->countAllResults();
        $izin           = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'absen' => 'izin'])->countAllResults();
        $telat          = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'absen' => 'telat'])->countAllResults();
        $masuk          = $this->Absensi->where(['kelas' => $pilih_kelas, 'bagian' => $pilih_bagian, 'absen' => 'masuk'])->countAllResults();
        $current_page   = $this->request->getVar('page_pages_absen_harian') ? $this->request->getVar('page_pages_absen_harian') : 1;

        if ($keyword_absen) {
            $cari = $this->Absensi->search($keyword_absen);
            $data = [
                'judul'         => "Absen Siswa",
                'nama_hari'     => $this->daftar_hari,
                'nama_bulan'    => $this->bulan,
                'dataAbsensi'   => $cari->orderBy('month(tanggal)', 'desc')->paginate(10, 'pages_absen_harian'),
                'pager'         => $cari->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
                'alpa'          => $alpa,
                'sakit'         => $sakit,
                'izin'          => $izin,
                'telat'         => $telat,
                'masuk'         => $masuk,
            ];
        } else {
            $data = [
                'judul'         => "Absen Siswa",
                'nama_hari'     => $this->daftar_hari,
                'nama_bulan'    => $this->bulan,
                'dataAbsensi'   => $this->Absensi->orderBy('month(tanggal)', 'desc')->paginate(10, 'pages_absen_harian'),
                'pager'         => $this->Absensi->pager,
                'current_page'  => $current_page,
                'dataKelas'     => $this->list_kelas,
                'dataBagian'    => $this->list_bagian,
                'alpa'          => $alpa,
                'sakit'         => $sakit,
                'izin'          => $izin,
                'telat'         => $telat,
                'masuk'         => $masuk,
            ];
        }

        return view('siswa/rekapAbsen_Harian', $data);
    }


    public function rekapAbsen()
    {
        $pilih_bulan    = $this->request->getVar('pilih_bulan');
        foreach ($this->list_kelas as $kelas) {
            if ($kelas->kelas == "VII") {
                foreach ($this->list_bagian as $list_bgn) {
                    foreach ($list_bgn as $bgn) {
                        $kls_bgn_7      = $kelas->kelas . "-" . $bgn;
                        $gender_kls_7   = $this->KelasBagian->select('gender')->where(['kelas' => 'vii', 'bagian' => $bgn])->get()->getResult();
                        $jml_kls_bgn_7  = $this->Students->where(['kelas' => 'vii', 'bagian' => $bgn])->countAllResults();
                        $jml_sakit_7    = $this->Absensi->where(['kelas' => 'vii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'sakit'])->countAllResults();
                        $jml_izin_7     = $this->Absensi->where(['kelas' => 'vii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'izin'])->countAllResults();
                        $jml_alpa_7     = $this->Absensi->where(['kelas' => 'vii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'alpa'])->countAllResults();
                        $jml_telat_7    = $this->Absensi->where(['kelas' => 'vii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'telat'])->countAllResults();
                        $jml_hadir_7    = $this->Absensi->where(['kelas' => 'vii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'masuk'])->countAllResults();
                        $bulan          = $this->Absensi->selectMax('tanggal')->groupBy('month(tanggal)')->where('kelas', 'vii')->get()->getResult();
                        $jml_sia_7      = $jml_sakit_7 + $jml_izin_7 + $jml_alpa_7;
                        $data_sia_7     = (($jml_sia_7 / $this->hari_efektif) * 100);
                        $persen_sia_7   = round($data_sia_7, 1) . "%";
                        $data_hadir_7   = (($jml_hadir_7 / $this->hari_efektif) * 100);
                        $persen_hadir_7 = round($data_hadir_7, 1) . "%";

                        $data_7[] = ([
                            'kelas_bagian'  => $kls_bgn_7,
                            'gender'        => $gender_kls_7[0]->gender,
                            'jml_siswa'     => $jml_kls_bgn_7,
                            'bulan'         => @$bulan[0]->tanggal,
                            'sakit'         => $jml_sakit_7,
                            'izin'          => $jml_izin_7,
                            'alpa'          => $jml_alpa_7,
                            'telat'         => $jml_telat_7,
                            'jml_sia'       => $jml_sia_7,
                            'persen_sia'    => $persen_sia_7,
                            'jml_hadir'     => $jml_hadir_7,
                            'persen_hadir'  => $persen_hadir_7,
                        ]);
                    }
                }
            }
        }
        $this->RekapAbsen->insertBatch($data_7);
        // ---------------------------------------------------------------------------------------------------------

        // ---------------------------------------------------------------------------------------------------------
        foreach ($this->list_kelas as $kelas) {
            if ($kelas->kelas == "VIII") {
                if ($kelas->kelas == "VIII") {
                    $limit_bgn      = $this->KelasBagian->where('kelas', 'viii')->countAllResults();
                    $list_bagian_8  = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->Limit($limit_bgn)->get()->getResult();
                    foreach ($list_bagian_8 as $list_bgn) {
                        foreach ($list_bgn as $bgn) {
                            $kls_bgn_8      = $kelas->kelas . "-" . $bgn;
                            $gender_kls_8   = $this->KelasBagian->select('gender')->where(['kelas' => 'viii', 'bagian' => $bgn])->get()->getResult();
                            $jml_kls_bgn_8  = $this->Students->where(['kelas' => 'viii', 'bagian' => $bgn])->countAllResults();
                            $jml_sakit_8    = $this->Absensi->where(['kelas' => 'viii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'sakit'])->countAllResults();
                            $jml_izin_8     = $this->Absensi->where(['kelas' => 'viii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'izin'])->countAllResults();
                            $jml_alpa_8     = $this->Absensi->where(['kelas' => 'viii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'alpa'])->countAllResults();
                            $jml_telat_8    = $this->Absensi->where(['kelas' => 'viii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'telat'])->countAllResults();
                            $jml_hadir_8    = $this->Absensi->where(['kelas' => 'viii', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'masuk'])->countAllResults();
                            $bulan          = $this->Absensi->selectMax('tanggal')->groupBy('month(tanggal)')->where('kelas', 'viii')->get()->getResult();
                            $jml_sia_8      = $jml_sakit_8 + $jml_izin_8 + $jml_alpa_8;
                            $data_sia_8     = (($jml_sia_8 / $this->hari_efektif) * 100);
                            $persen_sia_8   = round($data_sia_8, 1) . "%";
                            $data_hadir_8   = (($jml_hadir_8 / $this->hari_efektif) * 100);
                            $persen_hadir_8 = round($data_hadir_8, 1) . "%";

                            $data_8[] = ([
                                'kelas_bagian'  => $kls_bgn_8,
                                'gender'        => @$gender_kls_8[0]->gender,
                                'jml_siswa'     => $jml_kls_bgn_8,
                                'bulan'         => @$bulan[0]->tanggal,
                                'sakit'         => $jml_sakit_8,
                                'izin'          => $jml_izin_8,
                                'alpa'          => $jml_alpa_8,
                                'telat'         => $jml_telat_8,
                                'jml_sia'       => $jml_sia_8,
                                'persen_sia'    => $persen_sia_8,
                                'jml_hadir'     => $jml_hadir_8,
                                'persen_hadir'  => $persen_hadir_8,
                            ]);
                        }
                    }
                }
            }
        }
        $this->RekapAbsen->insertBatch($data_8);
        // ---------------------------------------------------------------------------------------------------------

        // ---------------------------------------------------------------------------------------------------------
        foreach ($this->list_kelas as $kelas) {
            if ($kelas->kelas == "IX") {
                if ($kelas->kelas == "IX") {
                    $limit_bgn      = $this->KelasBagian->where('kelas', 'ix')->countAllResults();
                    $list_bagian_9  = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->Limit($limit_bgn)->get()->getResult();
                    foreach ($list_bagian_9 as $list_bgn) {
                        foreach ($list_bgn as $bgn) {
                            $kls_bgn_9      = $kelas->kelas . "-" . $bgn;
                            $gender_kls_9   = $this->KelasBagian->select('gender')->where(['kelas' => 'ix', 'bagian' => $bgn])->get()->getResult();
                            $jml_kls_bgn_9  = $this->Students->where(['kelas' => 'ix', 'bagian' => $bgn])->countAllResults();
                            $jml_sakit_9    = $this->Absensi->where(['kelas' => 'ix', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'sakit'])->countAllResults();
                            $jml_izin_9     = $this->Absensi->where(['kelas' => 'ix', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'izin'])->countAllResults();
                            $jml_alpa_9     = $this->Absensi->where(['kelas' => 'ix', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'alpa'])->countAllResults();
                            $jml_telat_9    = $this->Absensi->where(['kelas' => 'ix', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'telat'])->countAllResults();
                            $jml_hadir_9    = $this->Absensi->where(['kelas' => 'ix', 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'masuk'])->countAllResults();
                            $bulan          = $this->Absensi->selectMax('tanggal')->groupBy('month(tanggal)')->where('kelas', 'ix')->get()->getResult();
                            $jml_sia_9      = $jml_sakit_9 + $jml_izin_9 + $jml_alpa_9;
                            $data_sia_9     = (($jml_sia_9 / $this->hari_efektif) * 100);
                            $persen_sia_9   = round($data_sia_9, 1) . "%";
                            $data_hadir_9   = (($jml_hadir_9 / $this->hari_efektif) * 100);
                            $persen_hadir_9 = round($data_hadir_9, 1) . "%";

                            $data_9[] = ([
                                'kelas_bagian'  => $kls_bgn_9,
                                'gender'        => @$gender_kls_9[0]->gender,
                                'jml_siswa'     => $jml_kls_bgn_9,
                                'bulan'         => @$bulan[0]->tanggal,
                                'sakit'         => $jml_sakit_9,
                                'izin'          => $jml_izin_9,
                                'alpa'          => $jml_alpa_9,
                                'telat'         => $jml_telat_9,
                                'jml_sia'       => $jml_sia_9,
                                'persen_sia'    => $persen_sia_9,
                                'jml_hadir'     => $jml_hadir_9,
                                'persen_hadir'  => $persen_hadir_9,
                            ]);
                        }
                    }
                }
            }
        }
        $this->RekapAbsen->insertBatch($data_9);
        // ---------------------------------------------------------------------------------------------------------

        $RekapAlert = "Absen berhasil di rekap";
        session()->setFlashdata('berhasil', $RekapAlert);
        return redirect()->back()->withInput();
    }


    // Rekap ABSEN
    // ------------------------------------------------------------------------------
    public function rekapAbsen_Bulanan()
    {
        $dataRekap_7    = $this->RekapAbsen->like('kelas_bagian', 'VII-')->get()->getResult();
        $dataRekap_8    = $this->RekapAbsen->like('kelas_bagian', 'VIII-')->get()->getResult();
        $dataRekap_9    = $this->RekapAbsen->like('kelas_bagian', 'IX-')->get()->getResult();
        $data = [
            'dataRekap_7'   => $dataRekap_7,
            'dataRekap_8'   => $dataRekap_8,
            'dataRekap_9'   => $dataRekap_9,
            'nama_bulan'    => $this->bulan,
            'dataAbsensi'   => $this->Absensi->get()->getResult(),
            'dataKelas'     => $this->list_kelas,
            'dataBagian'    => $this->list_bagian,
        ];
        return view('siswa/rekapAbsen_Bulanan', $data);
    }


    // Pilih Bulan Rekap Absen
    // ------------------------------------------------------------------------------
    public function pilih_bulan_rekapan()
    {
        $pilih_bulan    = $this->request->getVar('pilih_bulan');
        $dataRekap_7    = $this->RekapAbsen->where('month(bulan)', $pilih_bulan)->like('kelas_bagian', 'VII-')->get()->getResult();
        $dataRekap_8    = $this->RekapAbsen->where('month(bulan)', $pilih_bulan)->like('kelas_bagian', 'VIII-')->get()->getResult();
        $dataRekap_9    = $this->RekapAbsen->where('month(bulan)', $pilih_bulan)->like('kelas_bagian', 'IX-')->get()->getResult();
        $data = [
            'dataRekap_7'   => $dataRekap_7,
            'dataRekap_8'   => $dataRekap_8,
            'dataRekap_9'   => $dataRekap_9,
            'nama_bulan'    => $this->bulan,
            'dataAbsensi'   => $this->Absensi->get()->getResult(),
            'dataKelas'     => $this->list_kelas,
            'dataBagian'    => $this->list_bagian,
        ];
        return view('siswa/rekapAbsen_Bulanan', $data);
    }
}
