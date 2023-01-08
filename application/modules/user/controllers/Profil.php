<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {

    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman Profil | SIMALEJA';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('user/profil', $data);
    $this->load->view('templates/footer');
  }

  public function profil_edit()
  {

    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman Edit Profil | SIMALEJA';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('user/profil_edit', $data);
    $this->load->view('templates/footer');
  }

  public function simpan_profile()
  {
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $id_user = $this->input->post('id_user');
    $update = $this->db->set('name', $username)->set('email', $email)->where('id', $id_user)->update('user');
    echo "<script>
      alert('Profil berhasil diubah');
      window.location.href='" . base_url("user/profil") . "';
      </script>";
    // redirect("user/profil");
  }
}