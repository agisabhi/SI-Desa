<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
  {
    parent::__construct();
    $this->load->model('adminkelahiran_model');
    $this->load->model('userkelahiran_model');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title'] = 'Dashboard Kades';
		$status = 'acc_staff';
		$proses1 = 'acc_staff';
		$proses2 = 'acc_kades';
		$proses3 = 'siap_ambil';
		$selesai = 'selesai';
		$tolak = 'ditolak';
		$tgl_kemarin =date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
		$now = date('Y-m-d');
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
		$data['skk'] = $this->db->get('surat_lahir')->num_rows();
		$data['lahir_baru_now'] = $this->adminkelahiran_model->lahir_baru();
		
		$data['skk_perlu'] = $this->db->get_where('surat_lahir',['status'=>$status])->num_rows();
		$data['skk_tolak'] = $this->db->get_where('surat_lahir',['status'=>$tolak])->num_rows();
		$data['skk_kemarin'] = $this->db->get_where('surat_lahir',['tanggal_input'=>$tgl_kemarin])->num_rows();

		$data['skk_proses'] = $this->adminkelahiran_model->lahir_proses();
		$data['skk_selesai'] = $this->db->get_where('surat_lahir',['status'=>$selesai])->num_rows();
		
		$data['skem'] = $this->db->get('surat_kematian')->num_rows();
		$data['skem_baru_now'] = $this->db->get_where('surat_kematian',['status'=>$status, 'tanggal_input'=>$now])->num_rows();
		$data['skem_kemarin'] = $this->db->get_where('surat_kematian',['tanggal_input'=>$tgl_kemarin])->num_rows();
		$data['skem_proses'] = $this->adminkelahiran_model->kematian_proses();
		$data['skem_selesai'] = $this->db->get_where('surat_kematian',['status'=>$selesai])->num_rows();
		$data['skem_perlu'] = $this->db->get_where('surat_kematian',['status'=>$status])->num_rows();
		$data['skem_tolak'] = $this->db->get_where('surat_kematian',['status'=>$tolak])->num_rows();
		
		$data['skpd'] = $this->db->get('surat_datang')->num_rows();
		$data['skpd_baru_now'] = $this->db->get_where('surat_datang',['status'=>$status, 'tanggal_input'=>$now])->num_rows();
		$data['skpd_kemarin'] = $this->db->get_where('surat_datang',['tanggal_input'=>$tgl_kemarin])->num_rows();
		$data['skpd_proses'] = $this->adminkelahiran_model->datang_proses();
		$data['skpd_selesai'] = $this->db->get_where('surat_datang',['status'=>$selesai])->num_rows();
		$data['skpd_perlu'] = $this->db->get_where('surat_datang',['status'=>$status])->num_rows();
		$data['skpd_tolak'] = $this->db->get_where('surat_datang',['status'=>$tolak])->num_rows();

		$this->load->view('header/headerstaff',$data);
		$this->load->view('kades/sidebar');
		$this->load->view('kades/index',$data);
		$this->load->view('footer/footerstaff');
	}

	
}
