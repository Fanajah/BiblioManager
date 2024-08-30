<?php
namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'type', 'published_year', 'stock', 'description', 'due_date']; // Ajoute toutes les colonnes nécessaires
}
