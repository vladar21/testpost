<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
 
    public function auth()
    {
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['role_id'] = $data['role_id'];
                $_SESSION['subject_id'] = $data['subject_id'];
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['user_email'] = $data['user_email'];
                $_SESSION['logged_in'] = TRUE;
                return redirect()->to('/post');
            }else{
                $_SESSION['msg'] = 'Wrong Password';
                return redirect()->to('/login');
            }
        }else{
            $_SESSION['msg'] = 'Email not Found';
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}