<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_upload extends CI_Model
{

  public function insert($data)
  {
    return $this->db->insert('legalisir', $data);
  }
}