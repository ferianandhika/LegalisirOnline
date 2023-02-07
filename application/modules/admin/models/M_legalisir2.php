<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_legalisir2 extends CI_Model
{

  private $table = "legalisir";

  public function getAll()
  {
        $this->db->select('*');
        $this->db->from('legalisir');
        $this->db->join('user', 'user.id = legalisir.id_user');
        $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
        $this->db->where('legalisir.delivery_status = 1');
        $this->db->where('legalisir.status = 3');
        return $this->db->get()->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->table, ["id_legalisir" => $id])->row();
  }

  public function getDetailStatus($id)
  {
      $this->db->select('*');
      $this->db->from('legalisir');
      $this->db->join('user', 'user.id = legalisir.id_user');
      $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
      $this->db->where('legalisir.id_legalisir', $id);
      return $this->db->get()->row();
  }

  // export
  public function getExportByProdi($prodi)
  {
    $this->db->select('*');
    $this->db->from('legalisir');
    $this->db->join('user', 'user.id = legalisir.id_user');
    $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
    $this->db->where('user.id_prodi', $prodi);
    $this->db->where('legalisir.delivery_status = 1');
    $this->db->where('legalisir.status = 3');
    return $this->db->get()->result();
  }
  public function getExportByTanggal($tgl_awal, $tgl_akhir)
  {
    $this->db->select('*');
    $this->db->from('legalisir');
    $this->db->join('user', 'user.id = legalisir.id_user');
    $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
    $this->db->where('legalisir.created_at >=', $tgl_awal);
    $this->db->where('legalisir.created_at <=', $tgl_akhir);
    $this->db->where('legalisir.delivery_status = 1');
    $this->db->where('legalisir.status = 3');
    return $this->db->get()->result();
  }
}

/* End of file M_legalisir.php */