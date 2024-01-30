<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 5; $i <= 7; $i++) {
            $data = [
                'Email' => $faker->email,
                'Nama_Lengkap' => $faker->userName,
                'Nohp' => "+(62) 8" . $faker->PhoneNumber(),
                'Id_Userkey' => $i,
                'dibuat' => date('Y-m-d'),
                'diubah' => date('Y-m-d'),
                'dihapus' => null,
            ];
            // Using Query Builder
            $this->db->table('tuser')->insert($data);
            $this->db->table('tuserkey')->insert([
                'Pass' => password_hash("12345", true),
                'Status' => 0,
            ]);
        }
    }
}
