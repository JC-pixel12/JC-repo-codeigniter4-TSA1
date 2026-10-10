<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey ='id';
    protected $allowedFields = ['username', 'password', 'full_name', 'created_at', 'avatar', 'created_at'];
    protected $returnType = 'array';
}