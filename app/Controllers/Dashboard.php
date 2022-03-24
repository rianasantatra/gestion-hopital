<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        //$session = session();
        return view('welcome_message');
        //echo "Welcome back, " . $session->get('username');
    }
}
