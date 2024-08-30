<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // Nom de la table
    protected $primaryKey = 'id';  // Clé primaire
    protected $allowedFields = ['name', 'email', 'password'];  // Champs autorisés
}
