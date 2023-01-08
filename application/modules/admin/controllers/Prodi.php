<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prodi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("prodi_model");


    is_logged_in();
  }

  public function index()
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman Prodi';
    $data['prodi'] = $this->prodi_model->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/prodi', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman tambah data';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/prodi/create', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function save()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    if ($this->form_validation->run() == true) {
      $data['nama_prodi'] = $this->input->post('nama');
      $data['warna'] = $this->input->post('warna');
      $this->prodi_model->save($data);
      echo "<script>
      alert('Data Sukses disimpan');
      window.location.href='" . base_url("admin/prodi") . "';
      </script>";
      // redirect('admin/prodi');

    } else {
      $data['judul'] = 'Halaman tambah data';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/prodi/create');
      $this->load->view('templates/rightbar');
      $this->load->view('templates/footer');
    }
  }

  function edit($id_prodi)
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['prodi'] = $this->prodi_model->getById($id_prodi);
    $data['judul'] = 'Halaman tambah data';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/prodi/edit', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    if ($this->form_validation->run() == true) {
      $id_prodi = $this->input->post('id_prodi');
      $data['nama_prodi'] = $this->input->post('nama');
      $data['warna'] = $this->input->post('warna');
      $this->prodi_model->update($data, $id_prodi);
      redirect('admin/prodi');
    } else {
      $id_prodi = $this->input->post('id_prodi');
      $data['prodi'] = $this->prodi_model->getById($id_prodi);
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/prodi/edit', $data);
      $this->load->view('templates/rightbar');
      $this->load->view('templates/footer');
    }
  }

  function delete($id_prodi)
  {
    $this->prodi_model->delete($id_prodi);
    echo "<script>
      alert('Data Berhasil Di Hapus');
      window.location.href='" . base_url("admin/prodi") . "';
      </script>";
    // redirect('admin/prodi');

  }
}