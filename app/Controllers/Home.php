<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
	  if ($this->session->active) {
      return view('index');
    }
	  return redirect('auth');
	}
}
