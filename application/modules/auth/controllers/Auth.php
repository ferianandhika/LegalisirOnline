<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('login');
    } else {
      $this->_login();
    }
  }

  public function _login()
  {
    $email = $this->input->post('email', true);
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {

      if ($user['is_active'] == 1) {

        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'id' => $user['id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Password salah </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Email belum diaktifkan, tolong segera verivikasi email </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Email belum terdaftar </div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules('name', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|trim');
    $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
    $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|numeric|trim');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password1]');

    $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
    $this->form_validation->set_message('numeric', '{field} inputan hanya angka.');
    $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
    $this->form_validation->set_message('matches', '{field} harus sama dengan {param}.');

    if ($this->form_validation->run() == false) {
      $data['prodi'] = $this->db->get('prodi')->result_array();
      $this->load->view('registration', $data);
    } else {

      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'nim' => htmlspecialchars($this->input->post('nim', true)),
        'prodi' => htmlspecialchars($this->input->post('prodi', true)),
        'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];

      //siapkan token
      // $token = base64_encode(random_bytes(32));
      $token = rand(10000, 99999);
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()

      ];

      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> Berhasil dibuat, Tolong buka Gmail untuk mengaktifkan akun Anda </div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.gmail.com',
      'smtp_port' => 465,
      'smtp_user' => 'infotkptegal@gmail.com',
      'smtp_pass' => 'tcbjdpzqssmasnip',
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
    ];

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");

    
    // $this->email->from('ferianandhika.fa98@gmail.com', 'Politeknik Harapan Bersama TEGAL');
    $this->email->from('infotkptegal@gmail.com', 'Politeknik Harapan Bersama TEGAL');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Verifikasi akun');
      $this->email->message('Tekan Link di bawah untuk memverifikasi : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Aktifkan Sekarang</a>');
    } else if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Tekan Link di bawah untuk mereset password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . $token . '">Reset Password</a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">' . $email . ' Sudah Aktif, Silahkan Login.</div>');
          redirect('auth');
        } else {

          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Aktivasi Gagal , Token sudah kadaluarsa </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Aktivasi Gagal, tidak ada Token </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Aktivasi Gagal, tidak ada email </div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> Berhasil keluar </div>');
    redirect('auth');
  }


  public function blocked()
  {
    $this->load->view('auth/error/index.html');
  }


  public function forgot_password()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/forgot_password');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {

        $token = rand(10000, 99999);
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');
        $this->session->set_flashdata('massage', '<div class="alert alert-info" role="alert"> Sukses, Tolong Cek email kamu untuk mereset password  </div>');
        redirect('auth/forgot_password');
      } else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Email belum terdaftar atau belum diaktifkan </div>');
        redirect('auth/forgot_password');
      }
    }
  }

  public function reset_password()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->change_password();
      } else {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Rreset Password gagal , tidak ada token</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Rreset Password gagal , tidak ada email</div>');
      redirect('auth');
    }
  }

  public function change_password()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }

    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]');
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/change_password');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('massage', '<div class="alert alert-info" role="alert"> Password Berhasil diubah, silahkan Login</div>');
      redirect('auth');
    }
  }
}