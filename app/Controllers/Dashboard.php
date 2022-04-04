<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use \Hermawan\DataTables\DataTable;

class Dashboard extends Controller
{
    public function index()
    {
        helper('url');
        return view('welcome_message');
    }

    public function list()
    {
        $db = db_connect();
        $builder = $db->table('users')->select('id, im, username');

        return DataTable::of($builder)
            ->addNumbering()
            ->add('action', function ($row) {
                return '<button id="' . $row->id . '" type="button" class="btn btn-primary btnedit"><i class="fas fa-edit"></i> Edit</button>
                        <button id="' . $row->id . '" type="button" class="btn btn-danger btndelete"><i class="fas fa-trash"></i> Delete</button>';
            })->toJson(true);
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data = $model->where('id', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {

        helper(['form', 'url']);

        $model = new UserModel();

        $id = $this->request->getVar('id');

        $data = [
            'im' => $this->request->getVar('im'),
            'username'  => $this->request->getVar('username'),
        ];

        $update = $model->update($id, $data);
        if ($update != false) {
            $data = $model->where('id', $id);
            echo json_encode(array("status" => true, 'data' => $data));
            return redirect()->to('/dashboard');
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
            return redirect()->to('/dashboard');
        }
    }

    public function delete($id = null)
    {
        helper(['form', 'url']);
        $model = new UserModel();
        $data = $model->where('id', $id)->delete();
        echo json_encode(array("status" => TRUE, 'data' => $data));
        return redirect()->to('/dashboard');
    }
}
