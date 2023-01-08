<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_legalisir extends CI_Model
{

  private $table = "legalisir";

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->table, ["id_legalisir" => $id])->row();
  }
}

/* End of file M_legalisir.php */
