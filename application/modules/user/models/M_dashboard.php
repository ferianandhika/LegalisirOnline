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
}

/* End of file M_legalisir.php */