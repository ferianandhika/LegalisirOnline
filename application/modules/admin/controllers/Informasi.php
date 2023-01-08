<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Informasi extends CI_Controller
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

    $data['judul'] = 'Halaman Informasi';
    $data['row'] = $this->db->get('informasi')->row();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/informasi', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  function edit($id_prodi)
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['row'] = $this->db->where('id',$id_prodi)->get('informasi')->row();
    $data['judul'] = 'Halaman edit data';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/informasi/edit', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  function update(){
    $id_informasi = $this->input->post('id_informasi');
    $teks = $this->input->post('teks');

    $update = $this->db->set('teks',$teks)->where('id',$id_informasi)->update('informasi');

    redirect('admin/informasi');

  }


}
