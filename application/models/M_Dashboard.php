<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function getPenjualanDaily() {
    $sql = 'SELECT * FROM trx_penjualan WHERE created_at BETWEEN "'.date('Y-m-d').' 00:00:00" AND "'.date('Y-m-d').' 23:59:59"';
    return $this->db->query($sql)->num_rows();
	}

  public function getPembelianDaily() {
    $sql = 'SELECT * FROM trx_pembelian WHERE created_at BETWEEN "'.date('Y-m-d').' 00:00:00" AND "'.date('Y-m-d').' 23:59:59"';
    return $this->db->query($sql)->num_rows();
  }

  public function totalPembelianDaily() {
    $total = 0;
    $sql = 'SELECT * FROM trx_pembelian WHERE created_at BETWEEN "'.date('Y-m-d').' 00:00:00" AND "'.date('Y-m-d').' 23:59:59"';
    $data = $this->db->query($sql)->result_array();
    foreach($data as $val) {
      $total += $val['price_produk'] * $val['qty'] + $val['ongkir'];
    }
    return (object)array('total' => $total);
  }

  public function totalPenjualanDaily() {
    $total = 0;
    $sql = 'SELECT * FROM trx_penjualan WHERE created_at BETWEEN "'.date('Y-m-d').' 00:00:00" AND "'.date('Y-m-d').' 23:59:59"';
    $data = $this->db->query($sql)->result_array();
    foreach($data as $val) {
      $total += $val['price_produk'] * $val['qty'];
    }
    return (object)array('total' => $total);
  }

  public function getPenjualanMonthly() {
    $query_date = date('Y-m-d');
    $start = date('Y-m-01', strtotime($query_date));
    $end = date('Y-m-t', strtotime($query_date));
    $sql = 'SELECT * FROM trx_penjualan WHERE created_at >= "'.$start.' 00:00:00" AND created_at <= "'.$end.' 23:59:59"';
    return $this->db->query($sql)->num_rows();
	}

  public function getPembelianMonthly() {
    $query_date = date('Y-m-d');
    $start = date('Y-m-01', strtotime($query_date));
    $end = date('Y-m-t', strtotime($query_date));
    $sql = 'SELECT * FROM trx_pembelian WHERE created_at >= "'.$start.' 00:00:00" AND created_at <= "'.$end.' 23:59:59"';
    return $this->db->query($sql)->num_rows();
  }

  public function totalPembelianMonthly() {
    $total = 0;
    $query_date = date('Y-m-d');
    $start = date('Y-m-01', strtotime($query_date));
    $end = date('Y-m-t', strtotime($query_date));
    $sql = 'SELECT * FROM trx_pembelian WHERE created_at >= "'.$start.' 00:00:00" AND created_at <= "'.$end.' 23:59:59"';
    $data = $this->db->query($sql)->result_array();
    foreach($data as $val) {
      $total += $val['price_produk'] * $val['qty'] + $val['ongkir'];
    }
    return (object)array('total' => $total);
  }

  public function totalPenjualanMonthly() {
    $total = 0;
    $query_date = date('Y-m-d');
    $start = date('Y-m-01', strtotime($query_date));
    $end = date('Y-m-t', strtotime($query_date));
    $sql = 'SELECT * FROM trx_penjualan WHERE created_at >= "'.$start.' 00:00:00" AND created_at <= "'.$end.' 23:59:59"';
    $data = $this->db->query($sql)->result_array();
    foreach($data as $val) {
      $total += $val['price_produk'] * $val['qty'];
    }
    return (object)array('total' => $total);
  }
}
