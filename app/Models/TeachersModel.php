<?php

namespace App\Models;

use CodeIgniter\Model;

class TeachersModel extends Model
{
    protected $table = "teachers";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'fullname', 'gender', 'jabatan', 'title', 'nip', 'nipy', 'nomorHp', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'dusun', 'kodePos', 'tempatLahir', 'tanggalLahir', 'user_img', 'status'];

    protected $registerTeachersAlert = [
        'username2' => [
            'rules'     => 'required|min_length[4]|max_length[20]|is_unique[teachers.username]',
            'errors'    => [
                'required'      => 'Username harus diisi dong!',
                'min_length'    => 'Minimal 4 karakter dong!',
                'max_length'    => 'Maksimal 20 karakter dong!',
                'is_unique'     => 'Username sudah digunakan dong!'
            ]
        ],
        'password2' => [
            'rules'     => 'required|min_length[6]|max_length[50]',
            'errors'    => [
                'required'      => 'Password harus diisi dong!',
                'min_length'    => 'Minimal 6 karakter dong!',
                'max_length'    => 'Maksimal 50 karakter dong!',
            ]
        ],
        'pass_confirm2' => [
            'rules'     => 'required|matches[password2]',
            'errors'    => [
                'required'      => 'Isi konfirmasi passwordnya dong!',
                'matches'       => 'Konfirmasi Password tidak sesuai dong!',
            ]
        ],
        'fullname2'  => [
            'rules'     => 'required|min_length[4]|max_length[100]',
            'errors'    => [
                'required'      => 'Nama Lengkap harus diisi dong!',
                'min_length'    => 'Minimal 4 karakter dong!',
                'max_length'    => 'Maksimal 100 karakter dong!',
            ]
        ],
        'gender2'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Pilih jenis kelamin dong!',
            ]
        ],
        'tempatLahir2'  => [
            'rules'     => 'required',
            'errors'    => [
                'required'      => 'Isi tempat lahirnya dong!',
            ]
        ],
        // 'dusun2'  => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'      => 'Pilih {field} dong!',
        //     ]
        // ],
        // 'desa2'  => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'      => 'Pilih {field} dong!',
        //     ]
        // ],
        // 'kecamatan2'  => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'      => 'Pilih {field} dong!',
        //     ]
        // ],
        // 'kabupaten2'  => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'      => 'Pilih {field} dong!',
        //     ]
        // ],
        // 'provinsi2'  => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'      => 'Pilih {field} dong!',
        //     ]
        // ],
        // 'kodePos2'  => [
        //     'rules'     => 'required',
        //     'errors'    => [
        //         'required'      => 'Isi {field} dong!',
        //     ]
        // ],
    ];

    // Search
    // ------------------------------------------------------------------------------
    public function Search($keyword_guru)
    {
        return $this->table('teachers')->like('username', $keyword_guru)->orLike('fullname', $keyword_guru)->orLike('jabatan', $keyword_guru)
            ->orLike('gender', $keyword_guru)->orLike('title', $keyword_guru)->orLike('nip', $keyword_guru)->orLike('nipy', $keyword_guru)
            ->orLike('alamat', $keyword_guru)->orLike('nomorHp', $keyword_guru)->orLike('tempatLahir', $keyword_guru)->orLike('tanggalLahir', $keyword_guru);
    }
}
