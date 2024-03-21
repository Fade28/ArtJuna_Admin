<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 17; $i <= 32; $i++) {
            $data = [
                'Email' => $faker->email,
                'Nama_Lengkap' => $faker->userName,
                'Nohp' => "+(62) 8" . $faker->PhoneNumber(),
                'Alamat' => $faker->streetAddress(),
                'Id_Userkey' => $i,
                'Foto' => 'favicon.png',
                'dibuat' => date('Y-m-d'),
                'diubah' => null,
                'dihapus' => null,
            ];
            // Using Query Builder
            $this->db->table('tuser')->insert($data);
            $this->db->table('tuserkey')->insert([
                'Pass' => password_hash("12345", true),
                'dibuat' => date('Y-m-d'),
                'Status' => 0,
            ]);
        }
    }
}
