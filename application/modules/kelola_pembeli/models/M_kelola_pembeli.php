<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelola_pembeli extends CI_Model
{
  public function readDataPembeli()
  {
    return $this->db->get('pembeli');
  }

  public function insertDataPembeli()
  {
    $data = [
      'nama_pembeli' => htmlspecialchars($this->input->post('nama_pembeli', true)),
      'nohp_pembeli' => htmlspecialchars($this->input->post('nohp_pembeli', true)),
      'merk_motor' => htmlspecialchars($this->input->post('merk_motor', true)),
      'plat_nomor' => htmlspecialchars($this->input->post('plat_nomor', true))
    ];

    $this->db->insert('pembeli', $data);
  }

  public function updateDataPembeli()
  {
    $id = $this->input->post('id_pembeli', true);
    $data = [
      'nama_pembeli' => htmlspecialchars($this->input->post('nama_pembeli', true)),
      'nohp_pembeli' => htmlspecialchars($this->input->post('nohp_pembeli', true)),
      'merk_motor' => htmlspecialchars($this->input->post('merk_motor', true)),
      'plat_nomor' => htmlspecialchars($this->input->post('plat_nomor', true)),
    ];

    $this->db->where('id_pembeli', $id);
    $this->db->update('pembeli', $data);
  }

  public function deleteDataPembeli($id)
  {
    $this->db->where('id_pembeli', $id);
    $this->db->delete('pembeli');
  }
}