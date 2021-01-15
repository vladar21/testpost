<?php namespace App\Controllers;


class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Welcome back, ".$session->get('user_name');
    }
}
