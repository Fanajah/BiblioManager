<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'type', 'author', 'published_year', 'stock'];  // Champs autorisés
}
