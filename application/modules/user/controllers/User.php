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
    // $data['informasi'] = $this->M_dashboard->getInformasi();
    $data['prodi'] = $this->M_dashboard->getProdi();
    $data['informasi'] = $this->db->get('informasi')->row();
    $data['judul'] = 'SIMALEJA | PHB';
    $data['content'] = 'dashboard';
    $this->load->view('templates/layouts', $data);
  }
}