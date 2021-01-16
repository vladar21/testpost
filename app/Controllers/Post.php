<?php namespace App\Controllers;


use App\Filters\Auth;
use App\Models\PostModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;

class Post extends Controller
{

    public function __construct() {

        $this->session = \Config\Services::session();
    }

    public function index()
    {
        //include helper form
        helper(['form']);

        $modelRole = new RoleModel();
        $roles = $modelRole->findAll();

        $user_id = $this->session->get('user_id');
        $user_name = $this->session->get('user_name');

        $modelPost = new PostModel();
        $posts = $modelPost->where('user_id', $user_id)->findAll();

        // filtering posts by current user's role




        $hello = 'Hello '.$user_name.'!';

        $data = [
            'msg' => $hello,
            'posts' => $posts,
            'user_id' => $user_id,
            'roles' => $roles,
        ];
        echo view('post', $data);
    }

    public function save()
    {

        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'post_subject'          => 'required',
            'post_description'      => 'required',
        ];

        if($this->validate($rules)){
            $model = new PostModel();
            $data = [
                'user_id'     => $this->request->getVar('user_id'),
                'post_subject'    => $this->request->getVar('post_subject'),
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
