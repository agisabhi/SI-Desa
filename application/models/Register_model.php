<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {


    public function tambah($data,$email)
  {
    $cek_user = $this->db->get_where('user', ['email' => $email])->num_rows();
    if ($cek_user > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email Sudah Digunakan, Silahkan Gunakan Email lain !
      </div>');
			redirect('pengajuan');
		} else {
			$this->db->insert('user', $data);
		}
  }
}