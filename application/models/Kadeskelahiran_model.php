<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadeskelahiran_model extends CI_Model {


    public function validasi($data, $id)
  {
    $this->db->where('id_lahir', $id);
    $this->db->update('surat_lahir', $data);
   
  }

  public function data_kelahiran(){
    
    $stat2 = 'acc_staff';
    $stat1 = 'acc_kades';
    $stat3 = 'siap_ambil';
    $this->db->select('id_lahir');
    $this->db->select('id_pelayanan');
        $this->db->select('no_surat_lahir');
        $this->db->select('surat_lahir.nama');
        $this->db->select('nama_ayah');
        $this->db->select('jenis_kelamin');
        $this->db->select('tempat_lahir');
        $this->db->select('nama_ibu');
        $this->db->select('tanggal_lahir');
        $this->db->select('anak_ke');
        $this->db->select('keterangan');
        $this->db->select('status');
        $this->db->select('tanggal_acc');
        $this->db->from('surat_lahir');
        $this->db->join('user','surat_lahir.id_user=user.id_user');
        $this->db->where('status',$stat2);
        $this->db->or_where('status',$stat1);
        $this->db->or_where('status',$stat3);
        $this->db->order_by('id_pelayanan','DESC');
        return $this->db->get()->result_array();
  }
  public function data_datang_kades(){
    $status1 = "acc_staff";
    $status2 = "siap_ambil";
    $status3 = "acc_kades";
    
    $this->db->select('surat_datang.nama');
    $this->db->select('status');
    $this->db->select('pekerjaan');
    $this->db->select('id_datang');
    $this->db->select('surat_datang.nik');
    $this->db->select('surat_datang.no_kk');
    $this->db->from('surat_datang');
    $this->db->join('user','user.id_user=surat_datang.id_user');
    $this->db->where('status',$status1);
    $this->db->or_where('status',$status2);
    $this->db->or_where('status',$status3);
    $this->db->order_by('id_pelayanan','DESC');

    return $this->db->get()->result_array();
  }
}