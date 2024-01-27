<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

require_once 'vendor/autoload.php';

class Industri extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 3; $i++) {
            $data = [
                'Nama' => $faker->userName,
                'dibuat' => date('Y-m-d'),
                'diubah' => date('Y-m-d'),
                'dihapus' => null,
            ];

            // Using Query Builder
            $this->db->table('tIndustri')->insert($data);
        }
    }
}
