<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Legalisir extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $params = array('server_key' => 'SB-Mid-server-7lCrdntWuqzBlUYhP6oWWG0I', 'production' => false);
    $this->load->library('veritrans');
    $this->veritrans->config($params);
    $this->load->helper('url');
    $this->load->model("M_legalisir");

    is_logged_in();
  }

  public function index()
  {

    $data['judul'] = 'Halaman Legalisir';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['legalisir'] = $this->M_legalisir->getAll();
    $datas = $this->M_legalisir->getAll();

    foreach ($datas as $dataa) {
      if ($dataa->order_id != "" && $dataa->status_midtrans == 'pending') {
        $data_m = $this->veritrans->status($dataa->order_id);
        $update_tm = $this->db->set('status_midtrans', $data_m->transaction_status)->where('id_legalisir', $dataa->id_legalisir)->update('legalisir');
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/legalisir', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }

  public function showDetail()
  {
    $id = $this->input->post('id');
    $row = $this->db->where('id_legalisir', $id)->get('legalisir')->row();

    echo "
        <table id='key-table' class='table table-bordered'>
          <thead>
            <tr>
              <th>Nama Lengkap</th>
              <th>NIM</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>No Hp</th>
              <th>Prodi</th>
              <th>Tahun Lulus</th>
              <th>no Ijazah</th>
              <th>Status</th>
            </tr>
          </thead>


          <tbody>
            <tr>
                <td>" . $row->nama . "</td>
                <td>" . $row->nim . "</td>
                <td>" . $row->jenis_kelamin . "</td>
                <td>" . $row->alamat . "</td>
                <td>" . $row->no_hp . "</td>
                <td>" . $row->prodi . "</td>
                <td>" . $row->tahun_lulus . "</td>
                <td>" . $row->no_ijazah . "</td>";
    if ($row->status_midtrans == 'settlement') {
      $st_mid = 'Sudah dibayar';
    } else {
      $st_mid = $row->status_midtrans;
    }
    echo "
                <td><span class='badge badge-primary'>" . $st_mid . "</span></td>

            </tr>

          </tbody>
        </table>

    ";
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
    $getData = $this->db->where('id_legalisir', $id)->get('legalisir')->row();

    $update = $this->db->set('status', $status)->where('id_legalisir', $id)->update('legalisir');
    if ($update) {
      $this->_sendEmail($id, $getData->email, $status);
      echo "1";
    }
  }
}