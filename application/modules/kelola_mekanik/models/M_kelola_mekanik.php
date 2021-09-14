<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelola_mekanik extends CI_Model
{
  public function readDataMekanik()
  {
    return $this->db->get('mekanik');
  }

  public function insertDataMekanik()
  {
    $data = [
      'nama_mekanik' => htmlspecialchars($this->input->post('nama_mekanik', true)),
      'nohp_mekanik' => htmlspecialchars($this->input->post('nohp_mekanik', true)),
    ];

    $this->db->insert('mekanik', $data);
  }

  public function updateDataMekanik()
  {
    $id = $this->input->post('id_mekanik', true);
    $data = [
      'nama_mekanik' => htmlspecialchars($this->input->post('nama_mekanik', true)),
      'nohp_mekanik' => htmlspecialchars($this->input->post('nohp_mekanik', true))
    ];

    $this->db->where('id_mekanik', $id);
    $this->db->update('mekanik', $data);
  }

  public function deleteDataMekanik($id)
  {
    $this->db->where('id_mekanik', $id);
    $this->db->delete('mekanik');
  }
}