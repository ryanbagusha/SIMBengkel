<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_pembeli extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kelola_pembeli/M_kelola_pembeli');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Pembeli';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['view'] = $this->M_kelola_pembeli->readDataPembeli();
    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_pembeli/v_kelola_pembeli', $data);
    $this->load->view('_templates/footer');
  }

  public function tambahDataPembeli()
  {
    $this->M_kelola_pembeli->insertDataPembeli();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Pembeli Berhasil Ditambahkan! </div>');
    redirect('kelola_pembeli');
  }

  public function ubahDataPembeli()
  {
    $this->M_kelola_pembeli->updateDataPembeli();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Pembeli Berhasil Diubah! </div>');
    redirect('kelola_pembeli');
  }

  public function hapusDataPembeli($id)
  {
    $this->M_kelola_pembeli->deleteDataPembeli($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Pembeli Berhasil Dihapus! </div>');
    redirect('kelola_pembeli');
  }
}