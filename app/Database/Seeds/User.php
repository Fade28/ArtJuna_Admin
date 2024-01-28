<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $this->db->table('tuser')->insert([
            'Email' => "Admin@admin.com",
            'Nama_Lengkap' => "Admin",
            'Id_Userkey' => 1,
            'dibuat' => date('Y-m-d'),
            'diubah' => date('Y-m-d'),
            'dihapus' => null,
        ]);
        $this->db->table('tuserkey')->insert([
            'Pass' => password_hash("Admin", true),
            'Status' => 1,
        ]);
        $faker = \Faker\Factory::create();
        for ($i = 2; $i <= 4; $i++) {
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
