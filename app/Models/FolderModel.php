<?php
namespace App\Models;

use CodeIgniter\Model;

class FolderModel extends Model {
  protected $table = 'folders';
  protected $primaryKey = 'folder_id';
  protected $allowedFields = [
    'department_id', 'containing_folder', 'name'
  ];
}