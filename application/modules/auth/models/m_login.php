<?php

/**
 * 
 */
class M_login extends CI_Model
{

	function m_cekuser_login()
	{
		//cek nama dan password admin
		function auth_admin($username, $password)
		{
			$query = $this->db->query("SELECT * FROM admin WHERE nama='$username' AND pass=MD5('$password') LIMIT 1");
			return $query;
		}

		//cek nama dan password member
		function auth_member($username, $password)
		{
			$query = $this->db->query("SELECT * FROM member WHERE nama='$username' AND pass=MD5('$password') LIMIT 1");
			return $query;
		}
	}
}
