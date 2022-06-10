<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  function __construct() {
    parent::  __construct();
    $this->load->model('M_Auth');
  }

	public function login() {
		$this->load->view('auth/login');
	}

  public function action_login() {
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $check_login = $this->M_Auth->check_user($username);
    if($check_login) {
      if($check_login['password'] == $password) {
        $session = array(
          'id' => $check_login['id'],
          'fullname' => $check_login['fullname'],
          'username' => $check_login['username'],
          'is_loggedin' => TRUE
        );
        $this->session->set_userdata($session);
        redirect();
      } else {
        echo '<script>history.back(alert("Password yang anda masukkan salah!"))</script>';
      }
    } else {
      echo '<script>history.back(alert("Username yang anda masukkan tidak terdaftar!"))</script>';
    }
  }

  public function logout() {
    session_start();
    session_destroy();
    redirect('auth/login');
  }
}
