<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Produk');
    $this->load->model('M_Kategori');
  }

	public function index() {
    $data['title'] = 'Produk';
    $data['file'] = 'produk/home';
		$this->load->view('index', $data);
	}

  public function getData() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Produk->getData()
    );
    echo json_encode($data);
  }

  public function getDetail($id) {
    $data = array(
      'status'    => 'success',
      'result'    => $this->M_Produk->getDetail($id),
      'kategori'  => $this->M_Kategori->getData()
    );
    echo json_encode($data);
  }

  public function add() {
    $data['title'] = 'Tambah Produk';
    $data['file'] = 'produk/add';
    $data['kategori'] = $this->M_Kategori->getData();
    $this->load->view('index', $data);
  }

  public function edit($id) {
    $data['title'] = 'Edit Produk';
    $data['file'] = 'produk/edit';
    $data['id'] = $id;
    $this->load->view('index', $data);
  }

  public function save() {
    $kategori = $this->input->post('kategori');
    $name_product = $this->input->post('name_product');
    $price_buy = $this->input->post('price_buy');
    $price_sale = $this->input->post('price_sale');
    $data = array(
      'id_kategori' => $kategori,
      'name_product' => $name_product,
      'price_buy'      => $price_buy,
      'price_sale'      => $price_sale,
    );
    $this->M_Produk->save($data);
    $this->session->set_flashdata('msg_produk', '<div class="alert alert-primary">Tambah data produk berhasil!</div>');
    redirect('produk');
  }

  public function update($id) {
    $kategori = $this->input->post('kategori');
    $name_product = $this->input->post('name_product');
    $price_buy = $this->input->post('price_buy');
    $price_sale = $this->input->post('price_sale');
    $data = array(
      'id_kategori' => $kategori,
      'name_product' => $name_product,
      'price_buy'      => $price_buy,
      'price_sale'      => $price_sale,
    );
    $this->M_Produk->update($id, $data);
    $this->session->set_flashdata('msg_produk', '<div class="alert alert-primary">Edit data produk berhasil!</div>');
    redirect('produk');
  }
}
