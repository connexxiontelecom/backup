<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index() {
	  if ($this->session->active) {
      $page_data['files'] = $this->fileModel->where('user_id', $this->session->user_id)->findAll();
      return view('index', $page_data);
    }
	  return redirect('auth');
	}
}
