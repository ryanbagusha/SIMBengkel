<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard/M_dashboard');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();

    $data['bulan'] = $this->M_dashboard->readTotalBulanan();
    $data['tahun'] = $this->M_dashboard->readTotalTahunan();
    $data['mekanik'] = $this->M_dashboard->readJumlahMekanik();
    $data['sparepart'] = $this->M_dashboard->readJumlahSparepart();
    $data['penjualan'] = $this->M_dashboard->readPenjualan();
    $data['pSparepart'] = $this->M_dashboard->readPenjualanSparepart();

    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('dashboard/v_dashboard', $data);
  }
}