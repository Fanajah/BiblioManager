<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register');  // Charge la vue 'register'
    }

    public function process()
    {
        $model = new UserModel();
        $password = $this->request->getPost('password');

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $hash,
        ];
        $model->insert($data);

        // Rediriger vers la page de login après l'inscription
        return redirect()->to('/login');
    }
}
