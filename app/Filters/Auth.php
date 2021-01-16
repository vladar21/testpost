<?php namespace App\Filters;
 
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if user not logged in
        if(! session()->get('logged_in')){
            // then redirct to login page
            return redirect()->to('/login'); 
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

    public static function getLoggedUser(){
        $user_id = session()->user_id;
        $modelUser = new UserModel();
        $loggedUser = $modelUser->find($user_id);
        return $loggedUser;
    }
}