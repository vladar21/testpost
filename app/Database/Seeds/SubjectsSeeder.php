<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubjectsSeeder extends Seeder
{
	public function run()
	{
        $data = [
            ['subject_title' => 'sport'],
            ['subject_title' => 'politics'],
            ['subject_title' => 'developing'],
            ['subject_title' => 'etc'],
        ];

        foreach($data as $subject){
            $this->db->table('subjects')->insert($subject);
        }
	}
}
