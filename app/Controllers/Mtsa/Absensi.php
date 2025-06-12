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
        $this->bulan_2dgit      = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $this->list_kelas       = $this->KelasBagian->Select('kelas')->groupBy('kelas')->orderBy('id', 'asc')->get()->getResult();
        $this->list_bagian      = $this->KelasBagian->Select('bagian')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
        $this->limit_bagian_7   = $this->KelasBagian->select('bagian')->where('kelas', 'vii')->countAllResults();
        $this->limit_bagian_8   = $this->KelasBagian->select('bagian')->where('kelas', 'viii')->countAllResults();
        $this->limit_bagian_9   = $this->KelasBagian->select('bagian')->where('kelas', 'ix')->countAllResults();

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
            'judul'             => "Absen Siswa",
            'hari'              => $this->daftar_hari,
            'bulan'             => $this->bulan,
            'dataStudents'      => $dataSiswa,
            'dataAbsensi'       => $dataAbsensi,
            'dataKelas'         => $this->list_kelas,
            'dataBagian'        => $this->list_bagian,
            'limit_bagian_7'    => $this->limit_bagian_7,
            'limit_bagian_8'    => $this->limit_bagian_8,
            'limit_bagian_9'    => $this->limit_bagian_9,
            'kabeh_kelas'       => 'all',
            'kabeh_bagian'      => 'all',
            'alpa'              => $alpa,
            'sakit'             => $sakit,
            'izin'              => $izin,
            'telat'             => $telat,
            'masuk'             => $masuk,
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


    // edit / tambah absen di untuk guru/admin
    // ------------------------------------------------------------------------------
    public function editAbsen()
    {
        // Variabel untuk looping name getVar
        $noId           = 1;
        $nameAbsen      = 1;
        // ------------------------------------------------------------------------------
        do {
            $id         = $this->request->getVar('id' . $noId++);
            $dataAbsen  = $this->Absensi->where('id', $id)->get()->getResult();

            if ($dataAbsen == null) break;

            $this->Absensi->update($id, [
                'tanggal'    => $this->request->getVar('tanggal'),
                'absen'      => $this->request->getVar('absen' . $nameAbsen++),
            ]);
            // ------------------------------------------------------------------------------  
        } while ($dataAbsen != null);

        $updateAlert = "Absen berhasil di ubah";
        session()->setFlashdata('update', $updateAlert);
        return redirect()->back()->withInput();
    }

    // hasil Absen siswa
    // ------------------------------------------------------------------------------
    public function toeditAbsen()
    {
        // Limit banyak absen bulan sekarang ----------------------------------------------------------------------------
        $limit_absen    = $this->Absensi->where('month(tanggal)', date('m'))->countAllResults();

        // Data Absen berdasarkan bulan sekarang ------------------------------------------------------------------------
        // $pilih_dataAbsensi      = $this->Absensi->where(['username' => $username, 'month(tanggal)' => date('m')]);
        // $dataAbsensi            = $pilih_dataAbsensi->orderBy('month(tanggal)', 'desc')->Limit($limit_absen)->get()->getResult();

        // $wali_kelas     = $this->KelasBagian->get()->getResult();
        // $alpa           = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'alpa'])->countAllResults();
        // $sakit          = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'sakit'])->countAllResults();
        // $izin           = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'izin'])->countAllResults();
        // $telat          = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'telat'])->countAllResults();
        // $masuk          = $this->Absensi->where(['month(tanggal)' => date('m'), 'username' => $username, 'absen' => 'masuk'])->countAllResults();
        // $persen_masuk   = ($masuk / $this->hari_efektif * 100);
        // $persen_sakit   = ($sakit / $this->hari_efektif * 100);
        // $persen_izin    = ($izin / $this->hari_efektif * 100);
        // $persen_alpa    = ($alpa / $this->hari_efektif * 100);
        // $persen_telat   = ($telat / $this->hari_efektif * 100);
        $data = [
            'judul'         => "Absen Siswa",
            // 'nama_hari'     => $this->daftar_hari,
            // 'nama_bulan'    => $this->bulan,
            // 'dataAbsensi'   => $dataAbsensi,
            // 'wali_kelas'    => $wali_kelas,
            // 'alpa'          => $alpa,
            // 'sakit'         => $sakit,
            // 'izin'          => $izin,
            // 'telat'         => $telat,
            // 'masuk'         => $masuk,
            // 'persen_masuk'  => $persen_masuk,
            // 'persen_sakit'  => $persen_sakit,
            // 'persen_izin'   => $persen_izin,
            // 'persen_alpa'   => $persen_alpa,
            // 'persen_telat'  => $persen_telat,
        ];
        return view('siswa/editAbsen', $data);
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
        $dataAbsensi    = $this->Absensi->orderBy('month(tanggal)', 'asc')->get()->getResult();
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
                'dataAbsensi'   => $cari->orderBy('month(tanggal)', 'asc')->paginate(10, 'pages_absen_harian'),
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
                'dataAbsensi'   => $this->Absensi->orderBy('month(tanggal)', 'asc')->paginate(10, 'pages_absen_harian'),
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

        if ($pilih_bulan) {
            foreach ($this->list_kelas as $kelas) {
                if ($kelas->kelas == "VII") {
                    $list_bagian = $this->list_bagian;
                    // d($list_bagian_7);
                    // ---------------------------------------------------------------------------------------------------------
                } elseif ($kelas->kelas == "VIII") {
                    $list_bagian  = $this->KelasBagian->Select('bagian')->where('kelas', 'viii')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
                    // d($list_bagian_8);
                    // ---------------------------------------------------------------------------------------------------------
                } elseif ($kelas->kelas == "IX") {
                    $list_bagian  = $this->KelasBagian->Select('bagian')->where('kelas', 'ix')->groupBy('bagian')->orderBy('id', 'asc')->get()->getResult();
                    // d($list_bagian_9);
                    // ---------------------------------------------------------------------------------------------------------
                }
                foreach ($list_bagian as $list_bgn) {
                    foreach ($list_bgn as $bgn) {
                        $kls_bgn        = $kelas->kelas . "-" . $bgn;
                        $gender_kls     = $this->KelasBagian->select('gender')->where(['kelas' => $kelas->kelas, 'bagian' => $bgn])->get()->getResult();
                        // ---------------------------------------------------------------------------------------------------------
                        $jml_kls_bgn    = $this->Students->where(['kelas' => $kelas->kelas, 'bagian' => $bgn])->countAllResults();
                        // ---------------------------------------------------------------------------------------------------------
                        $jml_sakit      = $this->Absensi->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'sakit'])->countAllResults();
                        $jml_izin       = $this->Absensi->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'izin'])->countAllResults();
                        $jml_alpa       = $this->Absensi->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'alpa'])->countAllResults();
                        $jml_telat      = $this->Absensi->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'telat'])->countAllResults();
                        // ---------------------------------------------------------------------------------------------------------
                        $jml_hadir      = $this->Absensi->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'telat'])->countAllResults();
                        $jml_hadir      += $this->Absensi->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan, 'absen' => 'masuk'])->countAllResults();
                        // ---------------------------------------------------------------------------------------------------------
                        $bulan          = $this->Absensi->selectMax('tanggal')->groupBy('month(tanggal)')->where('kelas', $kelas->kelas)->get()->getResult();
                        $jml_sia        = $jml_sakit + $jml_izin + $jml_alpa;
                        // ---------------------------------------------------------------------------------------------------------
                        if ($jml_sia != 0) {
                            // Persen SIA Harian = (Jumlah SIA Perhari / Total Siswa perkelas) * 100 %
                            $data_sia       = ($jml_sia / $jml_kls_bgn) * 100;
                            $persen_sia     = round(($data_sia), 1);
                        } else {
                            $data_sia       = 0 * 100;
                            $persen_sia     = round(($data_sia), 1);
                        }
                        // ---------------------------------------------------------------------------------------------------------
                        if ($jml_hadir != 0) {
                            // Persen HADIR Harian = J(umlah HADIR Perhari / Total Siswa perkelas) * 100 %
                            $data_hadir     = ($jml_hadir / $jml_kls_bgn) * 100;
                            $persen_hadir   = round(($data_hadir), 1);
                        } else {
                            $data_hadir     = 0 * 100;
                            $persen_hadir   = round(($data_hadir), 1);
                        }
                        // ---------------------------------------------------------------------------------------------------------
                        $data_id[]      = $this->Absensi->select('id')->where(['kelas' => $kelas->kelas, 'bagian' => $bgn, 'month(tanggal)' => $pilih_bulan])->get()->getResult();
                        // ---------------------------------------------------------------------------------------------------------
                        $data[]         = ([
                            'kelas_bagian'  => $kls_bgn,
                            'gender'        => $gender_kls[0]->gender,
                            'jml_siswa'     => $jml_kls_bgn,
                            'bulan'         => @$bulan[0]->tanggal,
                            'sakit'         => $jml_sakit,
                            'izin'          => $jml_izin,
                            'alpa'          => $jml_alpa,
                            'telat'         => $jml_telat,
                            'jml_sia'       => $jml_sia,
                            'persen_sia'    => $persen_sia,
                            'jml_hadir'     => $jml_hadir,
                            'persen_hadir'  => $persen_hadir,
                        ]);
                    }
                }
            }
            // Insert rekap bulanan
            // ---------------------------------------------------------------------------------------------------------
            $rekap = $this->RekapAbsen->insertBatch($data);

            // Hapus data absen harian sesuai id setelah di rekap bulanan
            // ---------------------------------------------------------------------------------------------------------
            if ($rekap) {
                foreach ($data_id as $id) {
                    foreach ($id as $d) {
                        $this->Absensi->where('id', $d->id);
                        $this->Absensi->delete();
                    }
                }
            }
        }

        $RekapAlert = "Absen berhasil di rekap";
        session()->setFlashdata('berhasil', $RekapAlert);
        return redirect()->back()->withInput();
    }


    // Rekap ABSEN
    // ---------------------------------------------------------------------------------------------------------
    public function rekapAbsen_Bulanan()
    {
        $dataRekap              = $this->RekapAbsen->where('month(bulan)', date('m'))->get()->getResult();
        $dataRekap_7            = $this->RekapAbsen->where('month(bulan)', date('m'))->like('kelas_bagian', 'VII-')->get()->getResult();
        $dataRekap_8            = $this->RekapAbsen->where('month(bulan)', date('m'))->like('kelas_bagian', 'VIII-')->get()->getResult();
        $dataRekap_9            = $this->RekapAbsen->where('month(bulan)', date('m'))->like('kelas_bagian', 'IX-')->get()->getResult();

        $total_siswa            = $this->RekapAbsen->selectSum('jml_siswa')->get()->getResult();
        $jml_cowok              = $this->RekapAbsen->selectSum('jml_siswa')->where('gender', 'laki-laki')->get()->getResult();
        $jml_cewek              = $this->RekapAbsen->selectSum('jml_siswa')->where('gender', 'perempuan')->get()->getResult();

        $total_sakit            = $this->RekapAbsen->selectSum('sakit')->get()->getResult();
        $jml_sakit_cowok        = $this->RekapAbsen->selectSum('sakit')->where('gender', 'laki-laki')->get()->getResult();
        $jml_sakit_cewek        = $this->RekapAbsen->selectSum('sakit')->where('gender', 'perempuan')->get()->getResult();

        $total_izin             = $this->RekapAbsen->selectSum('izin')->get()->getResult();
        $jml_izin_cowok         = $this->RekapAbsen->selectSum('izin')->where('gender', 'laki-laki')->get()->getResult();
        $jml_izin_cewek         = $this->RekapAbsen->selectSum('izin')->where('gender', 'perempuan')->get()->getResult();

        $total_alpa             = $this->RekapAbsen->selectSum('alpa')->get()->getResult();
        $jml_alpa_cowok         = $this->RekapAbsen->selectSum('alpa')->where('gender', 'laki-laki')->get()->getResult();
        $jml_alpa_cewek         = $this->RekapAbsen->selectSum('alpa')->where('gender', 'perempuan')->get()->getResult();

        $total_telat            = $this->RekapAbsen->selectSum('telat')->get()->getResult();
        $jml_telat_cowok        = $this->RekapAbsen->selectSum('telat')->where('gender', 'laki-laki')->get()->getResult();
        $jml_telat_cewek        = $this->RekapAbsen->selectSum('telat')->where('gender', 'perempuan')->get()->getResult();

        $total_sia              = $this->RekapAbsen->selectSum('jml_sia')->get()->getResult();
        $jml_sia_cowok          = $this->RekapAbsen->selectSum('jml_sia')->where('gender', 'laki-laki')->get()->getResult();
        $jml_sia_cewek          = $this->RekapAbsen->selectSum('jml_sia')->where('gender', 'perempuan')->get()->getResult();

        $jml_hadir_cowok        = $this->RekapAbsen->selectSum('jml_hadir')->where('gender', 'laki-laki')->get()->getResult();
        $jml_hadir_cewek        = $this->RekapAbsen->selectSum('jml_hadir')->where('gender', 'perempuan')->get()->getResult();
        $total_masuk            = $this->RekapAbsen->selectSum('jml_hadir')->get()->getResult();
        $total_hadir            = (int)$total_masuk[0]->jml_hadir + (int)$total_telat[0]->telat;

        // JUMLAH PERSEN SIA
        // ---------------------------------------------------------------------------------------------------------
        $total_sia_cowok       = $this->RekapAbsen->selectSum('jml_sia')->where('gender', 'laki-laki')->get()->getResult();
        if ($total_sia_cowok[0]->jml_sia != 0) {
            // Persen SIA LAKI-LAKI Bulanan = Jumlah SIA LAKI-LAKI Perbulan / (Total Siswa * hari efektif) * 100 %
            $jml_persen_sia_cowok = round((((int)$jml_sia_cowok[0]->jml_sia / ((int)$jml_cowok[0]->jml_siswa * $this->hari_efektif)) * 100), 1);
        } else {
            $jml_persen_sia_cowok = 0;
        }
        // ---------------------------------------------------------------------------------------------------------
        $total_sia_cewek       = $this->RekapAbsen->selectSum('jml_sia')->where('gender', 'perempuan')->get()->getResult();
        foreach ($total_sia_cewek as $per_sia_cewek) {
            if ($per_sia_cewek->jml_sia != 0) {
                // Persen SIA PEREMPUAN Bulanan = Jumlah SIA PEREMPUAN Perbulan / (Total Siswa * hari efektif) * 100 %
                $jml_persen_sia_cewek = round((((int)$jml_sia_cewek[0]->jml_sia / ((int)$jml_cewek[0]->jml_siswa * $this->hari_efektif)) * 100), 1);
            } else {
                $jml_persen_sia_cewek = 0;
            }
        }

        // JUMLAH PERSEN HADIR
        // ---------------------------------------------------------------------------------------------------------
        $total_hadir_cowok     = $this->RekapAbsen->selectSum('jml_hadir')->where('gender', 'laki-laki')->get()->getResult();
        foreach ($total_hadir_cowok as $per_hadir_cowok) {
            if ($per_hadir_cowok->jml_hadir != 0) {
                // Persen HADIR LAKI-LAKI Bulanan = Jumlah HADIR LAKI-LAKI Perbulan / (Total Siswa * hari efektif) * 100 %
                $jml_persen_hadir_cowok = round((((int)$jml_hadir_cowok[0]->jml_hadir / ((int)$jml_cowok[0]->jml_siswa * $this->hari_efektif)) * 100), 1);
            } else {
                $jml_persen_hadir_cowok = 0;
            }
        }

        // ---------------------------------------------------------------------------------------------------------
        $total_hadir_cewek     = $this->RekapAbsen->selectSum('jml_hadir')->where('gender', 'perempuan')->get()->getResult();
        foreach ($total_hadir_cewek as $per_hadir_cewek) {
            if ($per_hadir_cewek->jml_hadir != 0) {
                // Persen HADIR PEREMPUAN Bulanan = Jumlah HADIR PEREMPUAN Perbulan / (Total Siswa * hari efektif) * 100 %
                $jml_persen_hadir_cewek = round((((int)$jml_hadir_cewek[0]->jml_hadir / ((int)$jml_cewek[0]->jml_siswa * $this->hari_efektif)) * 100), 1);
            } else {
                $jml_persen_hadir_cewek = 0;
            }
        }

        // TOTAL SISWA, SAKIT, IZIN, ALPA, TELAT, SIA, HADIR | TOTAL PERSEN SAKIT, IZIN, ALPA, TELAT, SIA, HADIR
        // Persen SAKIT Bulanan = Jumlah SAKIT Perbulan / (Total Siswa * hari efektif) * 100 %
        // ---------------------------------------------------------------------------------------------------------
        if ($total_sakit[0]->sakit != 0) {
            $total_persen_sakit = round(($total_sakit[0]->sakit / ($total_siswa[0]->jml_siswa * $this->hari_efektif)) * 100, 1);
        } else {
            $total_persen_sakit = 0;
        }

        // Persen IZIN Bulanan = Jumlah IZIN Perbulan / (Total Siswa * hari efektif) * 100 %
        // ---------------------------------------------------------------------------------------------------------
        if ($total_izin[0]->izin != 0) {
            $total_persen_izin  = round(($total_izin[0]->izin / ($total_siswa[0]->jml_siswa * $this->hari_efektif)) * 100, 1);
        } else {
            $total_persen_izin  = 0;
        }

        // Persen ALPA Bulanan = Jumlah ALPA Perbulan / (Total Siswa * hari efektif) * 100 %
        // ---------------------------------------------------------------------------------------------------------
        if ($total_alpa[0]->alpa != 0) {
            $total_persen_alpa  = round(($total_alpa[0]->alpa / ($total_siswa[0]->jml_siswa * $this->hari_efektif)) * 100, 1);
        } else {
            $total_persen_alpa  = 0;
        }

        // Persen HADIR Bulanan = Jumlah HADIR Perbulan / (Total Siswa * hari efektif) * 100 %
        // ---------------------------------------------------------------------------------------------------------
        if ($total_telat[0]->telat != 0) {
            $total_persen_telat = round(($total_telat[0]->telat / ($total_siswa[0]->jml_siswa * $this->hari_efektif)) * 100, 1);
        } else {
            $total_persen_telat = 0;
        }

        // Persen SIA Bulanan = Jumlah SIA Perbulan / (Total Siswa * hari efektif) * 100 %
        // ---------------------------------------------------------------------------------------------------------
        if ($total_sia[0]->jml_sia != 0) {
            $total_persen_sia   = round(($total_sia[0]->jml_sia / ($total_siswa[0]->jml_siswa * $this->hari_efektif)) * 100, 1);
        } else {
            $total_persen_sia   = 0;
        }

        // Persen HADIR Bulanan = Jumlah HADIR Perbulan / (Total Siswa * hari efektif) * 100 %
        // ---------------------------------------------------------------------------------------------------------
        $total_hadir            = (int)$jml_hadir_cowok[0]->jml_hadir + (int)$jml_hadir_cewek[0]->jml_hadir;
        if ($total_hadir != 0) {
            $total_persen_hadir = round(($total_hadir / ($total_siswa[0]->jml_siswa * $this->hari_efektif)) * 100, 1);
        } else {
            $total_persen_hadir = 0;
        }

        $data = [
            'dataRekap'              => $dataRekap,
            'dataRekap_7'            => $dataRekap_7,
            'dataRekap_8'            => $dataRekap_8,
            'dataRekap_9'            => $dataRekap_9,
            'hari_efektif'           => $this->hari_efektif,
            'nama_bulan'             => $this->bulan,
            'dataAbsensi'            => $this->Absensi->get()->getResult(),
            'dataKelas'              => $this->list_kelas,
            'dataBagian'             => $this->list_bagian,
            'jml_cowok'              => $jml_cowok,
            'jml_cewek'              => $jml_cewek,
            'jml_sakit_cowok'        => $jml_sakit_cowok,
            'jml_sakit_cewek'        => $jml_sakit_cewek,
            'jml_izin_cowok'         => $jml_izin_cowok,
            'jml_izin_cewek'         => $jml_izin_cewek,
            'jml_alpa_cowok'         => $jml_alpa_cowok,
            'jml_alpa_cewek'         => $jml_alpa_cewek,
            'jml_telat_cowok'        => $jml_telat_cowok,
            'jml_telat_cewek'        => $jml_telat_cewek,
            'jml_sia_cowok'          => $jml_sia_cowok,
            'jml_sia_cewek'          => $jml_sia_cewek,
            'jml_persen_sia_cowok'   => $jml_persen_sia_cowok,
            'jml_persen_sia_cewek'   => $jml_persen_sia_cewek,
            'jml_hadir_cowok'        => $jml_hadir_cowok,
            'jml_hadir_cewek'        => $jml_hadir_cewek,
            'jml_persen_hadir_cowok' => $jml_persen_hadir_cowok,
            'jml_persen_hadir_cewek' => $jml_persen_hadir_cewek,
            'total_siswa'            => $total_siswa,
            'total_sia'              => $total_sia,
            'total_hadir'            => $total_hadir,
            'total_persen_sakit'     => $total_persen_sakit,
            'total_persen_izin'      => $total_persen_izin,
            'total_persen_alpa'      => $total_persen_alpa,
            'total_persen_telat'     => $total_persen_telat,
            'total_persen_sia'       => $total_persen_sia,
            'total_persen_hadir'     => $total_persen_hadir,
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
