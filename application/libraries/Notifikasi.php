<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Notifikasi untuk notifikasi
*/

class Notifikasi
{
	protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');

                //div notif
        $this->notifSukses = '
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sukses !</h4>';

        $this->notifGagal = '
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Gagal !</h4>';

        $this->notifClose = '</div>';
    }

    public function suksesAdd($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifSukses . " Berhasi Menambahkan Data. <p>" . $param . $this->notifClose);
    }

    public function gagalAdd($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifGagal . " Gagal Menambahkan Data. <p>" . $param . $this->notifClose);
    }

    public function suksesEdit($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifSukses . " Berhasi Edit Data. <p>" . $param . $this->notifClose);
    }

    public function gagalEdit($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifGagal . " Gagal Edit Data. <p>" . $param . $this->notifClose);
    }

    public function suksesHapus($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifSukses . " Berhasi Hapus Data. <p>" . $param . $this->notifClose);
    }


    public function gagalHapus($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifGagal . " Gagal Hapus Data. <p>" . $param . $this->notifClose);
    }

    public function valdasiError($param = "")
    {
        return $this->CI->session->set_flashdata('notif', $this->notifGagal . $param . $this->notifClose);
    }

    public function failLogin($param = "")
    {
     return $this->CI->session->set_flashdata('notif', $this->notifGagal . " Data Login Tidak Valid. <p>" . $param . $this->notifClose);
 }

 public function suksesEmail($param =""){
    return $this->CI->session->set_flashdata('notif', $this->notifSukses . "Data Berhasil Dikirim via Email ke " . $param . $this->notifClose);
}
public function gagalEmail($param =""){
    return $this->CI->session->set_flashdata('notif', $this->notifGagal . " Data Gagal Dikirim via Email ke " . $param . $this->notifClose);
}
}

/* End of file Notifikasi.php */
/* Location: ./application/libraries/Notifikasi.php */