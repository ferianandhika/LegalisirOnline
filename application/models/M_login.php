<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model
{
    public function validasi_adm($username, $password)
    {
        $data		= $this->db->get_where('admin', array('username_adm like binary' => $username))->result();

        if (count($data) === 1) {
            if (password_verify($password, $data[0]->pass_adm)) {
                return $dt		=	array(
                    'is_logged_in'	=> true,
                    'username_adm'	=>	$username,
                    'level_adm'		=>	$data[0]->level_adm,
                    'id_adm'		=>	$data[0]->id_adm
                );
            } else {
                return 0;
            }
        }
    }


    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie_adm', $cookie);
        return $this->db->get('admin');
    }
}
/* End of file M_login.php */
/* Location: ./application/models/M_login.php */
