<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tuser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id_User' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Nama_Lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Nohp' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Id_Userkey' => [
                'type' => 'INT',
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
        $this->forge->addKey('Id_User', true);
        $this->forge->createTable('tuser');

    }

    public function down()
    {
        $this->forge->dropTable('tuser');
    }
}
