<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelola_sparepart extends CI_Model 
{
  public function readDataSparepart()
  {
    $this->db->select('*');
    $this->db->from('sparepart');
    $this->db->join('jenis_sparepart','sparepart.id_jenis_sparepart=jenis_sparepart.id_jenis_sparepart');
    $query = $this->db->get();
    return $query;
  }

  public function readDataJenisSparepart()
  {
    return $this->db->get('jenis_sparepart');
  }

  public function insertDataSparepart()
  {
    $data = [
      'nama_sparepart' => htmlspecialchars($this->input->post('nama_sparepart', true)),
      'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
      'harga_jual' => htmlspecialchars($this->input->post('harga_jual', true)),
      'stok' => htmlspecialchars($this->input->post('stok', true)),
      'id_jenis_sparepart' => htmlspecialchars($this->input->post('kategori', true))
    ];

    $this->db->insert('sparepart', $data);
  }

  public function updateDataSparepart()
  {
    $id = $this->input->post('id_sparepart', true);
    $data = [
      'nama_sparepart' => htmlspecialchars($this->input->post('nama_sparepart', true)),
      'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
      'harga_jual' => htmlspecialchars($this->input->post('harga_jual', true)),
      'id_jenis_sparepart' => htmlspecialchars($this->input->post('kategori', true))
    ];

    $this->db->where('id_sparepart', $id);
    $this->db->update('sparepart', $data);
  }

  public function deleteDataSparepart($id)
  {
    $this->db->where('id_sparepart', $id);
    $this->db->delete('sparepart');
  }

  public function updateStokSparepart()
  {
    $id = $this->input->post('id_sparepart', true);
    $stok = (int)htmlspecialchars($this->input->post('tambah_stok', true));

    // ? Mengambil stok dari database
    $query = $this->db->get_where('sparepart', array('id_sparepart' => $id));
    $stok += intval($query->result()[0]->stok); 

    $data = [
      'stok' => $stok
    ];
    
    $this->db->where('id_sparepart', $id);
    $this->db->update('sparepart', $data);
  }
}