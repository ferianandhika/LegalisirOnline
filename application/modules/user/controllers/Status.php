<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Status extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $params = array('server_key' => 'SB-Mid-server-7lCrdntWuqzBlUYhP6oWWG0I', 'production' => false);
    $this->load->library('veritrans');
    $this->veritrans->config($params);
    is_logged_in();
    $this->load->model('M_legalisir');
  }

  public function index()
  {
    $datas = $this->M_legalisir->getAll();


    foreach ($datas as $dataa) {

      if ($dataa->order_id == "") {
      } else {
        $data_m = $this->veritrans->status($dataa->order_id);
        $update_tm = $this->db->set('status_midtrans', $data_m->transaction_status)->where('id_legalisir', $dataa->id_legalisir)->update('legalisir');
      }
    }
    $data['judul'] = 'Halaman Status | SIMALEJA';
    $data['status'] = $this->db->get_where('legalisir', ['id_user' => $this->session->userdata('id')])->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('user/status', $data);
    $this->load->view('templates/footer');
  }
}