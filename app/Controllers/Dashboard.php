<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \Hermawan\DataTables\DataTable;

class Dashboard extends Controller
{
    public function index()
    {
        helper('url');
        return view('welcome_message');
    }

    public function search()
    {
        $db = db_connect(); 
        $builder = $db->table('users')->select('id, im, username');

        return DataTable::of($builder)->toJson(true);
    }
}
