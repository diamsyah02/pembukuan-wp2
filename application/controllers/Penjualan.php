<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Penjualan');
    $this->load->model('M_Produk');
    $this->load->model('M_Marketplace');
  }

	public function index() {
    $data['title'] = 'Penjualan';
    $data['file'] = 'penjualan/home';
		$this->load->view('index', $data);
	}

  public function getData() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Penjualan->getData()
    );
    echo json_encode($data);
  }

  public function getDetail($id) {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Penjualan->getDetail($id)
    );
    echo json_encode($data);
  }

  public function getDataByDate() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Penjualan->getDataByDate($this->input->post('dateFrom'), $this->input->post('dateTo'))
    );
    echo json_encode($data);
  }

  public function add() {
    $data['title'] = 'Tambah Penjualan';
    $data['file']  = 'penjualan/add';
    $this->load->view('index', $data);
  }

  public function edit($id) {
    $data['title'] = 'Edit Penjualan';
    $data['file'] = 'penjualan/edit';
    $data['id'] = $id;
    $this->load->view('index', $data);
  }

  public function save() {
    $produk = $this->M_Produk->getDetail($this->input->post('produk'));
    $marketplace = ($this->input->post('marketplace') ==  0) ? '' : $this->M_Marketplace->getDetail($this->input->post('marketplace'));
    // $total = (int)$produk['price'] * (int)$this->input->post('qty');
    if($produk['stock'] > $this->input->post('qty')) {
      $data = array(
        'mst_produk_id'       => $this->input->post('produk'),
        'mst_marketplace_id'  => $this->input->post('marketplace'),
        'mst_user_id'         => $this->session->userdata('id'),
        'detail_marketplace'  => ($marketplace ==  '') ? $this->input->post('detail_marketplace') : $marketplace['name_marketplace'],
        'qty'                 => $this->input->post('qty'),
        'discount'            => $this->input->post('discount'),
        'promo'               => $this->input->post('promo'),
        'cost_packing'        => $this->input->post('packing'),
        'cost_admin'          => $this->input->post('admin'),
        'price_produk'        => (int)$produk['price_sale'],
        'created_at'          => $this->input->post('tanggal')
      );
      $this->M_Penjualan->save($data);
      if($this->db->affected_rows() > 0) {
        $data_product = array(
          'stock' => (int)$produk['stock'] - (int)$this->input->post('qty')
        );
        $this->M_Produk->update($produk['id'], $data_product);
      }
      redirect('Penjualan');
    } else {
      echo '<script>history.back(alert("Stock tidak mencukupi ('.$produk['stock'].' item)!"))</script>';
    }
  }

  public function update($id) {
    $produk = $this->M_Produk->getDetail($this->input->post('produk'));
    $marketplace = ($this->input->post('marketplace') ==  0) ? '' : $this->M_Marketplace->getDetail($this->input->post('marketplace'));
    $detail = $this->M_Penjualan->getDetail($id);
    // $total = (int)$produk['price'] * (int)$this->input->post('qty');
    // $totDiscount = $total * (int)$this->input->post('discount') / 100;
    // $totFeeMarketplace = ($marketplace ==  '') ? 0 : $total * (int)$marketplace['percent_fee'] / 100;
    if($produk['stock'] > $this->input->post('qty')) {
      $data = array(
        'mst_produk_id'       => $this->input->post('produk'),
        'mst_marketplace_id'  => $this->input->post('marketplace'),
        'mst_user_id'         => $this->session->userdata('id'),
        'detail_marketplace'  => ($marketplace ==  '') ? $this->input->post('detail_marketplace') : $marketplace['name_marketplace'],
        'qty'                 => $this->input->post('qty'),
        'discount'            => $this->input->post('discount'),
        'cost_packing'        => $this->input->post('packing'),
        'cost_admin'          => $this->input->post('admin'),
        'created_at'          => $this->input->post('tanggal')
      );
      $this->M_Penjualan->update($id, $data);
      if($this->db->affected_rows() > 0) {
        $data_product = array(
          'stock' => (int)$produk['stock'] + (int)$detail['qty'] - (int)$this->input->post('qty')
        );
        $this->M_Produk->update($produk['id'], $data_product);
      }
      redirect('Penjualan');
    } else {
      echo '<script>history.back(alert("Stock tidak mencukupi ('.$produk['stock'].' item)!"))</script>';
    }
  }

  public function delete($id) {
    $detail = $this->M_Penjualan->getDetail($id);
    $produk = $this->M_Produk->getDetail($detail['mst_produk_id']);
    $this->M_Penjualan->delete($id);
    if($this->db->affected_rows() > 0) {
      $data_product = array(
        'stock' => (int)$produk['stock'] + (int)$detail['qty']
      );
      $this->M_Produk->update($produk['id'], $data_product);
    }
    redirect('Penjualan');
  }
}
