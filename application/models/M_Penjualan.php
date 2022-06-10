<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penjualan extends CI_Model {
  var $table = 'trx_penjualan';
  var $marketplace = 'mst_marketplace';
  var $produk = 'mst_produk';

  public function getData() {
    $this->db->select('*, a.id as id_penjualan');
    $this->db->from($this->table.' a');
    $this->db->join($this->marketplace.' b', 'b.id = a.mst_marketplace_id', 'left');
    $this->db->join($this->produk.' c', 'c.id = a.mst_produk_id', 'left');
    return $this->db->get()->result_array();
  }

  public function getDetail($id) {
    $this->db->where('id', $id);
    return $this->db->get($this->table)->row_array();
  }

  public function getDataByDate($dateFrom, $dateTo) {
    $this->db->select('*, a.id as id_pembelian');
    $this->db->from($this->table.' a');
    $this->db->join($this->marketplace.' b', 'b.id = a.mst_marketplace_id', 'left');
    $this->db->join($this->produk.' c', 'c.id = a.mst_produk_id', 'left');
    $this->db->where('a.created_at >=', $dateFrom.' 00:00:00');
    $this->db->where('a.created_at <=', $dateTo.' 23:59:59');
    return $this->db->get()->result_array();
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