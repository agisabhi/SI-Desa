<?php 
 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Combobox_model extends CI_Model {
                        

    public function data_kab($id_prov){
        $kab = $this->db->get_where('kabupaten',['id_prov'=>$id_prov])->result_array();
        foreach ($kab as $key ) {
            $tampilkan .="<option value='".$key['nama']."'>".$key['nama']."</option>";
        }
        return $tampilkan;
    }
    public function data_kec($id_kab){
        $kab = $this->db->get_where('kecamatan',['id_kab'=>$id_kab])->result_array();
        foreach ($kab as $key ) {
            $tampilkan .="<option value='".$key['nama']."'>".$key['nama']."</option>";
        }
        return $tampilkan;
    }
    function Provinsi()
    {   $this->db->select('*');
        $this->db->order_by('id_prov', 'ASC');
        return $this->db->from('provinsi')
          ->get()
          ->result();
    }
    public function Kab()
    {
        $this->db->select('*');
        $this->db->order_by('id_kab', 'ASC');
        return $this->db->from('kabupaten')
          ->get()
          ->result();
    }
    public function cekIdProv($id_prov)
    {
        $this->db->select('*');
        $this->db->like('nama', $id_prov);
        $this->db->from('provinsi');
        return $this->db->get()->row_array();
    }
    public function cekIdKab($id_kab)
    {
        $this->db->select('*');
        $this->db->like('nama', $id_kab);
        $this->db->from('kabupaten');
        return $this->db->get()->row_array();
    }
    public function cekIdKec($id_kec)
    {
        $this->db->select('*');
        $this->db->like('nama', $id_kec);
        $this->db->from('kecamatan');
        return $this->db->get()->row_array();
    }

    public function tes(){
        $s = 'SUMATERA UTARA';
        $this->db->select('*');
        $this->db->like('nama', $s);
        $this->db->from('provinsi');
        return $this->db->get()->row_array();
    }



    function Kabupaten($id_prov)
    {   $this->db->select('*');
        $this->db->where('id_prov', $id_prov);
        $this->db->order_by('id_kab', 'ASC');
        return $this->db->from('kabupaten')
            ->get()
            ->result();
    }
    function Kecamatan($id_kab)
    {   $this->db->select('*');
        $this->db->where('id_kab', $id_kab);
        $this->db->order_by('id_kec', 'ASC');
        return $this->db->from('kecamatan')
            ->get()
            ->result();
    }
    
    function Kelurahan($id_kec)
    {   $this->db->select('*');
        $this->db->where('id_kec', $id_kec);
        $this->db->order_by('id_kel', 'ASC');
        return $this->db->from('kelurahan')
            ->get()
            ->result();
    }
}