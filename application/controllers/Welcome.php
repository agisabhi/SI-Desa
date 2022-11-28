<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('adminkelahiran_model');
    $this->load->model('userkelahiran_model');
    $this->load->model('combobox_model');
    $this->load->library('form_validation');
  }
	public function index()
	{
		$this->load->view('welcome');
	}
	public function cari_lahir(){
		
		$data['title'] = 'Cari Pengajuan Surat Lahir';
		
        $this->load->view('header/headerstaff',$data);
		$this->load->view('cari_lahir',$data);
		$this->load->view('footer/footerstaff');
        

        }
	public function hasil_lahir(){
		
		$data['title'] = 'Cari Pengajuan Surat';
		$no = $this->input->post('no_surat_lahir');
		$cek = substr($no,0,4);
		if ($cek=="SKPD" || $cek=="skpd") {
			
			$data['hasil'] = $this->userkelahiran_model->hasil_datang($no);
			$data['cek'] = $this->userkelahiran_model->num_datang($no);
		}else if($cek=="SKEM" || $cek=="skem"){
			$data['hasil'] = $this->userkelahiran_model->hasil_kematian($no);
			$data['cek'] = $this->userkelahiran_model->num_kematian($no);
		}else if($cek=="SKEL" || $cek=="skel"){
			$data['hasil'] = $this->userkelahiran_model->hasil_lahir($no);
			$data['cek'] = $this->userkelahiran_model->num_lahir($no);
		}else{
			$data['cek'] = 0;
		}
        $this->load->view('header/headerstaff',$data);
		$this->load->view('hasil_lahir',$data);
		$this->load->view('footer/footerstaff');

        }
	public function cari_datang(){
		
		$data['title'] = 'Cari Pengajuan Surat Pindah Datang';
		
        $this->load->view('header/headerstaff',$data);
		$this->load->view('cari_datang',$data);
		$this->load->view('footer/footerstaff');
        

        }
	public function hasil_datang(){
		
		$data['title'] = 'Cari Pengajuan Surat Pindah';
		$no = $this->input->post('no_surat_datang');
		$data['hasil'] = $this->userkelahiran_model->hasil_datang($no);
		$data['cek'] = $this->userkelahiran_model->num_datang($no);
        $this->load->view('header/headerstaff',$data);
		$this->load->view('hasil_datang',$data);
		$this->load->view('footer/footerstaff');

        }
	public function cari_kematian(){
		
		$data['title'] = 'Cari Pengajuan Surat Kematian';
		
        $this->load->view('header/headerstaff',$data);
		$this->load->view('cari_kematian',$data);
		$this->load->view('footer/footerstaff');
        

        }
	public function hasil_kematian(){
		
		$data['title'] = 'Cari Pengajuan Surat Kematian';
		$no = $this->input->post('no_surat_kematian');
		$data['hasil'] = $this->userkelahiran_model->hasil_kematian($no);
		$data['cek'] = $this->userkelahiran_model->num_kematian($no);
        $this->load->view('header/headerstaff',$data);
		$this->load->view('hasil_kematian',$data);
		$this->load->view('footer/footerstaff');

        }

        
	
}
