<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Legalisir2 extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $params = array('server_key' => 'SB-Mid-server-7lCrdntWuqzBlUYhP6oWWG0I', 'production' => false);
    $this->load->library('veritrans');
    $this->veritrans->config($params);
    $this->load->helper('url');
    $this->load->model("M_legalisir2");

    is_logged_in();
  }

  public function index()
  {

    $data['judul'] = 'Halaman Legalisir';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['legalisir'] = $this->M_legalisir2->getAll();
    $data['prodi'] = $this->db->get('prodi')->result_array();
    $datas = $this->M_legalisir2->getAll();

    foreach ($datas as $dataa) {
      if ($dataa->order_id != "" && $dataa->status_midtrans == 'pending') {
        $data_m = $this->veritrans->status($dataa->order_id);
        $update_tm = $this->db->set('status_midtrans', $data_m->transaction_status)->where('id_legalisir', $dataa->id_legalisir)->update('legalisir2');
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/legalisir2', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }
  
  public function filter()
  {
    $filter = $this->input->post('filter');
    if ($filter == "1") {
        $prodi = $this->input->post('prodi');
        $data['laporan'] = $this->M_legalisir2->getExportByProdi($prodi);
        $data['prodi'] = $this->db->get_where('prodi', ['id_prodi' => $prodi])->row();
        if (count($data['laporan']) > 0) {
          $this->load->view('admin/laporan_legalisir', $data);
        }else{
          echo "<script>
              alert('Data Tidak Ada');
              window.location.href='" . base_url("admin/legalisir2") . "';
          </script>";
      } 
    }else{
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['laporan'] = $this->M_legalisir2->getExportByTanggal($tgl_awal,$tgl_akhir);
        $data['tanggal'] = [$tgl_awal, $tgl_akhir];
        if (count($data['laporan']) > 0) {
          $this->load->view('admin/laporan_legalisir', $data);
        }else{
          echo "<script>
              alert('Data Tidak Ada');
              window.location.href='" . base_url("admin/legalisir2") . "';
          </script>";
      } 
    }
  }

  public function showDetail()
  {
    $id = $this->input->post('id');
    $row = $this->M_legalisir2->getDetailStatus($id);
    if ($row->status_midtrans == 'settlement') {
      $st_mid = "<span class='badge badge-primary'>Sudah Dibayar</span>"; 
    }elseif ($row->status_midtrans == 'expire'){
      $st_mid = "<span class='badge badge-danger'>Expired</span>";
    }else{
      $st_mid = "<span class='badge badge-warning'>Pending</span>";
    }
    echo "
        <table class='table table-bordered'>
            <tr>  
                  <td width='20%'><label>Nama Lengkap</label></td>  
                  <td width='50%'>".$row->name."</td>  
            </tr>
            <tr>  
                  <td width='20%'><label>NIM</label></td>  
                  <td width='50%'>".$row->nim."</td>  
            </tr>  
            <tr>  
                  <td width='20%'><label>Jenis Kelamin</label></td>  
                  <td width='50%'>".$row->jenis_kelamin."</td>  
            </tr>  
            <tr>  
                  <td width='20%'><label>Alamat</label></td>  
                  <td width='50%'>".$row->alamat."</td>  
            </tr>  
            <tr>  
                  <td width='20%'><label>No Hp</label></td>  
                  <td width='50%'>".$row->no_hp."</td>  
            </tr>  
            <tr>  
                  <td width='20%'><label>Prodi</label></td>  
                  <td width='50%'>".$row->nama_prodi."</td>  
            </tr>
            <tr>  
                  <td width='20%'><label>Angkatan</label></td>  
                  <td width='50%'>".$row->angkatan."</td>  
            </tr>
            <tr>  
                  <td width='20%'><label>No Ijazah</label></td>  
                  <td width='50%'>".$row->no_ijazah."</td>  
            </tr>
            <tr>  
                  <td width='20%'><label>Status</label></td>  
                  <td width='50%'>".$st_mid."</td>  
            </tr>
        </table> ";
  }



  private function _sendEmail($id, $email, $jenis)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'ferianandhika.fa98@gmail.com',
      'smtp_pass' => 'ferian123',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->load->initialize($config);

    $this->email->from('ferianandhika.fa98@gmail.com', 'Politeknik Harapan Bersama TEGAL');
    $this->email->to($email);

    $this->email->subject('Status Transaksi Anda');
    if ($jenis == 1) {
      $st = "Sedang Diproses";
    } elseif ($jenis == 2) {
      $st = "Sedang Dikirim";
    } else {
      $st = "Telah Selesai";
    }
    $this->email->message('Status Transaksi Anda saat ini ' . $st . ' Terimakasih ... ');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  // public function _sendEmail($id,$email,$jenis){
  //   // echo $email;
  //   // echo $jenis;
  //   // if($jenis == 1){
  //   //   $st = "Sedang Diproses";
  //   // }elseif($jenis == 2){
  //   //   $st = "Sedang Dikirim";
  //   // }else{
  //   //   $st = "Telah Selesai";
  //   // }
  //   // $to      = $email;
  //   // $subject = 'Status Transaksi Anda';
  //   // $message = 'Status Transaksi Anda saat ini '.$st.' Terimakasih ...';
  //   // $headers = array(
  //   //     'From' => 'ferianandhika.fa99@gmail.com',
  //   //     'Reply-To' => 'ferianandhika.fa99@gmail.com',
  //   //     'X-Mailer' => 'PHP/' . phpversion()
  //   // );

  //   // mail($to, $subject, $message, $headers);
  //   $to      = 'devandaandresmg@gmail.com';
  //   $subject = 'the subject';
  //   $message = 'hello';
  //   $headers = 'From: webmaster@example.com'       . "\r\n" .
  //                'Reply-To: webmaster@example.com' . "\r\n" .
  //                'X-Mailer: PHP/' . phpversion();

  //   mail($to, $subject, $message, $headers);
  // }

  public function ubahStatus()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    $getData = $this->db->where('id_legalisir', $id)->get('legalisir2')->row();
    $update = $this->db->set('status', $status)->where('id_legalisir2', $id)->update('legalisir2');
    if ($update) {
      // $this->_sendEmail($id, $getData->email, $status);
      echo "1";
    }
  }
}
