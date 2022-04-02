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

        return DataTable::of($builder)
        ->addNumbering()
        ->add('action', function ($row) {
            return '<button type="button" class="btn btn-primary" onclick="alert(\'edit user: ' . $row->im . '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger" onclick="alert(\'edit user: ' . $row->im . '\')"><i class="fas fa-trash"></i> Delete</button>';
        })->toJson(true);
    }
}
