<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StartSeeder extends Seeder
{
	public function run()
	{
        $this->call('RolesSeeder');
        $this->call('SubjectsSeeder');
        $this->call('UsersSeeder');
        $this->call('PostsSeeder');

	}
}
