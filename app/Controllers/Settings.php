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
    $page_data['departments'] = $this->departmentModel->findAll();
    return view('department-settings', $page_data);
  }

  public function create_department() {
    $this->validation->setRules([
      'name' => 'required|is_unique[departments.name]',
    ]);
    $response_data = array();
    if ($this->validation->withRequest($this->request)->run()) {
      $post_data = $this->request->getPost();
      $plan_data = array(
        'name' => $post_data['name'],
      );
      $new_plan = $this->departmentModel->save($plan_data);
      if ($new_plan) {
        $response_data['success'] = true;
        $response_data['msg'] = 'Successfully created new department';
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
}
