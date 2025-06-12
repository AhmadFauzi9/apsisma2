<?php

namespace App\Controllers\Mtsa;

class Tentang extends BaseController
{
    protected $judul;
    protected $visi;
    protected $misi;
    public function __construct()
    {
        $this->judul = [
            'visi' => "Visi",
            'misi'  => "Misi"
        ];

        $this->visi = "\“Unggul dalam kompetensi agama, akademik, life skill dan berakhlakul karimah\”";
        $this->misi = "<li>Membekali pengetahuan agama islam yang kuat</li>
                        <li>Meningkatkan kesadaran diri siswa atas tugas dan kewajiban beribadah</li>.
                        <li>Meningkatkan kualitas tingkat kelulusan</li>.
                        <li>Mengenalkan dan membekali siswa dengan ketrampilan kecakapan hidup</li>.
                        <li>Mengamalkan dan melaksanakan budaya ahlakul karimah dalam kehidupan sehari-hari</li>";
    }

    public function visimisi()
    {
        $data =  [
            'judul' => $this->judul,
            'visi' => $this->visi,
            'misi' => $this->misi
        ];
        return view('tentang/visimisi', $data);
    }
}

$visimisi = new Tentang();
