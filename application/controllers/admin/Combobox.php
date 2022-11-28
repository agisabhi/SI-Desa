<?php
 
defined('BASEPATH') or exit('No direct script access allowed');
 
class Combobox extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Combobox_model');
    }
 
 
    public function ambil_data()
    {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if ($modul=="kabupaten") {
            echo $this->combobox_model->data_kab($id);
        }else if($modul=="kecamatan"){
            echo $this->combobox_model->data_kec($id);
        }
    }

    public function get_prov(){
        $data = $this->db->get('provinsi')->result();
        echo json_encode($data);
    }
 
    function get_kab()
    {
        $nama_prov=$this->input->post('nama_prov');
        
        $data=$this->Combobox_model->Kabupaten($nama_prov);
        echo json_encode($data);
    }

    function get_kec()
    {
        $nama_kab=$this->input->post('nama_kab');
        
        $data=$this->Combobox_model->Kecamatan($nama_kab);
        echo json_encode($data);
    }
    function get_kel()
    {
        $nama_kec=$this->input->post('nama_kec');
        
        $data=$this->Combobox_model->Kelurahan($nama_kec);
        echo json_encode($data);
    }
}