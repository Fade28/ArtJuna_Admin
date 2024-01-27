<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tpeserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id_peserta' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'NoInduk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'No_HP' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'Foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Ket' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'dibuat' => [
                'type' => 'date',
                'null' => true,
            ],
            'diubah' => [
                'type' => 'date',
                'null' => true,
            ],
            'dihapus' => [
                'type' => 'date',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('Id_peserta', true);
        $this->forge->createTable('tpeserta');

    }

    public function down()
    {
        $this->forge->dropTable('tpeserta');
    }
}