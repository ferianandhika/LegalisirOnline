<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("user_model");
    $this->load->library('form_validation');

    is_logged_in();
  }

  public function index()
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman User';
    $data['user'] = $this->user_model->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/user', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }
}
