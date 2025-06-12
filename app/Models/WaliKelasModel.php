<?php

namespace App\Models;

use CodeIgniter\Model;

class WaliKelasModel extends Model
{
    protected $table = 'wali_kelas';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'title', 'wali_kelas'];
}
