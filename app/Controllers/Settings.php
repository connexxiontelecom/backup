<?php

namespace App\Controllers;

class Settings extends BaseController
{
  public function index() {
    return view('user-settings');
  }

  public function users() {
    return view('user-settings');
  }

  public function create_user() {

  }

  public function departments() {
    return view('department-settings');
  }

  public function create_department() {

  }
}
