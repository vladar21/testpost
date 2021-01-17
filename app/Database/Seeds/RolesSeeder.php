<?php

namespace App\Database\Seeds;


class RolesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            ['role_name' => 'manager'],
            ['role_name' => 'group_manager'],
            ['role_name' => 'regular']
        ];

        foreach($data as $role){
            $this->db->table('roles')->insert($role);
        }

    }
}
