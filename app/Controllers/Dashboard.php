<?php

namespace App\Controllers;

use App\Models\BookModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new BookModel();
        $data['books'] = $model->findAll();  // Récupère tous les livres
        return view('dashboard', $data);  // Charge la vue dashboard avec les données des livres
    }
}
