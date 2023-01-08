<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("prodi_model");
    $this->load->model('M_dashboard');


    is_logged_in();
  }

  public function index()
  {

    $data['judul'] = 'Halaman Dasboard';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['prodi'] = $this->M_dashboard->getProdi();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function profil()
  {
    $data['judul'] = 'Halaman Profil';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/profil', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function password()
  {
    $data['judul'] = 'Halaman Ubah Password';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/password', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function cekPassword(){
    //$old_password = $this->input->post('old_password');
    $old_password = password_hash($this->input->post('old_password'), PASSWORD_DEFAULT);
    echo $old_password;
    $userr = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();



  }
}
