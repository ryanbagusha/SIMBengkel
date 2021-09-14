<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_kasir extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kelola_kasir/M_kelola_kasir');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Kasir';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['view'] = $this->M_kelola_kasir->readDataKasir();
    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_kasir/v_kelola_kasir', $data);
    $this->load->view('_templates/footer');
  }

  public function profile()
  {
    $data['title'] = 'Profile';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['view'] = $this->M_kelola_kasir->readDataKasir();
    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_kasir/v_profile', $data);
    $this->load->view('_templates/footer');
  }

  public function ubah_password()
  {
    $data['title'] = 'Ubah Password';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['view'] = $this->M_kelola_kasir->readDataKasir();

    $this->form_validation->set_rules('password_lama', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[8]|matches[password]');
    $this->form_validation->set_rules('ulangiPassword', 'Confirm New Password', 'required|trim|min_length[8]|matches[ulangiPassword]');

    if($this->form_validation->run() == false) {  
      $this->load->view('_templates/header', $data);
      $this->load->view('_templates/sidebar', $data);
      $this->load->view('_templates/navbar', $data);
      $this->load->view('kelola_kasir/v_ubah_password', $data);
      $this->load->view('_templates/footer');
    } else {
      $current_password = $this->input->post('password_lama');
      $new_password = $this->input->post('password');
      if(!password_verify($current_password, $data['user']['password'])) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                                    role="alert"> Kata sandi sekarang 
                                                    salah!</div>');
        redirect('kelola_kasir/ubah_password');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                                    role="alert">Kata sandi baru tidak
                                                    boleh sama dengan yang sekarang!
                                                    </div>');
          redirect('kelola_kasir/ubah_password');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          $this->session->set_flashdata('message', '<div class="alert alert-success"
                                                    role="alert">Kata sandi berhasil
                                                    diubah!</div>');
          redirect('kelola_kasir/ubah_password');
        }
      }
    }
  }

  public function tambahDataKasir()
  {
    $this->M_kelola_kasir->insertDataKasir();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Kasir Berhasil Ditambahkan! </div>');
    redirect('kelola_kasir');
  }

  public function ubahDataKasir()
  {
    $this->M_kelola_kasir->updateDataKasir();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Kasir Berhasil Diubah! </div>');
    redirect('kelola_kasir');
  }

  public function hapusDataKasir($id)
  {
    $this->M_kelola_kasir->deleteDataKasir($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Kasir Berhasil Dihapus! </div>');
    redirect('kelola_kasir');
  }
  
  public function ubahPassKasir()
  {
    $this->M_kelola_kasir->updatePassKasir();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Kasir Berhasil Diubah! </div>');
    redirect('kelola_kasir');
  }

  public function ubahProfile()
  {
    $this->M_kelola_kasir->updateProfile();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile Berhasil Diubah! </div>');
    redirect('kelola_kasir/profile');
  }
}