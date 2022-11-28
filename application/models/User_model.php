<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function editprofil($foto){

        $nama = $this->input->post('nama');
        $id_user = $this->input->post('id_user');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $id = $this->input->post('id_user');
        $jk = $this->input->post('jk');
        $nik = $this->input->post('nik');
        $no_kk = $this->input->post('no_kk');


        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'foto' => $foto,
            'jk' => $jk,
            'nik' => $nik,
            'no_kk' => $no_kk
        ];
        $this->db->where('id_user',$id);
        $this->db->update('user', $data);
    }

    
}