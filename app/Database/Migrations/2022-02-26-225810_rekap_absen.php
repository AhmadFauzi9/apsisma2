<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RekapAbsensi extends Migration
{
    public function up()
    {
        /*
         * Rekap_absensi Table
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kelas_bagian'     => ['type' => 'varchar', 'constraint' => 6],
            'gender'           => ['type' => 'varchar', 'constraint' => 100],
            'jml_siswa'        => ['type' => 'varchar', 'constraint' => 100],
            'bulan'            => ['type' => 'date', 'constraint', 'null' => true],
            'sakit'            => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'izin'             => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'alpa'             => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'telat'            => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'jml_sia'          => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'persen_sia'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'jml_hadir'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'persen_hadir'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('rekap_absensi', true);
    }

    public function down()
    {
        $this->forge->dropTable('rekap_absensi');
    }
}
