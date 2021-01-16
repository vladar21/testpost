<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function __construct() {

        $this->session = \Config\Services::session();
    }

    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'user_name'          => 'required|min_length[3]|max_length[20]',
            'user_email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'user_password'      => 'required|min_length[3]|max_length[200]',
            'confpassword'  => 'matches[user_password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'     => $this->request->getVar('user_name'),
                'user_email'    => $this->request->getVar('user_email'),
                'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
            ];
            $user_id = $model->insert($data);

            $ses_data = [
                'user_id'       => $user_id,
                'user_name'     => $data['user_name'],
                'user_email'    => $data['user_email'],
                'logged_in'     => TRUE
            ];

            $this->session->set($ses_data);
            return redirect()->to('/post');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
         
    }
    
}
