<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tuserkey extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id_Userkey' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Pass' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('Id_Userkey', true);
        $this->forge->createTable('tuserkey');

    }

    public function down()
    {
        $this->forge->dropTable('tuserkey');
    }
}
