<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends CI_Controller {

	function __construct() {
    parent:: __construct();
    check_login();
    $this->load->model('M_Marketplace');
  }

	public function index() {
    $data['title'] = 'Marketplace';
    $data['file'] = 'marketplace/home';
		$this->load->view('index', $data);
	}

  public function getData() {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Marketplace->getData()
    );
    echo json_encode($data);
  }

  public function getDetail($id) {
    $data = array(
      'status' => 'success',
      'result' => $this->M_Marketplace->getDetail($id)
    );
    echo json_encode($data);
  }

  public function add() {
    $data['title'] = 'Tambah Marketplace';
    $data['file'] = 'marketplace/add';
    $this->load->view('index', $data);
  }

  public function edit($id) {
    $data['title'] = 'Edit Marketplace';
    $data['file'] = 'marketplace/edit';
    $data['id'] = $id;
    $this->load->view('index', $data);
  }

  public function save() {
    $name_marketplace = $this->input->post('name_marketplace');
    $percent_fee = $this->input->post('percent_fee');
    $data = array(
      'name_marketplace' => $name_marketplace,
      'percent_fee'      => $percent_fee
    );
    $this->M_Marketplace->save($data);
    redirect('marketplace');
  }

  public function update($id) {
    $name_marketplace = $this->input->post('name_marketplace');
    $percent_fee = $this->input->post('percent_fee');
    $data = array(
      'name_marketplace' => $name_marketplace,
      'percent_fee'      => $percent_fee
    );
    $this->M_Marketplace->update($id, $data);
    redirect('marketplace');
  }

  public function delete($id) {
    $this->M_Marketplace->delete($id);
    redirect('marketplace');
  }
}
