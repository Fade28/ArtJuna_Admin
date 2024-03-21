<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tproduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id_Produk' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Nama_Produk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Desc_Produk' => [
                'type' => 'Text',

            ],
            'Harga' => [
                'type' => 'DOUBLE',
            ],
            'Foto_Produk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'Jenis' => [
                'type' => 'INT',
            ],
            'Id_Sanggar' => [
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
        $this->forge->addKey('Id_Produk', true);
        $this->forge->createTable('tproduk');
    }

    public function down()
    {
        $this->forge->dropTable('tproduk');
    }
}
