<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sanggar extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 5; $i <= 7; $i++) {
            $data = [
                'Email_Sanggar' => $faker->email,
                'Nama_Sanggar' => $faker->company(),
                'Nohp_Sanggar' => "+(62) 8" . $faker->PhoneNumber(),
                'Id_Userkey' => $i,
                'dibuat' => date('Y-m-d'),
                'diubah' => date('Y-m-d'),
                'dihapus' => null,
            ];
            // Using Query Builder
            $this->db->table('tsanggar')->insert($data);
            $this->db->table('tuserkey')->insert([
                'Pass' => password_hash("sanggar123", true),
                'Status' => 0,
            ]);
        }
    }
}
