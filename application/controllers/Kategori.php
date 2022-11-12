<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Kategori');
  }

	public function index() {
    $data['title'] = 'Kategori Produk';
    $data['file'] = 'kategori/home';
		$this->load->view('index', $data);
	}

  public function getData() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Kategori->getData()
    );
    echo json_encode($data);
  }

  public function getDetail($id) {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Kategori->getDetail($id)
    );
    echo json_encode($data);
  }

  public function add() {
    $data['title'] = 'Tambah Produk';
    $data['file'] = 'kategori/add';
    $this->load->view('index', $data);
  }

  public function edit($id) {
    $data['title'] = 'Edit Produk';
    $data['file'] = 'kategori/edit';
    $data['id'] = $id;
    $this->load->view('index', $data);
  }

  public function save() {
    $nama_kategori = $this->input->post('nama_kategori');
    $data = array(
      'nama_kategori' => $nama_kategori,
    );
    $this->M_Kategori->save($data);
    $this->session->set_flashdata('msg_kategori', '<div class="alert alert-primary">Tambah data kategori berhasil!</div>');
    redirect('kategori');
  }

  public function update($id) {
    $nama_kategori = $this->input->post('nama_kategori');
    $data = array(
      'nama_kategori' => $nama_kategori,
    );
    print_r($data);
    $this->M_Kategori->update($id, $data);
    $this->session->set_flashdata('msg_kategori', '<div class="alert alert-primary">Edit data kategori berhasil!</div>');
    redirect('kategori');
  }

  // public function delete($id) {
  //   $this->M_Kategori->delete($id);
  //   redirect('kategori');
  // }
}
