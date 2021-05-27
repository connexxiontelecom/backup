<?php

namespace App\Controllers;

use Aws\S3\S3Client;

class File extends BaseController {

  public function index() {
    if ($this->session->active) {
      return view('index');
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
    return redirect('auth');
  }
}