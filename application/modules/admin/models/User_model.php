<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  private $table = "user";

  public function getAll()
  {
  	$this->db->select('u.*,ur.role as role_name');
  	$this->db->join('user_role ur','ur.id = u.role_id');
    return $this->db->get('user u')->result();
  }
}
