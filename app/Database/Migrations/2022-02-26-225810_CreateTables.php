<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        /*
         * Students Table
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username'         => ['type' => 'int', 'constraint' => 6],
            'password'         => ['type' => 'varchar', 'constraint' => 255],
            'level_id'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 3],
            'nisn'             => ['type' => 'varchar', 'constraint' => 255],
            'fullname'         => ['type' => 'varchar', 'constraint' => 100],
            'gender'           => ['type' => 'varchar', 'constraint' => 9],
            'tempatLahir'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'tanggalLahir'     => ['type' => 'date', 'constraint', 'null' => true],
            'kelas'            => ['type' => 'varchar', 'constraint' => 255],
            'bagian'           => ['type' => 'varchar', 'constraint' => 255],
            'asrama'           => ['type' => 'varchar', 'constraint' => 255],
            'kode'             => ['type' => 'varchar', 'constraint' => 255],
            'angkatan'         => ['type' => 'varchar', 'constraint' => 255],
            'provinsi'         => ['type' => 'varchar', 'constraint' => 255],
            'kabupaten'        => ['type' => 'varchar', 'constraint' => 255],
            'kecamatan'        => ['type' => 'varchar', 'constraint' => 255],
            'desa'             => ['type' => 'varchar', 'constraint' => 255],
            'dusun'            => ['type' => 'varchar', 'constraint' => 255],
            'kodePos'          => ['type' => 'varchar', 'constraint' => 255],
            'namaAyah'         => ['type' => 'varchar', 'constraint' => 255],
            'namaIbu'          => ['type' => 'varchar', 'constraint' => 255],
            'nomorHp'          => ['type' => 'varchar', 'constraint' => 20],
            'raport'           => ['type' => 'varchar', 'constraint' => 255],
            'monthly'          => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'user_img'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 'default.svg'],
            'status'           => ['type' => 'varchar', 'constraint' => 255, 'default' => 'aktif'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('students', true);


        /*
         * Teachers Table
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username'         => ['type' => 'varchar', 'constraint' => 30],
            'password'         => ['type' => 'varchar', 'constraint' => 255],
            'level_id'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 2],
            'fullname'         => ['type' => 'varchar', 'constraint' => 100],
            'title'            => ['type' => 'varchar', 'constraint' => 50],
            'nip'              => ['type' => 'varchar', 'constraint' => 50],
            'nipy'             => ['type' => 'varchar', 'constraint' => 50],
            'jabatan'          => ['type' => 'varchar', 'constraint' => 50],
            'gender'           => ['type' => 'varchar', 'constraint' => 255],
            'tempatLahir'      => ['type' => 'varchar', 'constraint' => 255],
            'tanggalLahir'     => ['type' => 'date', 'constraint', 'null' => true],
            'provinsi'         => ['type' => 'varchar', 'constraint' => 255],
            'kabupaten'        => ['type' => 'varchar', 'constraint' => 255],
            'kecamatan'        => ['type' => 'varchar', 'constraint' => 255],
            'desa'             => ['type' => 'varchar', 'constraint' => 255],
            'dusun'            => ['type' => 'varchar', 'constraint' => 255],
            'kodePos'          => ['type' => 'varchar', 'constraint' => 255],
            'user_img'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 'default.svg'],
            'status'           => ['type' => 'varchar', 'constraint' => 255],
            'nomorHp'          => ['type' => 'varchar', 'constraint' => 20],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('teachers', true);


        // /*
        // * Admins Table
        // */
        // $this->forge->addField([
        //     'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        //     'username'         => ['type' => 'varchar', 'constraint' => 30],
        //     'password'         => ['type' => 'varchar', 'constraint' => 255],
        //     'level_id'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 1],
        //     'fullname'         => ['type' => 'varchar', 'constraint' => 100],
        //     'title'            => ['type' => 'varchar', 'constraint' => 50],
        //     'nip'              => ['type' => 'varchar', 'constraint' => 50],
        //     'nipy'             => ['type' => 'varchar', 'constraint' => 50],
        //     'jabatan'          => ['type' => 'varchar', 'constraint' => 50],
        //     'gender'           => ['type' => 'varchar', 'constraint' => 255],
        //     'tempatLahir'      => ['type' => 'varchar', 'constraint' => 255],
        //     'tanggalLahir'     => ['type' => 'date', 'constraint', 'null' => true],
        //     'provinsi'         => ['type' => 'varchar', 'constraint' => 255],
        //     'kabupaten'        => ['type' => 'varchar', 'constraint' => 255],
        //     'kecamatan'        => ['type' => 'varchar', 'constraint' => 255],
        //     'desa'             => ['type' => 'varchar', 'constraint' => 255],
        //     'dusun'            => ['type' => 'varchar', 'constraint' => 255],
        //     'kodePos'          => ['type' => 'varchar', 'constraint' => 255],
        //     'user_img'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 'default.svg'],
        //     'status'           => ['type' => 'varchar', 'constraint' => 255],
        //     'nomorHp'          => ['type' => 'varchar', 'constraint' => 20],
        //     'created_at'       => ['type' => 'datetime', 'null' => true],
        //     'updated_at'       => ['type' => 'datetime', 'null' => true],
        //     'deleted_at'       => ['type' => 'datetime', 'null' => true],
        // ]);

        // $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('username');
        // $this->forge->createTable('admins', true);

        /*
        * Admins Table
        */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'             => ['type' => 'varchar', 'constraint' => 128],
            'username'         => ['type' => 'varchar', 'constraint' => 128],
            'password'         => ['type' => 'varchar', 'constraint' => 255],
            'image'            => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'role_id'          => ['type' => 'int', 'constraint' => 11, 'default' => 1],
            'is_active'        => ['type' => 'int', 'constraint' => 1, 'default' => 1],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('admins', true);

        /*
         * Absensi Table
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username'         => ['type' => 'varchar', 'constraint' => 6],
            'fullname'         => ['type' => 'varchar', 'constraint' => 100],
            'kelas'            => ['type' => 'varchar', 'constraint' => 10],
            'bagian'           => ['type' => 'varchar', 'constraint' => 5],
            'absen'            => ['type' => 'varchar', 'constraint' => 10],
            'tanggal'          => ['type' => 'date', 'constraint', 'null' => true],
            'keterangan'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('absensi', true);


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


        /*
         * Pspdb Table
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'fullname'         => ['type' => 'varchar', 'constraint' => 100],
            'gender'           => ['type' => 'varchar', 'constraint' => 255],
            'tempatLahir'      => ['type' => 'varchar', 'constraint' => 255],
            'tanggalLahir'     => ['type' => 'date', 'constraint', 'null' => true],
            'namaWali'         => ['type' => 'varchar', 'constraint' => 255],
            'asalSekolah'      => ['type' => 'varchar', 'constraint' => 255],
            'nomorHp'          => ['type' => 'varchar', 'constraint' => 20],
            'programKelas'     => ['type' => 'varchar', 'constraint' => 255],
            'ekskul'           => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'user_img'         => ['type' => 'varchar', 'constraint' => 255, 'default' => 'default.svg'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pspdb', true);


        /*
         * Kelas_bagian Table
         */
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kelas'         => ['type' => 'varchar', 'constraint' => 10],
            'bagian'        => ['type' => 'varchar', 'constraint' => 10],
            'gender'        => ['type' => 'varchar', 'constraint' => 10],
            'wali_kelas'    => ['type' => 'varchar', 'constraint' => 255],
            'nomorHp'       => ['type' => 'varchar', 'constraint' => 255],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kelas_bagian', true);
    }

    public function down()
    {
        $this->forge->dropTable('students');
        $this->forge->dropTable('teachers');
        $this->forge->dropTable('admins');
        $this->forge->dropTable('absensi');
        $this->forge->dropTable('rekap_absensi');
        $this->forge->dropTable('pspdb');
        $this->forge->dropTable('kelas_bagian');
    }
}
