<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model {
  var $table = 'mst_produk';
  public function getData() {
    $this->db->select('a.*, b.nama_kategori');
    $this->db->from($this->table.' a');
    $this->db->join('mst_kategori b', 'a.id_kategori = b.id', 'INNER');
    return $this->db->get()->result_array();
  }

  public function getDetail($id) {
    $this->db->select('a.*, b.nama_kategori');
    $this->db->from($this->table.' a');
    $this->db->join('mst_kategori b', 'a.id_kategori = b.id', 'INNER');
    $this->db->where('a.id', $id);
    return $this->db->get()->row_array();
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