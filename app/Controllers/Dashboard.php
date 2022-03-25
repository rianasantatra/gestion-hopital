<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        //$session = session();
        echo view('welcome_message');
        //echo "Welcome back, " . $session->get('username');
    }
}
