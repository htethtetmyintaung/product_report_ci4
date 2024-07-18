<?php
namespace App\Models;

use CodeIgniter\Model;

class productModel extends Model
{
    // protected $table = 'products';
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['name', 'description', 'price'];

    protected $table = 'products'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'description', 'price', 'branch_id'];

    public function getProductsByBranch($branchId)
    {
        if ($branchId) {
            return $this->where('branch_id', $branchId)->findAll();
        } else {
            return $this->findAll();
        }
    }
}
