<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Peserta extends Seeder
{
    public function run()
    {

        for ($i = 1; $i <= 3; $i++) {
            $data = [
                'NoInduk' => "20010200020{$i}",
                'Nama' => "Ahmad {$i}",
                'Status' => 'Mahasiswa',
                'No_HP' => '08231129928',
                'Foto' => "profil.png",
                'Ket' => rand(0, 1),
                'dibuat' => date('Y-m-d'),
                'diubah' => date('Y-m-d'),
                'dihapus' => null,
            ];

            // Using Query Builder
            $this->db->table('tPeserta')->insert($data);
        }
    }
}