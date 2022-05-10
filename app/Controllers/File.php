<?php

namespace App\Controllers;

use Aws\S3\S3Client;

class File extends BaseController {

  public function index() {
    if ($this->session->active) {
      if ($this->session->is_admin == 1) {
        $page_data['departments'] = $this->departmentModel->findAll();
        $folders = $this->folderModel->where('containing_folder', 0)->findAll();
        foreach ($folders as $key => $folder) {
          $department = $this->departmentModel->where('department_id', $folder['department_id'])->first();
          $folders[$key]['department'] = $department;
        }
        $page_data['folders'] = $folders;
        $files = $this->fileModel->where('containing_folder', 0)->findAll();
        foreach ($files as $key => $file) {
          $file_creator = $file['user_id'];
          $user = $this->userModel->where('user_id', $file_creator)->first();
          $files[$key]['creator'] = $user;
          $department = $this->departmentModel->where('department_id', $user['department_id'])->first();
          $files[$key]['department'] = $department;
        }
        $page_data['files'] = $files;
      } else {
        $page_data['folders'] = $this->folderModel->where(['department_id' => $this->session->department_id, 'containing_folder' => 0])->findAll();
        $page_data['files'] = [];
        $files = $this->fileModel->where('containing_folder', 0)->findAll();
        foreach ($files as $file) {
          $file_creator = $file['user_id'];
          $user = $this->userModel->where('user_id', $file_creator)->first();
          if ($user['department_id'] == $this->session->department_id) {
            $file['creator'] = $user;
            $page_data['files'][] = $file;
          }
        }
      }
      return view('files', $page_data);
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
            'containing_folder' => 0
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

  public function download_file($file_id) {
    if ($this->session->active) {
      $s3 = new S3Client([
        'region' => getenv('AWS_REGION'),
        'version' => getenv('VERSION'),
        'credentials' => [
          'key' => getenv('ACCESS_KEY_ID'),
          'secret' => getenv('SECRET_ACCESS_KEY')
        ],
      ]);
      $file = $this->fileModel->find($file_id);
      if ($file) {
        try {
          $result = $s3->getObject([
            'Bucket' => getenv('S3_BUCKET'),
            'Key' => $file['name'],
          ]);
          header("Content-Type: {$result['ContentType']}");
          header('Content-Disposition: attachment; filename=' . $file['name']);
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          echo $result['Body'];
        } catch (\Exception $e) {
          $response_data['success'] = false;
          $response_data['msg'] = $e->getMessage();
          return $this->response->setJSON($response_data);
        }
        $response_data['success'] = true;
        $response_data['msg'] = 'File download successful';
        return $this->response->setJSON($response_data);
      }
      $response_data['success'] = false;
      $response_data['msg'] = 'File not found';
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
        if ($this->session->is_admin == 1 && $post_data['department']) {
          $department = $post_data['department'];
        } else {
          $department = $this->session->department_id;
        }
        $folder_data = array(
          'name' => $post_data['name'],
          'department_id' => $department,
          'containing_folder' => 0,
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

  public function delete_file($file_id) {
    if ($this->session->active) {
      $response_data = array();
      $this->fileModel->where('file_id', $file_id)->delete();
      $response_data['success'] = true;
      $response_data['msg'] = 'Successfully deleted file';
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }
}