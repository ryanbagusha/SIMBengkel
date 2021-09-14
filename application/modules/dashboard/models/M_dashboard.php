<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{
  public function readJumlahMekanik()
  {
    return $this->db->query('SELECT COUNT(*) AS jumlah_mekanik FROM mekanik')->row_array();
  }

  public function readJumlahSparepart()
  {
    return $this->db->query('SELECT COUNT(*) AS jumlah_sparepart FROM sparepart')->row_array();
  }

  public function readTotalBulanan()
  {
    $bulan = date('m');
    $tahun = date('Y');
    return $this->db->query("SELECT sum(harga_total) AS harga_total FROM transaksi WHERE month(tanggal) = $bulan AND year(tanggal) = $tahun")->row_array();
  }

  public function readPenjualan()
  {
    $data = [];
    $tahun = date('Y');

    for($i = 0; $i < 12; $i++) {
      $data[] = $this->db->query("SELECT sum(harga_total) AS harga_total FROM transaksi WHERE month(tanggal) = $i AND year(tanggal) = $tahun")->row_array();
    } 

    return $data;
  }

  public function readPenjualanSparepart()
  {
    return $this->db->query("SELECT sparepart.nama_sparepart, SUM(detail_transaksi.jumlah) as jumlah FROM sparepart LEFT JOIN detail_transaksi ON sparepart.id_sparepart = detail_transaksi.id_sparepart GROUP BY nama_sparepart ORDER BY jumlah DESC")->result_array();
  }

  public function readTotalTahunan()
  {
    $tahun = date('Y');
    return $this->db->query("SELECT sum(harga_total) AS harga_total FROM transaksi WHERE year(tanggal) = $tahun")->row_array();
  }
}