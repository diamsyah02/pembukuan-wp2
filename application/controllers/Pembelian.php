<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Pembelian');
    $this->load->model('M_Produk');
    $this->load->model('M_Marketplace');
  }

	public function index() {
    $data['title'] = 'Pembelian';
    $data['file'] = 'pembelian/home';
		$this->load->view('index', $data);
	}

  public function getData() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Pembelian->getData()
    );
    echo json_encode($data);
  }

  public function getDetail($id) {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Pembelian->getDetail($id)
    );
    echo json_encode($data);
  }

  public function getDataByDate() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Pembelian->getDataByDate($this->input->post('dateFrom'), $this->input->post('dateTo'))
    );
    echo json_encode($data);
  }

  public function add() {
    $data['title'] = 'Tambah Pembelian';
    $data['file']  = 'pembelian/add';
    $this->load->view('index', $data);
  }

  public function edit($id) {
    $data['title'] = 'Edit Pembelian';
    $data['file'] = 'pembelian/edit';
    $data['id'] = $id;
    $this->load->view('index', $data);
  }

  public function save() {
    $produk = $this->M_Produk->getDetail($this->input->post('produk'));
    $marketplace = ($this->input->post('marketplace') ==  0) ? '' : $this->M_Marketplace->getDetail($this->input->post('marketplace'));
    $data = array(
      'mst_produk_id'       => $this->input->post('produk'),
      'mst_marketplace_id'  => $this->input->post('marketplace'),
      'mst_user_id'         => $this->session->userdata('id'),
      'detail_marketplace'  => ($marketplace ==  '') ? $this->input->post('detail_marketplace') : $marketplace['name_marketplace'],
      'qty'                 => $this->input->post('qty'),
      'ongkir'              => $this->input->post('ongkir'),
      'price_produk'        => (int)$produk['price_buy'],
      'created_at'          => $this->input->post('tanggal')
    );
    $this->M_Pembelian->save($data);
    if($this->db->affected_rows() > 0) {
      $data_product = array(
        'stock' => ((int)$produk['stock'] == 0) ? (int)$this->input->post('qty') : (int)$produk['stock'] - (int)$this->input->post('qty')
      );
      $this->M_Produk->update($produk['id'], $data_product);
    }
    $this->session->set_flashdata('msg_pemebelian', '<div class="alert alert-primary">Tambah data penjualan berhasil!</div>');
    redirect('pembelian');
  }

  public function update($id) {
    $produk = $this->M_Produk->getDetail($this->input->post('produk'));
    $marketplace = ($this->input->post('marketplace') ==  0) ? '' : $this->M_Marketplace->getDetail($this->input->post('marketplace'));
    $detail = $this->M_Pembelian->getDetail($id);
    $data = array(
      'mst_produk_id'       => $this->input->post('produk'),
      'mst_marketplace_id'  => $this->input->post('marketplace'),
      'mst_user_id'         => $this->session->userdata('id'),
      'detail_marketplace'  => ($marketplace ==  '') ? $this->input->post('detail_marketplace') : $marketplace['name_marketplace'],
      'qty'                 => $this->input->post('qty'),
      'ongkir'         => $this->input->post('ongkir'),
      'created_at'          => $this->input->post('tanggal')
    );
    $this->M_Pembelian->update($id, $data);
    if($this->db->affected_rows() > 0) {
      $data_product = array(
        'stock' => (int)$produk['stock'] - (int)$detail['qty'] + (int)$this->input->post('qty')
      );
      $this->M_Produk->update($produk['id'], $data_product);
    }
    $this->session->set_flashdata('msg_pemebelian', '<div class="alert alert-primary">Edit data penjualan berhasil!</div>');
    redirect('pembelian');
  }

  public function delete($id) {
    $detail = $this->M_Pembelian->getDetail($id);
    $produk = $this->M_Produk->getDetail($detail['mst_produk_id']);
    $this->M_Pembelian->delete($id);
    if($this->db->affected_rows() > 0) {
      $data_product = array(
        'stock' => (int)$produk['stock'] - (int)$detail['qty']
      );
      $this->M_Produk->update($produk['id'], $data_product);
    }
    redirect('pembelian');
  }
}
