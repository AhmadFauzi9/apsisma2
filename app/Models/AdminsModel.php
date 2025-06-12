<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminsModel extends Model
{
    protected $table = "admins";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'username', 'password', 'image', 'role_id', 'is_active'];


    // pesan validasi mendaftar akun admin
    // ------------------------------------------------------------------------------
    protected $registerAdminsAlert = [
        'name1' => [
            'rules'     => 'required|min_length[4]|max_length[20]',
            'errors'    => [
                'required'      => 'Username harus diisi dong!',
                'min_length'    => 'Minimal 4 karakter dong!',
                'max_length'    => 'Maksimal 20 karakter dong!',
            ]
        ],
        'username1' => [
            'rules'     => 'required|min_length[4]|max_length[20]|is_unique[admins.username]',
            'errors'    => [
                'required'      => 'Username harus diisi dong!',
                'min_length'    => 'Minimal 4 karakter dong!',
                'max_length'    => 'Maksimal 20 karakter dong!',
                'is_unique'     => 'Username sudah digunakan dong!'
            ]
        ],
        'password1' => [
            'rules'     => 'required|min_length[6]|max_length[50]',
            'errors'    => [
                'required'      => 'Password harus diisi dong!',
                'min_length'    => 'Minimal 6 karakter dong!',
                'max_length'    => 'Maksimal 50 karakter dong!',
            ]
        ],
        'pass_confirm1' => [
            'rules'     => 'required|matches[password1]',
            'errors'    => [
                'required'      => 'Isi konfirmasi passwordnya dong!',
                'matches'       => 'Konfirmasi Password tidak sesuai dong!',
            ]
        ]
    ];

    // Search 
    // ------------------------------------------------------------------------------
    public function Search($keyword_admin)
    {
        return $this->table('admins')->like('name', $keyword_admin)->orLike('username', $keyword_admin);
    }
}
