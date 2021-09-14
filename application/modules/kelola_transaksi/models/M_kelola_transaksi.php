<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelola_transaksi extends CI_Model 
{
  public function readTransaksi()
  {
    return $this->db->get('view_transaksi');
  }

  public function readTransaksiTanggal($tgl_awal, $tgl_akhir)
  {
    $this->db->where('tanggal >=', $tgl_awal);
    $this->db->where('tanggal <=', $tgl_akhir);
    return $this->db->get('view_transaksi');
  }

  public function readDetailTransaksi()
  {
    return $this->db->get('view_detail_transaksi');
  }

  public function readDataSparepart($value = '')
  {
    $this->db->select('*');
    $this->db->from('sparepart');
    $this->db->like('nama_sparepart', $value, 'both');
    return $this->db->get();
  }

  public function findDataSparepart($id)
  {
    return $this->db->get_where('sparepart', array('id_sparepart' => $id))->result();
  }

  public function readTransaksiWhere($id)
  {
    $this->db->where('kode_transaksi', $id);
    
    return $this->db->get('view_transaksi')->result_array();
  }

  public function readDetailTransaksiWhere($id)
  {
    $this->db->where('kode_transaksi', $id);
    
    return $this->db->get('view_detail_transaksi');
  }

  public function insertDataTransaksi()
  {
    $kode = $this->db->query('SELECT RIGHT(kode_transaksi, 5) as kode FROM transaksi ORDER BY kode_transaksi DESC LIMIT 1')->result()[0]->kode + 1;

    $tahun = date("Y");
    $buat_id = str_pad($kode, 5, "0", STR_PAD_LEFT);
    $kode_transaksi = "TR-$tahun-$buat_id";

    $data = [
      'kode_transaksi' => $kode_transaksi,
      'tanggal' => date("Y-m-d"),
      'harga_total' => $this->cart->total(),
      'id_user' => $this->input->post('user', true),
      'id_mekanik' => $this->input->post('mekanik', true),
      'id_pembeli' => $this->input->post('pembeli', true),
      'keterangan' => $this->input->post('keterangan', true)
    ];

    $this->db->insert('transaksi', $data);

    return $kode_transaksi;
  }

  public function insertDataDetailTransaksi()
  {
    $kode_transaksi = $this->M_kelola_transaksi->insertDataTransaksi();

    foreach ($this->cart->contents() as $item) {
      $id = $item['id'];
      $qty = $item['qty'];

      $query = $this->db->get_where('sparepart', array('id_sparepart' => $id));
      $sparepart = $query->result()[0]->nama_sparepart;

      // ? Insert detail transaksi
      $data_detail_transaksi = [
        'kode_transaksi' => $kode_transaksi,
        'id_sparepart' => $item['id'],
        'nama_sparepart' => $sparepart,
        'harga' => $query->result()[0]->harga_jual,
        'jumlah' => $item['qty'],
        'subtotal' => $item['subtotal']
      ];
      
      // ? Update Stok Sparepart
      // ? Mengambil stok dari database
      $stok = intval($query->result()[0]->stok) - $qty;
      if ($stok < 0) {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('transaksi');
        $this->session->set_flashdata("message", "<div class='alert alert-danger ml-3' role='alert'> Stok $sparepart tidak cukup! </div>");
        redirect('kelola_transaksi/halaman_kasir');
        die;
      }

      $this->db->insert('detail_transaksi', $data_detail_transaksi);

      $data_sparepart = [
        'stok' => $stok
      ];
  
      $this->db->where('id_sparepart', $id);
      $this->db->update('sparepart', $data_sparepart);
    }

    return $kode_transaksi;
  }

  public function deleteDataTransaksi($id)
  {
    $this->db->where('kode_transaksi', $id);
    $this->db->delete('transaksi');
  }
}