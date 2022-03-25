<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $im = $this->request->getVar('im');
        $password = $this->request->getVar('password');
        $data = $model->where('im', $im)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($pass, $password);
            if (!$verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'im'     => $data['im'],
                    'username'    => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Mot de passe invalide');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Immatriculation invalide');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
