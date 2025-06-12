<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasBagianModel extends Model
{
    protected $table = "kelas_bagian";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['kelas', 'bagian', 'gender', 'wali_kelas', 'nomorHp'];

    protected $validasiTambah_kelas = [
        'kelas'     => [
            'rules' => 'required',
            'errors'    => [
                'required'  => 'Kelas wajib diisi dong!'
            ]
        ],
        'bagian'     => [
            'rules'  => 'required',
            'errors'    => [
                'required'  => 'Bagian wajib diisi dong!'
            ]
        ],
        'gender'     => [
            'rules'  => 'required',
            'errors'    => [
                'required'  => 'Golongan jeni kelamin wajib diisi dong!'
            ]
        ],
        'wali_kelas' => [
            'rules'  => 'required',
            'errors'    => [
                'required'  => 'Wali Kelas wajib diisi dong!'
            ]
        ],
        'nomorHp'    => [
            'rules'  => 'required',
            'errors'    => [
                'required'  => 'Nomor Hp wajib diisi dong!'
            ]
        ],
    ];

    protected $validasiEdit_kelas = [
        'kelas'     => [
            'rules' => 'required',
            'errors'    => [
                'required'  => 'Kelas wajib diisi dong!'
            ]
        ],
        'bagian'     => [
            'rules'  => 'required',
            'errors'    => [
                'required'  => 'Bagian wajib diisi dong!'
            ]
        ],
        'gender'     => [
            'rules'  => 'required',
            'errors'    => [
                'required'  => 'Golongan jeni kelamin wajib diisi dong!'
            ]
        ],
    ];
}
