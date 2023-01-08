<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function getProdi()
    {
       return $this->db->get('prodi')->result_array();
       
    }

}

/* End of file M_dashboard.php */
