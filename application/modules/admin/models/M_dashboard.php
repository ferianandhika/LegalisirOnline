<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function getTotal($id)
    {
        $this->db->select('*');
        $this->db->from('legalisir');
        $this->db->join('user', 'user.id = legalisir.id_user');
        $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi');
        $this->db->where('user.id_prodi', $id);
        return $this->db->get()->result();
    }
}

/* End of file M_dashboard.php */