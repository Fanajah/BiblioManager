<?php
namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $model = new BookModel();

        // Récupérer les paramètres de recherche, de tri et de direction
        $search = $this->request->getGet('search');
        $sort = $this->request->getGet('sort');
        $direction = $this->request->getGet('direction');

        // Construire la requête de tri
        if ($sort && $direction) {
            $model->orderBy($this->getSortColumn($sort), $direction);
        }

        // Appliquer le filtre de recherche
        if ($search) {
            $model->like('title', $search)
                  ->orLike('author', $search)
                  ->orLike('type', $search);
        }

        $books = $model->findAll();
        
        // Passer les données à la vue
        return view('dashboard', [
            'books' => $books,
            'search' => $search,
            'sort' => $sort,
            'direction' => $direction
        ]);
    }

    private function getSortColumn($sort)
    {
        switch ($sort) {
            case '1': return 'id';
            case '2': return 'title';
            case '3': return 'type';
            case '4': return 'author';
            case '5': return 'published_year';
            case '6': return 'stock';
            default: return 'id';
        }
    }
}
