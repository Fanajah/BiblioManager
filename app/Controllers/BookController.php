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
            $book = $bookModel->find($loan['book_id']);
            $books[] = [
                'book_id' => $book['id'],
                'title' => $book['title'],
                'description' => $book['description'],
                'author' => $book['author'],
                'type' => $book['type'],
                'published_year' => $book['published_year'],
                'due_date' => $loan['due_date'],
            ];
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
        if ($book['stock'] > 0) {
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

    public function returnBook($bookId)
    {
        $loanModel = new LoanModel();
        $bookModel = new BookModel();
        $userId = session()->get('user')['id'];

        // Trouver le prêt correspondant
        $loan = $loanModel->where('book_id', $bookId)
                          ->where('user_id', $userId)
                          ->first();

        if ($loan) {
            // Supprimer l'entrée de prêt
            $loanModel->delete($loan['id']);

            // Récupérer les détails du livre
            $book = $bookModel->find($bookId);

            // Augmenter le stock du livre
            $bookModel->update($bookId, ['stock' => $book['stock'] + 1]);

            return redirect()->to('/my_books'); // Rediriger vers la page des livres empruntés
        } else {
            // Gérer le cas où le prêt n'existe pas
            return redirect()->back()->with('error', 'Ce livre n\'est pas enregistré comme emprunté.');
        }
    }
}
