<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_transaksi extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kelola_transaksi/M_kelola_transaksi');
    $this->load->model('kelola_pembeli/M_kelola_pembeli');
    $this->load->model('kelola_mekanik/M_kelola_mekanik');

    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Transaksi';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['transaksi'] = $this->M_kelola_transaksi->readTransaksi();
    $data['detail'] = $this->M_kelola_transaksi->readDetailTransaksi(); 

    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_transaksi/v_kelola_transaksi', $data);
    $this->load->view('_templates/footer');
  }

  public function halaman_kasir()
  {
    $data['title'] = 'Halaman Kasir';
    $data['user'] = $this->db->get_where('user',
    ['username' => $this->session->userdata('username')])->row_array();
    $data['pembeli'] = $this->M_kelola_pembeli->readDataPembeli();
    $data['mekanik'] = $this->M_kelola_mekanik->readDataMekanik();

    if ($this->input->post('key') !== NULL) {
      $data['sparepart'] = $this->M_kelola_transaksi->readDataSparepart($this->input->post('key'));
    } else {
      $data['sparepart'] = $this->M_kelola_transaksi->readDataSparepart();
    }

    $this->load->view('_templates/header', $data);
    $this->load->view('_templates/sidebar', $data);
    $this->load->view('_templates/navbar', $data);
    $this->load->view('kelola_transaksi/v_halaman_kasir', $data);
    $this->load->view('_templates/footer');
  }

  public function cetak_laporan()
  {
    $tgl_awal = $this->input->post('tgl_awal', true);
    $tgl_akhir = $this->input->post('tgl_akhir', true);
    
    $data['transaksi'] = $this->M_kelola_transaksi->readTransaksiTanggal($tgl_awal, $tgl_akhir);
    $data['tgl_awal'] = date_format(date_create($tgl_awal),"d-M-Y");
    $data['tgl_akhir'] = date_format(date_create($tgl_akhir),"d-M-Y");

    $this->load->view('kelola_transaksi/v_cetak_laporan', $data);
  }

  public function cetak_nota($id)
  {
    $data['transaksi'] = $this->M_kelola_transaksi->readTransaksiWhere($id)[0];
    $data['detail'] = $this->M_kelola_transaksi->readDetailTransaksiWhere($id);

    // var_dump($data); die;

    $this->load->view('kelola_transaksi/v_cetak_nota', $data);
  }

  public function tambahCart($id)
  {
    $sparepart = $this->M_kelola_transaksi->findDataSparepart($id);
    $data = array(
      'id'      => $id,
      'qty'     => 1,
      'price'   => $sparepart[0]->harga_jual,
      'name'    => $sparepart[0]->nama_sparepart,
    );
    
    $this->cart->insert($data);
    redirect('kelola_transaksi/halaman_kasir');
  }

  public function hapusCart($id)
  {
    $this->cart->remove($id);
    redirect('kelola_transaksi/halaman_kasir');
  }

  public function checkoutTransaksi()
  {
    $kode_transaksi = $this->M_kelola_transaksi->insertDataDetailTransaksi();
    $this->cart->destroy();
    $this->session->set_flashdata('message', '
    <div class="alert alert-success alert-dismissible fade show ml-3" role="alert">
      Transaksi Berhasil Ditambahkan! <a href="'. base_url("kelola_transaksi/cetak_nota/$kode_transaksi") .'" class="alert-link" target="_blank">Cetak Nota!</a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('kelola_transaksi/halaman_kasir');
  }

  public function hapusDataTransaksi($id)
  {
    $this->M_kelola_transaksi->deleteDataTransaksi($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Transaksi Berhasil Dihapus! </div>');
    redirect('kelola_transaksi');
  }
}