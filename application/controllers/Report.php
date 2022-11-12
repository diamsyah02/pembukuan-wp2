<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

  function __construct() {
    parent:: __construct();
    $this->load->model('M_Pembelian');
    $this->load->model('M_Penjualan');
    check_login();
  }

	public function index() {
    $data['title'] = 'Report';
    $data['file'] = 'report';
		$this->load->view('index', $data);
	}

  public function getTotalReport() {
    $profit = 0;
    $modal = 0;
    $nominal_pembelian = 0;
    $nominal_penjualan = 0;
    $pembelian = $this->M_Pembelian->getDataByDate($this->input->post('dateFrom'), $this->input->post('dateTo'));
    $penjualan = $this->M_Penjualan->getDataByDate($this->input->post('dateFrom'), $this->input->post('dateTo'));
    if(count($pembelian) > 0) {
      foreach($pembelian as $row_pembelian) {
        $nominal_pembelian += $row_pembelian['price_produk'] * $row_pembelian['qty'];
      }
      $modal = $nominal_pembelian;
    }
    if(count($penjualan) > 0) {
      $biaya_lain = 0;
      foreach($penjualan as $row_penjualan) {
        $nominal_penjualan += $row_penjualan['price_produk'] * $row_penjualan['qty'];
        $biaya_lain += $row_penjualan['promo'] + $row_penjualan['cost_packing'] + $row_penjualan['cost_admin'];
      }
      $modal += $biaya_lain;
    }
    $profit = $nominal_penjualan - $modal;
    $data = array(
      'pembelian'         => count($pembelian),
      'penjualan'         => count($penjualan),
      'nominal_pembelian' => $nominal_pembelian,
      'nominal_penjualan' => $nominal_penjualan,
      'profit'            => $profit
    );
    echo json_encode($data);
  }

  public function print_report($from, $to) {
    $data['pembelian'] = $this->M_Pembelian->getDataByDate($from, $to);
    $data['penjualan'] = $this->M_Penjualan->getDataByDate($from, $to);
    $this->load->view('print_report', $data);
  }
}
