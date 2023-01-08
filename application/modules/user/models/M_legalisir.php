<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_legalisir extends CI_Model
{

    private $table = "legalisir";

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function getbyId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->result_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    //devanda functions

    public function getByIdDev($id){
        return $this->db->where('id_legalisir',$id)->get($this->table);
    }

    public function getCityByid($id){
        return $this->db->where('city_id',$id)->get('ms_city');
    }

    public function getSetting(){
        return $this->db->get('setting')->row();
    }
}

/* End of file M_legalisir.php */