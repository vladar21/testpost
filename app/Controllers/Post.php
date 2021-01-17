<?php namespace App\Controllers;


use App\Models\PostModel;
use App\Models\SubjectModel;
use CodeIgniter\Controller;

class Post extends Controller
{

    public function index()
    {
        //include helper form
        helper(['form']);

        $modelSubjects = new SubjectModel();

        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        $role_id = $_SESSION['role_id'];
        $subject_id = isset($_SESSION['subject_id']) ? $_SESSION['subject_id'] : '';

        $modelPost = new PostModel();
        switch ($role_id)  {
            case 3:
                $modelPost->where('user_id', $user_id); // regular
                break;
            case 2:
                if ($subject_id) {
                    $modelSubjects->where('id', $subject_id); // group_manager
                    $modelPost->where('subject_id', $subject_id); // group_manager
                }
                break;
        }
        $subjects = $modelSubjects->findAll();
        $posts = $modelPost->findAll();

        $hello = 'Hello '.$user_name.'!';

        $data = [
            'msg' => $hello,
            'posts' => $posts,
            'user_id' => $user_id,
            'subjects' => $subjects,
        ];
        echo view('post', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'subject_id'          => 'required',
            'post_description'      => 'required',
        ];

        if($this->validate($rules)){
            $model = new PostModel();
            $data = [
                'user_id'     => $this->request->getVar('user_id'),
                'subject_id'    => $this->request->getVar('subject_id'),
                'post_description' => $this->request->getVar('post_description'),
            ];
            $model->save($data);
            return redirect()->to('/post');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}