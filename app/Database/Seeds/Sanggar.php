<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sanggar extends Seeder
{
    public function run()
    {
        $this->db->table('tsanggar')->insert([
            'Email_Sanggar' => "Admin@admin.com",
            'Nama_Sanggar' => "Admin",
            'Foto_Sanggar' => "favicon.png",
            'Id_Userkey' => 1,
            'dibuat' => date('Y-m-d'),
            'diubah' => null,
            'dihapus' => null,
        ]);
        $this->db->table('tuserkey')->insert([
            'Pass' => password_hash("Admin", true),
            'Status' => 1,
        ]);
        $faker = \Faker\Factory::create();
        for ($i = 2; $i <= 16; $i++) {
            $data = [
                'Email_Sanggar' => $faker->email,
                'Nama_Sanggar' => $faker->company(),
                'Nohp_Sanggar' => $faker->PhoneNumber(),
                'Foto_Sanggar' => "favicon.png",
                'Id_Userkey' => $i,
                'dibuat' => date('Y-m-d'),
                'diubah' => null,
                'dihapus' => null,
            ];
            // Using Query Builder
            $this->db->table('tsanggar')->insert($data);
            $this->db->table('tuserkey')->insert([
                'Pass' => password_hash("sanggar123", true),
                'dibuat' => date('Y-m-d'),
                'Status' => 0,
            ]);
        }
    }
}
