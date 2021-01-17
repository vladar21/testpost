<?php namespace App\Database\Seeds;

use App\Models\SubjectModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class PostsSeeder extends Seeder
{
	public function run()
	{
        $faker = \Faker\Factory::create("en_AU");

        $modelUser = new UserModel();
        $users = $modelUser->findAll();

        $modelSubject = new SubjectModel();
        $subjectIds = $modelSubject->findColumn('id');

        foreach($users as $user){
            $subject_id = ($user['subject_id']) ? $user['subject_id'] : '';
            $data = [
                'user_id' => $user['id'],
                'post_description'  => $faker->realText($faker->numberBetween(100,200)),
            ];
            if ($subject_id > 0){
                $data['subject_id'] = $subject_id;
            }
            else {
                $data['subject_id'] = $faker->randomElement($subjectIds);
            }

            $this->db->table('posts')->insert($data);

        }
	}
}
