<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
{
  public function index()
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $dataRows = $this->db->get('setting')->row();
    $data['dataRow'] = $dataRows;
    $data['dataProv'] = $this->db->where('province_id',$dataRows->prov_pengiriman)->get('ms_prov')->row();
    $data['dataKota'] = $this->db->where('city_id',$dataRows->kota_pengiriman)->get('ms_city')->row();
    $data['judul'] = 'Halaman Prodi';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/setting');
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function simpan(){
     $provinsi = $this->input->post('provinsi');
     $kota = $this->input->post('kota');
     $txtProvId = $this->input->post('txtProvId');
     $txtKotaId = $this->input->post('txtKotaId');
     $harga_perlembar = $this->input->post('harga_perlembar');

     $update = $this->db->set('prov_pengiriman',$txtProvId)->set('kota_pengiriman',$txtKotaId)->set('harga_perlembar',$harga_perlembar)->update('setting');

     redirect('admin/setting');

  }
}
