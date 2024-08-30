<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table = 'loans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'user_id', 'loan_date', 'due_date'];

    public function getUserLoans($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}
