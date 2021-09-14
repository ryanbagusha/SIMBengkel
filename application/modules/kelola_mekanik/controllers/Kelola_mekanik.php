<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_mekanik extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kelola_mekanik/M_kelola_mekanik');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Mekanik';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['view'] = $this->M_kelola_mekanik->readDataMekanik();
    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_mekanik/v_kelola_mekanik', $data);
    $this->load->view('_templates/footer');
  }

  public function tambahDataMekanik()
  {
    $this->M_kelola_mekanik->insertDataMekanik();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Mekanik Berhasil Ditambahkan! </div>');
    redirect('kelola_mekanik');
  }

  public function ubahDataMekanik()
  {
    $this->M_kelola_mekanik->updateDataMekanik();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Mekanik Berhasil Diubah! </div>');
    redirect('kelola_mekanik');
  }

  public function hapusDataMekanik($id)
  {
    $this->M_kelola_mekanik->deleteDataMekanik($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Mekanik Berhasil Dihapus! </div>');
    redirect('kelola_mekanik');
  }
}