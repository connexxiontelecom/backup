<?php
namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model {
  protected $table = 'files';
  protected $primaryKey = 'file_id';
  protected $allowedFields = [
    'user_id', 'name', 'mime_type', 'size', 'containing_folder', 'deleted_at'
  ];
}