<?php

namespace App\Controllers;

use Aws\S3\S3Client;

class Folder extends BaseController
{
  public function view_folder($folder_id) {
    if ($this->session->active) {
      $folder = $this->folderModel->where('folder_id', $folder_id)->first();
      $folder['department'] = $this->departmentModel->where('department_id', $folder['department_id'])->first();
      $page_data['folder'] = $folder;
      $files = $this->fileModel->where('containing_folder', $folder_id)->findAll();
      foreach ($files as $key => $file) {
        $file_creator = $file['user_id'];
        $user = $this->userModel->where('user_id', $file_creator)->first();
        $files[$key]['creator'] = $user;
      }
      $page_data['files'] = $files;
      $page_data['folders'] = $this->folderModel->where('containing_folder', $folder_id)->findAll();
      return view('folder', $page_data);
    }
    return redirect('auth');
  }

  public function upload_file() {
    if ($this->session->active) {
      $s3 = new S3Client([
        'region' => getenv('AWS_REGION'),
        'version' => getenv('VERSION'),
        'credentials' => [
          'key' => getenv('ACCESS_KEY_ID'),
          'secret' => getenv('SECRET_ACCESS_KEY')
        ],
      ]);
      $validated = $this->validate([
        'file' => ['uploaded[file]'],
      ]);
      if ($validated) {
        $file = $this->request->getFile('file');
        $post_data = $this->request->getPost();
        try {
          $s3->putObject([
            'Bucket' => getenv('S3_BUCKET'),
            'Key' => $file->getClientName(),
            'SourceFile' => $file->getTempName(),
          ]);
          $file_data = [
            'user_id' => $this->session->get('user_id'),
            'name' => $file->getClientName(),
            'mime_type' => $file->guessExtension(),
            'size' => $file->getSize(),
            'containing_folder' => $post_data['folder']
          ];
          $this->fileModel->save($file_data);
        } catch (\Exception $e) {
          $response_data['success'] = false;
          $response_data['msg'] = $e->getMessage();
          return $this->response->setJSON($response_data);
        }
        $response_data['success'] = true;
        $response_data['msg'] = 'File upload successful';
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem uploading your file';
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function create_folder() {
    if ($this->session->active) {
      $this->validation->setRules([
        'name' => 'required|is_unique[folders.name]',
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $folder = $this->folderModel->where('folder_id', $post_data['folder'])->first();
        $folder_data = array(
          'name' => $post_data['name'],
          'department_id' => $folder['department_id'],
          'containing_folder' => $post_data['folder'],
        );
        $new_folder = $this->folderModel->save($folder_data);
        if ($new_folder) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new folder';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new department';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new department';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

}