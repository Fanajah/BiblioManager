<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');  // Charge la vue 'login'
    }

    public function process()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Vérification de l'utilisateur
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Stocker les informations de l'utilisateur en session
            session()->set('user', $user);

            // Rediriger vers une page après connexion réussie
            return redirect()->to('/dashboard');
        } else if (password_verify($password, $user['password'])) {
            $error = 'Mot de passe erroné';
        } else {
            $error = 'Identifiants invalides';
        }
        
        return redirect()->back()->with('error', $error);
    }

    public function logout()
    {
        // Détruire la session
        session()->destroy();
        return redirect()->to('/login');
    }
}
