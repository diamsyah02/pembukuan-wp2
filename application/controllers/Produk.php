<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Produk');
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
      'status' => 'success',
      'result' => $this->M_Produk->getDetail($id)
    );
    echo json_encode($data);
  }

  public function add() {
    $data['title'] = 'Tambah Produk';
    $data['file'] = 'produk/add';
    $this->load->view('index', $data);
  }

  public function edit($id) {
    $data['title'] = 'Edit Produk';
    $data['file'] = 'produk/edit';
    // $data['detail'] = $this->M_Produk->getDetail($id);
    $data['id'] = $id;
    $this->load->view('index', $data);
  }

  public function save() {
    $name_product = $this->input->post('name_product');
    $price_buy = $this->input->post('price_buy');
    $price_sale = $this->input->post('price_sale');
    $data = array(
      'name_product' => $name_product,
      'price_buy'      => $price_buy,
      'price_sale'      => $price_sale,
    );
    $this->M_Produk->save($data);
    redirect('produk');
  }

  public function update($id) {
    $name_product = $this->input->post('name_product');
    $price_buy = $this->input->post('price_buy');
    $price_sale = $this->input->post('price_sale');
    $data = array(
      'name_product' => $name_product,
      'price_buy'      => $price_buy,
      'price_sale'      => $price_sale,
    );
    $this->M_Produk->update($id, $data);
    redirect('produk');
  }

  // public function delete($id) {
  //   $this->M_Produk->delete($id);
  //   redirect('produk');
  // }
}
