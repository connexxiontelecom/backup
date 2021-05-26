<?php

namespace App\Controllers;

class Settings extends BaseController
{
  public function index() {
    if ($this->session->active) {
      return view('user-settings');
    }
    return redirect('auth');
  }

  public function users() {
    if ($this->session->active) {
      $page_data['departments'] = $this->departmentModel->findAll();
      $users = $this->userModel->findAll();
      foreach ($users as $key => $user) {
        $department = $this->departmentModel->where('department_id', $user['department_id'])->first();
        $users[$key]['department'] = $department;
      }
      $page_data['users'] = $users;
      return view('user-settings', $page_data);
    }
    return redirect('auth');
  }

  public function create_user() {
    if ($this->session->active) {
      $this->validation->setRules([
        'login' => 'required|is_unique[users.login]',
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required',
        'department' => 'required'
      ]);
      $response_data = array();
      if ($this->validation->withRequest($this->request)->run()) {
        $post_data = $this->request->getPost();
        $user_data = array(
          'department_id' => $post_data['department'],
          'login' => $post_data['login'],
          'name' => $post_data['name'],
          'email' => $post_data['email'],
          'password' => password_hash($post_data['password'], PASSWORD_BCRYPT),
          'is_admin' => $post_data['is_admin'],
          'status' => true,
        );
        $new_user = $this->userModel->save($user_data);
        if ($new_user) {
          $response_data['success'] = true;
          $response_data['msg'] = 'Successfully created new user';
        } else {
          $response_data['success'] = false;
          $response_data['msg'] = 'There was a problem creating new user';
        }
      } else {
        $response_data['success'] = false;
        $response_data['msg'] = 'There was a problem creating new user';
        $response_data['meta'] = $this->validation->getErrors();
      }
      return $this->response->setJSON($response_data);
    }
    return redirect('auth');
  }

  public function departments() {
    if ($this->session->active) {
      $page_data['departments'] = $this->departmentModel->findAll();
      return view('department-settings', $page_data);
    }
    return redirect('auth');
  }

  public function create_department() {
    if ($this->session->active) {
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
    return redirect('auth');
  }
}
