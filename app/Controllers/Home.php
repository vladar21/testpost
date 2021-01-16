<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
	public function index()
	{

        $data = [
            'title' => 'Test Task'
        ];
        echo view('home', $data);
	}

	//--------------------------------------------------------------------

}
