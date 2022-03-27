<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Dashboard extends Controller
{
    public function index()
    {
        //$session = session();
        echo view('welcome_message');
        //echo "Welcome back, " . $session->get('username');
    }

    public function search()
    {
        helper(['form', 'url']);

        $data = [];

        $db = \Config\Database::connect();

        $builder = $db->table('users');

        $query = $builder->like('username', $this->request->getVar('q'))
            ->select('id, username as text')
            ->limit(10)
            ->get();

        $data = $query->getResult();

        echo json_encode($data);
    }
}
