<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('form_validation');
    $this->load->model('M_dashboard');
    
  }

  public function index()
  {
    $email = $this->session->userdata('email');
    $data['user'] = $this->M_dashboard->getProfil($email);

    $data['judul'] = 'Halaman Profil | SIMALEJA';
    $data['content'] = 'user/profil';
    $this->load->view('templates/layouts',$data);
  }

  public function profil_edit()
  {

    $email = $this->session->userdata('email');
    $data['user'] = $this->M_dashboard->getProfil($email);
    $data['prodi'] = $this->db->get('prodi')->result_array();

    $data['judul'] = 'Halaman Edit Profil | SIMALEJA';
    $data['content'] = 'user/profil_edit';
    $this->load->view('templates/layouts',$data);
  }

  public function simpan_profil()
  {
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    $this->form_validation->set_rules('prodi', 'Prodi', 'required');
    $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|numeric');
    $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric|min_length[12]|max_length[14]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');

     //rules indonesia
    $this->form_validation->set_message('required', '{field} Wajib diisi');
		$this->form_validation->set_message('numeric', '{field}  Wajib diisi angka');
		$this->form_validation->set_message('min_length', '{field} Minimal {param} karakter');
		$this->form_validation->set_message('max_length', '{field} Maksimal {param} karakter');

    if ($this->form_validation->run() == FALSE) {
      $this->profil_edit();
    }else{
      $id_user = $this->input->post('id_user');
      $data = [
        'id_prodi' => $this->input->post('prodi'),
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'nim' => $this->input->post('nim'),
        'angkatan' => $this->input->post('angkatan'),
        'jenis_kelamin' => $this->input->post('jenkel'),
        'no_hp' => $this->input->post('no_hp'),
        'alamat' => $this->input->post('alamat'),
      ];

      $this->db->where('id', $id_user);
      $this->db->update('user', $data);
      echo "<script>
      alert('Data Sukses diupdate');
      window.location.href='" . base_url("user/profil") . "';
      </script>";

    }
  }
}