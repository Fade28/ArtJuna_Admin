<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tsanggar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id_Sanggar' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Email_Sanggar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Nama_Sanggar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Desc_Sanggar' => [
                'type' => 'Text',

            ],
            'Alamat_Sanggar' => [
                'type' => 'TEXT',
            ],
            'Nohp_Sanggar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Foto_Sanggar' => [
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
        $this->forge->addKey('Id_Sanggar', true);
        $this->forge->createTable('tsanggar');

    }

    public function down()
    {
        $this->forge->dropTable('tsanggar');
    }
}
