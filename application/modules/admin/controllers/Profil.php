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

  public function update()
  {
    $userr = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    // $nama = $this->input->post('nama');
    $email = $this->input->post('email');

    // $upload_image = $_FILES['image'];
    // if ($upload_image) {

    //   $config['allowed_types'] = 'gif|jpg|png';
    //   $config['max_size']     = '5000';
    //   $config['upload_path'] = './assets/img/profile/';

    //   $this->load->library('upload', $config);
    //   if ($this->upload->do_upload('image')) {
    //     $new_image = $this->upload->data('file_name');
    //     $this->db->set('image', $new_image);
    //   } else {
    //     echo $this->upload->display_errors();
    //   }
    // }

    $update = $this->db->set('email', $email)->where('id', $userr['id'])->update('user');
    // redirect("auth/logout");
    echo "<script>
      alert('Profil Berhasil Di Ubah. Silahkan Login Kembali');
      window.location.href='" . base_url("auth/logout") . "';
      </script>";
  }

  public function updatePassword()
  {
    $userr = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
    $update = $this->db->set('password', $password)->where('id', $userr['id'])->update('user');
    // redirect("auth/logout");
    echo "<script>
      alert('Password Berhasil di Ubah');
      window.location.href='" . base_url("admin/profil") . "';
      </script>";
  }
}