<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index() {
	  if ($this->session->active) {
      $page_data['departments'] = $this->departmentModel->findAll();
      if ($this->session->is_admin == 1) {
        $page_data['files'] = $this->fileModel->findAll();
        $page_data['all_folders'] = $this->folderModel->findAll();
        $page_data['users'] = $this->userModel->findAll();
      }
      $page_data['department'] = $this->departmentModel->where('department_id', $this->session->department_id)->first();
      $page_data['folders'] = $this->folderModel->where('department_id', $this->session->department_id)->findAll();
      return view('index', $page_data);
    }
	  return redirect('auth');
	}
}
