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

    is_logged_in();
    $this->load->model('M_legalisir');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = 'Halaman Legalisir | SIMALEJA';
    $data['prodi'] = $this->M_legalisir->getProdi();
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['gSetting'] = $this->M_legalisir->getSetting();
    $data['content'] = 'user/legalisir';
    
    $this->load->view('templates/layouts', $data);
  }

  public function paid_legalisir()
  {

    $datas = $this->M_legalisir->getAll();

    foreach ($datas as $dataa) {
      if ($dataa->order_id != "" && $dataa->status_midtrans == 'pending') {
        $data_m = $this->veritrans->status($dataa->order_id);
        $update_tm = $this->db->set('status_midtrans', $data_m->transaction_status)->where('id_legalisir', $dataa->id_legalisir)->update('legalisir');
      }
    }
    // foreach ($datas as $dataa) {

    //   if ($dataa->order_id == "") {
    //   } else {
    //     $data_m = $this->veritrans->status($dataa->order_id);
    //     $update_tm = $this->db->set('status_midtrans', $data_m->transaction_status)->where('id_legalisir', $dataa->id_legalisir)->update('legalisir');
    //   }
    // }

    $id = $this->uri->segment(4);
    $data['row'] = $this->M_legalisir->getByIdDev($id)->row();
    $cekD = $this->M_legalisir->getByIdDev($id)->row();
    if ($cekD->gross_amount != 0) {
      if ($cekD->status_midtrans == "") {
        $this->db->set('order_id', '')->where('id_legalisir', $id)->update('legalisir');
      } else {
      }
    } else {
      if ($this->M_legalisir->getByIdDev($id)->row()->order_id == "") {
      } else {
        $data['getSt'] = $this->veritrans->status($this->M_legalisir->getByIdDev($id)->row()->order_id);
      }
    }

    //echo $this->veritrans->status($cekD->order_id)->transaction_status;

    $data['judul'] = 'Halaman Legalisir | SIMALEJA';
    $data['prodi'] = $this->M_legalisir->getProdi();
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('user/paid_legalisir', $data);
    $this->load->view('templates/footer');
  }

  public function upload_file()
  {
    $config['upload_path'] = './upload/';
    $config['allowed_types'] = 'pdf';
    // $config['max_size']  = '0';
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('fileijazah')) {
      return [
        'error' => $this->upload->display_errors(),
        'file_ijazah' => ''
        // 'file_transkrip' => '',
      ];
    } else {
      // upload foto baru
      return [
        'error' => '',
        'file_ijazah' => $this->upload->data('file_name'),
        // 'file_transkrip' => $this->upload->data('filetranskrip')
      ];
    }
  }


  public function save()
  {
    $opsi = $this->input->post('option');
    $this->form_validation->set_rules('ijazah', 'No Ijazah', 'required|numeric');
    // $this->form_validation->set_rules('fileijazah', 'File Ijazah', 'required');
    // $this->form_validation->set_rules('filetranskrip', 'File Transkrip', 'required');
    $this->form_validation->set_rules('jmlijazah', 'Jumlah ijazah', 'required|numeric');
    $this->form_validation->set_rules('jmltranskrip', 'Jumlah transkrip', 'required|numeric');
    $this->form_validation->set_rules('alasan', 'Alasan', 'required');
    $this->form_validation->set_rules('option', 'Opsi Pengiriman', 'required');
    if ($opsi == "kirim ke alamat tujuan") {
      $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
      $this->form_validation->set_rules('kota', 'Kota', 'required');
      $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
      $this->form_validation->set_rules('courier', 'Expedisi', 'required');
    }

    //rules indonesia
    $this->form_validation->set_message('required', '{field} Wajib diisi');
		$this->form_validation->set_message('numeric', '{field}  Wajib diisi angka');
		$this->form_validation->set_message('min_length', '{field} Minimal {param} karakter');
		$this->form_validation->set_message('max_length', '{field} Maksimal {param} karakter');

    if ($this->form_validation->run() == true) {
      $upload = $this->upload_file();
      // $data = [
      //   'file_ijazah'   => $upload['fileijazah']
      //   // 'file_transkrip'   => $upload['filetranskrip']

      // ];
      $config['upload_path'] = './upload/';
      $config['allowed_types'] = 'pdf';
      // $config['max_size']  = '0';
      // $config['max_width']  = '1024';
      // $config['max_height']  = '768';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('fileijazah')) {
        $error = array('error' => $this->upload->display_errors());
        $dataDokumen = "";
      } else {
        $dataDokumens = $this->upload->data();
        $dataDokumen = $dataDokumens['file_name'];
      }


      $configs['upload_path'] = './upload/';
      $configs['allowed_types'] = 'pdf';
      // $config['max_size']  = '0';
      // $config['max_width']  = '1024';
      // $config['max_height']  = '768';

      $this->load->library('upload', $configs);

      if (!$this->upload->do_upload('filetranskrip')) {
        $error = array('error' => $this->upload->display_errors());
        $dataDokumen1 = "";
      } else {
        $dataDokumens1 = $this->upload->data();
        $dataDokumen1 = $dataDokumens1['file_name'];
      }
      if ($opsi == "kirim ke alamat tujuan") {
        $data = [
          'id_user' => $this->input->post('id_user'),
          'no_ijazah' => $this->input->post('ijazah'),
          'file_ijazah' => $dataDokumen,
          'file_transkrip' => $dataDokumen1,
          'jumlah_ijazah' => $this->input->post('jmlijazah'),
          'jumlah_transkrip' => $this->input->post('jmltranskrip'),
          'alasan' => $this->input->post('alasan'),
          'pengiriman' => $this->input->post('option'),
          'prov_id' => $this->input->post('provinsi'),
          'kabkot_id' => $this->input->post('kota'),
          'kel_name' => $this->input->post('kelurahan'),
          'harga' => $this->input->post('harga'),
          'harga_legalisir' => $this->input->post('total_legalisir'),
          'expedisi' => $this->input->post('courier'),
        ];
      }else{
        $data = [
          'id_user' => $this->input->post('id_user'),
          'no_ijazah' => $this->input->post('ijazah'),
          'file_ijazah' => $dataDokumen,
          'file_transkrip' => $dataDokumen1,
          'jumlah_ijazah' => $this->input->post('jmlijazah'),
          'jumlah_transkrip' => $this->input->post('jmltranskrip'),
          'alasan' => $this->input->post('alasan'),
          'pengiriman' => $this->input->post('option'),
          'harga_legalisir' => $this->input->post('total_legalisir'),
        ];
      }
      $this->M_legalisir->save($data);
      //redirect('user/legalisir');
      echo "<script>
      alert('Data Sukses Disimpan');
      window.location.href='" . base_url("user/status") . "';
      </script>";
    } else {
      $data['judul'] = 'Halaman Legalisir | SIMALEJA';
      $data['prodi'] = $this->M_legalisir->getProdi();
      $data['userr'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('user/legalisir', $data);
      $this->load->view('templates/footer');
    }
  }

  public function vtweb_checkout_()
  {
    $id = $this->input->post('id_leg');

    $dataRow = $this->M_legalisir->getByIdDev($id)->row();
    $getKota = $this->M_legalisir->getCityByid($dataRow->kabkot_id)->row();
    $jmlDok = $dataRow->jumlah_ijazah + $dataRow->jumlah_transkrip;
    $bagDok = $dataRow->harga_legalisir / $jmlDok;
    $harga_bagi1 = $dataRow->jumlah_ijazah * $bagDok;
    $harga_bagi2 = $dataRow->jumlah_transkrip * $bagDok;
    $harga_total = $dataRow->harga + $dataRow->harga_legalisir;

    $transaction_details = array(
      'order_id'      => uniqid(),
      'gross_amount'  => $harga_total
    );

    // Populate items
    $items = [
      array(
        'id'        => 'Legalisr Ijazah',
        'price'     =>  $harga_bagi1,
        'quantity'  => $dataRow->jumlah_ijazah,
        'name'      => 'Legalisir Ijazah'
      ),
      array(
        'id'        => 'Legalisir Transkrip',
        'price'     => $harga_bagi2,
        'quantity'  => $dataRow->jumlah_transkrip,
        'name'      => 'Legalisir Transkrip Nilai'
      ),
      array(
        'id'        => 'Biaya Kirim',
        'price'     => $dataRow->harga,
        'quantity'  => 1,
        'name'      => 'Biaya Kirim'
      )
    ];

    echo $harga_bagi1 . "+" . $harga_bagi2 . "+" . $dataRow->harga;
  }

  public function vtweb_checkout()
  {
    $id = $this->input->post('id_leg');

    $dataRow = $this->M_legalisir->getByIdDev($id)->row();
    $getKota = $this->M_legalisir->getCityByid($dataRow->kabkot_id)->row();
    $jmlDok = $dataRow->jumlah_ijazah + $dataRow->jumlah_transkrip;
    $bagDok = $dataRow->harga_legalisir / $jmlDok;
    $harga_bagi1 = $dataRow->jumlah_ijazah * $bagDok;
    $harga_bagi2 = $dataRow->jumlah_transkrip * $bagDok;
    if ($dataRow->pengiriman == "ambil sendiri ke kampus") {
      $harga_total = $dataRow->harga_legalisir;
    } else {
      $harga_total = $dataRow->harga + $dataRow->harga_legalisir;
    }
    // echo $harga_bagi1;
    // echo $harga_bagi2;
    // echo $dataRow->harga;
    // echo $harga_total;
    $uniqId = uniqid();
    $transaction_details = array(
      'order_id'      => $uniqId,
      'gross_amount'  => $harga_total
    );



    // Populate items
    if ($dataRow->pengiriman == "ambil sendiri ke kampus") {
      $items = [

        array(
          'id'        => 'Item 1',
          'price'     =>  $harga_bagi1 / $dataRow->jumlah_ijazah,
          'quantity'  => $dataRow->jumlah_ijazah,
          'name'      => 'Legalisir Ijazah'
        ),
        array(
          'id'        => 'Item 2',
          'price'     =>  $harga_bagi2 / $dataRow->jumlah_transkrip,
          'quantity'  => $dataRow->jumlah_transkrip,
          'name'      => 'Legalisir Transkrip'
        )

      ];
    } else {
      $items = [

        array(
          'id'        => 'Item 1',
          'price'     =>  $harga_bagi1 / $dataRow->jumlah_ijazah,
          'quantity'  => $dataRow->jumlah_ijazah,
          'name'      => 'Legalisir Ijazah'
        ),
        array(
          'id'        => 'Item 2',
          'price'     =>  $harga_bagi2 / $dataRow->jumlah_transkrip,
          'quantity'  => $dataRow->jumlah_transkrip,
          'name'      => 'Legalisir Transkrip'
        ),
        array(
          'id'        => 'Item 3',
          'price'     => $dataRow->harga,
          'quantity'  => 1,
          'name'      => 'Biaya Kirim'
        )

      ];
    }

    // Populate customer's billing address
    $billing_address = array(
      'first_name'    => "Politeknik Harapan Bersama",
      'last_name'     => "",
      'address'       => "Jl. Mataram No.9, Kel. pesurungan lor, Kel. Pesurungan Lor, Pesurungan Lor, Kec. Margadana, Kota Tegal, Jawa Tengah",
      'city'          => "Tegal",
      'postal_code'     => "52147",
      'phone'         => "" . $dataRow->no_hp . "",
      'country_code'      => 'IDN'
    );

    // Populate customer's shipping address
    $shipping_address = array(
      'first_name'  => "" . $dataRow->name . "",
      'last_name'   => "",
      'address'     => "" . $dataRow->alamat . "",
      'city'        => "" . $getKota->city_name . "",
      'postal_code' => "",
      'phone'       => "" . $dataRow->no_hp . "",
      'country_code' => 'IDN'
    );

    // Populate customer's Info
    $customer_details = array(
      'first_name'      => "" . $dataRow->name . "",
      'last_name'       => "",
      'email'           => "" . $dataRow->email . "",
      'phone'           => "" . $dataRow->no_hp . "",
      'billing_address' => $billing_address,
      'shipping_address' => $shipping_address
    );

    // Data yang akan dikirim untuk request redirect_url.
    // Uncomment 'credit_card_3d_secure' => true jika transaksi ingin diproses dengan 3DSecure.
    $transaction_data = array(
      'payment_type'      => 'vtweb',
      'vtweb'             => array(
        //'enabled_payments'  => ['credit_card'],
        'credit_card_3d_secure' => true
      ),
      'transaction_details' => $transaction_details,
      'item_details'       => $items,
      'customer_details'   => $customer_details
    );

    try {

      $vtweb_url = $this->veritrans->vtweb_charge($transaction_data);
      //$transact_st = $this->veritrans->status($cekD->order_id)->transaction_status;
      $this->db->where('id_legalisir', $id)->update('legalisir', $transaction_details);
      //$this->db->set('status_midtrans',$transact_st)->where('id_legalisir',$id)->update('legalisir');
      header('Location: ' . $vtweb_url);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function status($order_id)
  {
    //echo 'test get status </br>';
    //print_r ($this->veritrans->status($order_id) );
    $data = $this->veritrans->status($order_id);

    print_r($data->transaction_status);
  }

  public function showDetail()
  {
    $id = $this->input->post('id');
    // $row = $this->db->where('id_legalisir', $id)->get('legalisir')->row();
    $row = $this->M_legalisir->getDetailStatus($id);
    if ($row->status_midtrans == 'settlement') {
      $st_mid = "<span class='badge badge-success'>Sudah Dibayar</span>"; 
    }elseif ($row->status_midtrans == 'expire'){
      $st_mid = "<span class='badge badge-danger'>Expired</span>";
    }else{
      $st_mid = "<span class='badge badge-warning'>Segera Lakukan Pembayaran</span>";
    }
    if ($row->delivery_status == '1') {
      $dt = "<span class='badge badge-success'>Dokumen Diterima</span>";;
    }else{
      $dt = "<span class='badge badge-warning'>Dokumen Belum Diterima</span>";;
    }

    echo "
        <table class='table table-bordered'>
            <tr>  
                  <td width='20%'><label>Nama</label></td>  
                  <td width='50%'>".$row->name."</td>  
            </tr>
            <tr>  
                  <td width='20%'><label>NIM</label></td>  
                  <td width='50%'>".$row->nim."</td>  
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
                  <td width='20%'><label>Transaksi</label></td>  
                  <td width='50%'>" . $st_mid . "</td>  
            </tr>
            <tr>  
                  <td width='20%'><label>Dokumen</label></td>  
                  <td width='50%'>" . $dt . "</td>  
            </tr>
            
        </table> ";
  }

  public function sudah_diterima()
  {
    $id = $this->input->post('id');
    $update = 
    $this->db->set('delivery_status', 1)->where('id_legalisir', $id)->update('legalisir');
    $this->db->set('status', 3)->where('id_legalisir', $id)->update('legalisir');
    if ($update) {
      echo "1";
    }
  }
}
