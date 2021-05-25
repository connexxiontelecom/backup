<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
  protected $table = 'users';
  protected $primaryKey = 'user_id';
  protected $allowedFields = [
    'department_id', 'login', 'name', 'is_admin', 'email', 'password', 'status'
  ];
}