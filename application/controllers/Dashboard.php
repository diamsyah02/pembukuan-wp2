<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Dashboard');
    $this->load->model('M_Pembelian');
    $this->load->model('M_Penjualan');
  }

	public function index() {
    $data['title'] = 'Dashboard';
    $data['daily_penjualan'] = $this->M_Dashboard->getPenjualanDaily();
    $data['daily_pembelian'] = $this->M_Dashboard->getPembelianDaily();
    $data['total_daily_penjualan'] = $this->M_Dashboard->totalPenjualanDaily();
    $data['total_daily_pembelian'] = $this->M_Dashboard->totalPembelianDaily();
    $data['monthly_penjualan'] = $this->M_Dashboard->getPenjualanMonthly();
    $data['monthly_pembelian'] = $this->M_Dashboard->getPembelianMonthly();
    $data['total_monthly_penjualan'] = $this->M_Dashboard->totalPenjualanMonthly();
    $data['total_monthly_pembelian'] = $this->M_Dashboard->totalPembelianMonthly();
    $data['total_profit'] = $this->countProfit();
		$this->load->view('index', $data);
	}

  function countProfit() {
    $profit = 0;
    $modal = 0;
    $nominal_pembelian = 0;
    $nominal_penjualan = 0;
    $pembelian = $this->M_Pembelian->getData();
    $penjualan = $this->M_Penjualan->getData();
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
    return $profit;
  }
}
