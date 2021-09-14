<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelola_kasir extends CI_Model 
{
  public function readDataKasir()
  {
    return $this->db->get('user');
  }

  public function insertDataKasir()
  {
    $data = [
      'username' => htmlspecialchars(strtolower($this->input->post('username', true))),
      'password' => password_hash('bengkelbakir', PASSWORD_DEFAULT),
      'nama_user' => htmlspecialchars($this->input->post('nama', true)),
      'gambar' => 'default.jpg',
      'nohp_user' => htmlspecialchars($this->input->post('nohp', true)),
      'jenis_kelamin' => htmlspecialchars($this->input->post('jenisKelamin', true)),
      'id_level_user' => 1
    ];

    $this->db->insert('user', $data);
  }

  public function updateDataKasir()
  {
    $id = $this->input->post('idUser', true);
    $data = [
      'username' => htmlspecialchars(strtolower($this->input->post('username', true))),
      'nama_user' => htmlspecialchars($this->input->post('nama', true)),
      'nohp_user' => htmlspecialchars($this->input->post('nohp', true)),
      'jenis_kelamin' => htmlspecialchars($this->input->post('jenisKelamin', true)),
    ];

    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
  }

  public function deleteDataKasir($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete('user');
  }

  public function updatePassKasir()
  {
    $id = $this->input->post('idUser', true);
    $data = [
      'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT))
    ];

    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
  }

  public function updateProfile()
  {
    $id = $this->input->post('idUser', true);
    
    $foto = $_FILES['foto'];
    if ($foto !== NULL) {
      $config['upload_path'] = './assets/img/profile/';
      $config['allowed_types'] = 'jpg|png|gif';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto') == NULL) {
        $foto = $this->db->get_where('user', ['id_user' => $id])->row_array()['gambar'];        
      } else {
        $foto = $this->upload->data('file_name');
      }
    }

    $data = [
      'username' => htmlspecialchars(strtolower($this->input->post('username', true))),
      'nama_user' => htmlspecialchars($this->input->post('nama', true)),
      'gambar' => $foto,
      'nohp_user' => htmlspecialchars($this->input->post('nohp', true)),
      'jenis_kelamin' => htmlspecialchars($this->input->post('jenisKelamin', true)),
    ];

    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
  }
}