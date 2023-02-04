<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
  private $table = "informasi";

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->table, ["id" => $id])->row();
  }

  public function getInformasi()
  {
    return $this->db->get('informasi')->result_array();
  }

  public function getProdi()
  {
    return $this->db->get('prodi')->result_array();
  }

  public function getProfil($email)
  {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
      $this->db->where('user.email', $email);
      return $this->db->get()->row_array();
  }
}

/* End of file M_legalisir.php */