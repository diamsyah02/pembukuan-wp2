<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model {
  var $table = 'mst_produk';
  public function getData() {
    return $this->db->get($this->table)->result_array();
  }

  public function getDetail($id) {
    $this->db->where('id', $id);
    return $this->db->get($this->table)->row_array();
  }

  public function save($data) {
    $this->db->insert($this->table, $data);
  }

  public function update($id, $data) {
    $this->db->where('id', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
  }
}
?>