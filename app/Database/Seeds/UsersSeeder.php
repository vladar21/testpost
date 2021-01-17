<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
	    $password = password_hash('123', PASSWORD_DEFAULT);
        // create manager with id=1
        $data = [
            [
                'role_id' => 1,
                'user_name'  => 'Manager',
                'user_email' => 'manager@manager.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 2,
                'subject_id' => 1,
                'user_name'  => 'GroupManager1',
                'user_email' => 'group_manager1@manager.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 2,
                'subject_id' => 2,
                'user_name'  => 'GroupManager2',
                'user_email' => 'group_manager2@manager.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 2,
                'subject_id' => 3,
                'user_name'  => 'GroupManager3',
                'user_email' => 'group_manager3@manager.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 2,
                'subject_id' => 4,
                'user_name'  => 'GroupManager4',
                'user_email' => 'group_manager4@manager.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 3,
                'user_name'  => 'Regular1',
                'user_email' => 'regular1@regular.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 3,
                'user_name'  => 'Regular2',
                'user_email' => 'regular2@regular.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 3,
                'user_name'  => 'Regular3',
                'user_email' => 'regular3@regular.com',
                'user_password' => $password,
            ],
            [
                'role_id' => 3,
                'user_name'  => 'Regular4',
                'user_email' => 'regular4@regular.com',
                'user_password' => $password,
            ],

        ];

        foreach($data as $user){
            $this->db->table('users')->insert($user);
        }
	}
}
