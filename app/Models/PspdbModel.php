<?php

namespace App\Models;

use CodeIgniter\Model;

class PspdbModel extends Model
{
    protected $table = "pspdb";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'fullname', 'gender', 'tempatLahir', 'tanggalLahir', 'namaWali', 'asalSekolah', 'nomorHp', 'programKelas', 'ekskul'];


    // pesan validasi form pspdb
    // ------------------------------------------------------------------------------
    protected $pspdbAlert = [
        'fullname' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Nama Lengkap wajib diisi dong!'
            ]
        ],
        'gender' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Pilih jenis kelamin dong!'
            ]
        ],
        'tempatLahir' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Tempat lahir wajib diisi dong!'
            ]
        ],
        'tanggalLahir' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Tanggal lahir wajib diisi dong!'
            ]
        ],
        'namaWali' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Nama orang tua / Wali wajib diisi dong!'
            ]
        ],
        'asalSekolah' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Asal Sekolah wajib diisi dong!'
            ]
        ],
        'nomorHp' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Nomor WhatsApp wajib diisi dong!'
            ]
        ],
        'programKelas' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Wajib pilih program kelas dong!'
            ]
        ],
        'extrakulikuler' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Wajib pilih salah satu Ekstrakulikuler'
            ]
        ]
    ];
}
