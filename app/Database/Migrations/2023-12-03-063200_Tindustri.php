<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tindustri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id_industri' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Peserta_MOU' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'Doc' => [
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
        $this->forge->addKey('Id_industri', true);
        $this->forge->createTable('tindustri');
    }

    public function down()
    {
        $this->forge->dropTable('tindustri');
    }
}
