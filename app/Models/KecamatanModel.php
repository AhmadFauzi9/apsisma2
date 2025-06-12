<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table = "wilayah_kecamatan";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $allowedFields = ['id', 'kabupaten_id', 'nama'];
}
