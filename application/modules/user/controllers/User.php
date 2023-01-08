<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_dashboard");
    is_logged_in();
  }

  public function index()
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    // $data['informasi'] = $this->M_dashboard->getById($id);
    $data['informasi'] = $this->M_dashboard->getInformasi();
    $data['judul'] = 'Halaman Home | SIMALEJA';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('user/dashboard', $data);
    $this->load->view('templates/footer');
  }
}