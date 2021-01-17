<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
//    public function __construct() {
//        ini_set('session.gc_maxlifetime', 1500);
//        session_start();
//    }

	public function index()
	{
        echo view('home');
	}



}