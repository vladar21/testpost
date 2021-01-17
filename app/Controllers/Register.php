<?php namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\SubjectModel;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{

    public function index()
    {
        //include helper form
        helper(['form']);
        $modelRole = new RoleModel();
        $roles = $modelRole->findAll();

        $modelSubject = new SubjectModel();
        $subjects = $modelSubject->findAll();

        $data = [
            'roles' => $roles,
            'subjects' => $subjects
        ];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $modelRole = new RoleModel();
        $roles = $modelRole->findAll();

        $modelSubject = new SubjectModel();
        $subjects = $modelSubject->findAll();

        $rules = [
            'role_id'            => 'required|integer',
            'subject_id'         => 'integer|permit_empty',
            'user_name'          => 'required|min_length[3]|max_length[20]',
            'user_email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'user_password'      => 'required|min_length[3]|max_length[200]',
            'confpassword'  => 'matches[user_password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'role_id'       => $this->request->getVar('role_id'),
                'user_name'     => $this->request->getVar('user_name'),
                'user_email'    => $this->request->getVar('user_email'),
                'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
            ];
            if  ($this->request->getVar('subject_id')) {
                $data['subject_id'] = $this->request->getVar('subject_id');
            }
            $user_id = $model->insert($data);

            if (isset($data['subject_id'])) {
                $ses_data['subject_id'] = $data['subject_id'];
            }

            $_SESSION['user_id'] = $user_id;
            $_SESSION['role_id'] = $data['role_id'];
            $_SESSION['subject_id'] = $data['subject_id'];
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['user_email'] = $data['user_email'];
            $_SESSION['logged_in'] = TRUE;

            return redirect()->to('/post');
        }else{
            $data = [
                'validation' => $this->validator,
                'roles' => $roles,
                'subjects' => $subjects,
            ];
            return view('register', $data);
        }
         
    }
    
}