<?php

namespace App\Database\Seeds;


class SimpleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'role_name' => 'manager'
        ];

        // Using Query Builder
        $this->db->table('roles')->insert($data);
    }
}
