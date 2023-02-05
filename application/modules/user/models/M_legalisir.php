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
        $this->db->select('*');
        $this->db->from('legalisir');
        $this->db->join('user', 'user.id = legalisir.id_user');
        $this->db->where('legalisir.id_legalisir',$id);
        return $this->db->get();
    }

    public function getCityByid($id){
        return $this->db->where('city_id',$id)->get('ms_city');
    }

    public function getSetting(){
        return $this->db->get('setting')->row();
    }

    public function getStatus($id)
    {
        $this->db->select('*');
        $this->db->from('legalisir');
        $this->db->join('user', 'user.id = legalisir.id_user');
        $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
        $this->db->where('legalisir.id_user', $id);
        return $this->db->get()->result();
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
}

/* End of file M_legalisir.php */