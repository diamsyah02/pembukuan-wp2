<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
  var $table = 'users';

  public function check_user($username) {
    $this->db->where('username', $username);
    return $this->db->get($this->table)->row_array();
  }
}