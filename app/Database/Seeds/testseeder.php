<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Myth\Auth\Password;

class TestSeeder extends Seeder
{
    public function run()
    {

        // tabel mahasiswa
        $data = [
            'nama' => 'Muhammad Iqbal',
            'nim' => '16.01.53.0012',
            'email' => 'm@pw.com',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];
        $this->db->table('mahasiswa')->insert($data);

        // tabel dosen
        $data = [
            'nama' => 'Dr. Ir. H. M. Soekarno',
            'nip' => '196704012',
            'email' => 'do@dosen.com',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];
        $this->db->table('dosen')->insert($data);

            

       
        $data = [
            [
                'name'         => 'admin',
                'description'  => 'Administrator',
            ],
            [
                'name'         => 'dosen',
                'description'  => 'kontrol'
            ],
            [
                'name'         => 'mahasiswa',
                'description'  => 'user'
            ],
           
           
        ];

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);

        $data = [
            [
                'email'         => 'admin@pw.com',
                'username'      => 'admin',
                'fullname'      => 'Tedi Sujana',
                'password_hash' => Password::hash('12345'),
                'active'        => 1,
                'created_at'    => Time::now('Asia/Jakarta', 'id_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'id_ID')
            ],
            [
                'email'         => 'dosen@pw.com',
                'username'      => 'dosen',
                'fullname'      => 'Suci Suprapto',
                'password_hash' => Password::hash('12345'),
                'active'        => 1,
                'created_at'    => Time::now('Asia/Jakarta', 'id_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'id_ID')
            ],
            [
                'email'         => 'mahasiswa@pw.com',
                'username'      => 'mahasiswa',
                'fullname'      => 'Angga',
                'password_hash' => Password::hash('12345'),
                'active'        => 1,
                'created_at'    => Time::now('Asia/Jakarta', 'id_ID'),
                'updated_at'    => Time::now('Asia/Jakarta', 'id_ID')
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);

        $data = [
            [
                'group_id'   => 1,
                'user_id'    => 1
            ],
            [
                'group_id'   => 2,
                'user_id'    => 2
            ],
            [
                'group_id'   => 3,
                'user_id'    => 3
            ],
        ];

        // Using Query Builder
        $this->db->table('auth_groups_users')->insertBatch($data);
    }
}
