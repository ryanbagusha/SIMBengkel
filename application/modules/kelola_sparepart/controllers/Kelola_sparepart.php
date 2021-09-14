<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_sparepart extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kelola_sparepart/M_kelola_sparepart');
    is_logged_in();
  }
  
  public function index()
  {
    $data['title'] = 'Sparepart';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['view'] = $this->M_kelola_sparepart->readDataSparepart();
    $data['kategori'] = $this->M_kelola_sparepart->readDataJenisSparepart();
    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_sparepart/v_kelola_sparepart', $data);
    $this->load->view('_templates/footer');
  }

  public function tambahDataSparepart()
  {
    $this->M_kelola_sparepart->insertDataSparepart();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Sparepart Berhasil Ditambahkan! </div>');
    redirect('kelola_sparepart');
  }

  public function ubahDataSparepart()
  {
    $this->M_kelola_sparepart->updateDataSparepart();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Sparepart Berhasil Diubah! </div>');
    redirect('kelola_sparepart');
  }

  public function hapusDataSparepart($id)
  {
    $this->M_kelola_sparepart->deleteDataSparepart($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Sparepart Berhasil Dihapus! </div>');
    redirect('kelola_sparepart');
  }

  public function tambahStokSparepart()
  {
    $this->M_kelola_sparepart->updateStokSparepart();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Stok Sparepart Berhasil Ditambahkan! </div>');
    redirect('kelola_sparepart');
  }
}