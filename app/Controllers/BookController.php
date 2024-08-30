<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\BookModel;
use CodeIgniter\Controller;

class BookController extends Controller
{
    public function myBooks()
    {
        $loanModel = new LoanModel();
        $bookModel = new BookModel();
        $userId = session()->get('user')['id'];

        // Obtenir les prêts de l'utilisateur
        $loans = $loanModel->getUserLoans($userId);

        // Récupérer les détails des livres empruntés
        $books = [];
        foreach ($loans as $loan) {
            // Vérifie si 'book_id' est défini dans les prêts
            if (isset($loan['book_id'])) {
                $book = $bookModel->find($loan['book_id']);

                // Assure-toi que les données du livre sont présentes
                if ($book) {
                    $books[] = [
                        'title' => $book['title'] ?? 'Titre non spécifié',
                        'author' => $book['author'] ?? 'Auteur non spécifié',
                        'type' => $book['type'] ?? 'Type non spécifié',
                        'published_year' => $book['published_year'] ?? 'Année non spécifiée',
                        'stock' => $book['stock'] ?? 'Stock non spécifié',
                        'description' => $book['description'] ?? 'Description non spécifiée',
                        'due_date' => $loan['due_date'] ?? 'Date non spécifiée',
                    ];
                }
            }
        }

        // Passer les livres empruntés à la vue
        return view('my_books', ['books' => $books]);
    }

    public function borrow($bookId)
    {
        $loanModel = new LoanModel();
        $bookModel = new BookModel();

        // Récupérer les détails du livre
        $book = $bookModel->find($bookId);

        // Vérifier si le livre est disponible
        if ($book && $book['stock'] > 0) {
            // Créer une nouvelle entrée de prêt
            $dueDate = date('Y-m-d', strtotime('+15 days')); // Date d'échéance 15 jours plus tard

            $loanData = [
                'book_id' => $bookId,
                'user_id' => session()->get('user')['id'],
                'loan_date' => date('Y-m-d'),
                'due_date' => $dueDate,
            ];

            // Insérer les données d'emprunt
            $loanModel->insert($loanData);

            // Réduire le stock du livre
            $bookModel->update($bookId, ['stock' => $book['stock'] - 1]);

            return redirect()->to('/my_books'); // Rediriger vers la page des livres empruntés
        } else {
            // Gérer le cas où le livre n'est pas disponible
            return redirect()->back()->with('error', 'Le livre n\'est pas disponible.');
        }
    }
}
