<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapAbsenModel extends Model
{
    protected $table = 'rekap_absensi';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['kelas_bagian', 'jml_siswa', 'gender', 'bulan', 'sakit', 'izin', 'alpa', 'telat', 'jml_sia', 'persen_sia', 'jml_hadir', 'persen_hadir'];

    public function subtotal()
    {
        $data = [
            'jml_cowok'              => $this->RekapAbsen->selectSum('jml_siswa')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_cewek'              => $this->RekapAbsen->selectSum('jml_siswa')->where('gender', 'perempuan')->get()->getResult(),
            'jml_sakit_cowok'        => $this->RekapAbsen->selectSum('sakit')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_sakit_cewek'        => $this->RekapAbsen->selectSum('sakit')->where('gender', 'perempuan')->get()->getResult(),
            'jml_izin_cowok'         => $this->RekapAbsen->selectSum('izin')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_izin_cewek'         => $this->RekapAbsen->selectSum('izin')->where('gender', 'perempuan')->get()->getResult(),
            'jml_alpa_cowok'         => $this->RekapAbsen->selectSum('alpa')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_alpa_cewek'         => $this->RekapAbsen->selectSum('alpa')->where('gender', 'perempuan')->get()->getResult(),
            'jml_telat_cowok'        => $this->RekapAbsen->selectSum('telat')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_telat_cewek'        => $this->RekapAbsen->selectSum('telat')->where('gender', 'perempuan')->get()->getResult(),
            'jml_jml_sia_cowok'      => $this->RekapAbsen->selectSum('jml_sia')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_jml_sia_cewek'      => $this->RekapAbsen->selectSum('jml_sia')->where('gender', 'perempuan')->get()->getResult(),
            'jml_persen_sia_cowok'   => $this->RekapAbsen->selectSum('persen_sia')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_persen_sia_cewek'   => $this->RekapAbsen->selectSum('persen_sia')->where('gender', 'perempuan')->get()->getResult(),
            'jml_jml_hadir_cowok'    => $this->RekapAbsen->selectSum('jml_hadir')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_jml_hadir_cewek'    => $this->RekapAbsen->selectSum('jml_hadir')->where('gender', 'perempuan')->get()->getResult(),
            'jml_persen_hadir_cowok' => $this->RekapAbsen->selectSum('persen_hadir')->where('gender', 'laki-laki')->get()->getResult(),
            'jml_persen_hadir_cewek' => $this->RekapAbsen->selectSum('persen_hadir')->where('gender', 'perempuan')->get()->getResult(),
        ];
        return $data;
    }
}
