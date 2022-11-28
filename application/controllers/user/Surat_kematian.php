<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_kematian extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('adminkelahiran_model');
    $this->load->model('userkelahiran_model');
    $this->load->library('form_validation');
  }
	
	public function index()
	{
		$data['title'] = 'Surat Kematian';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['pengajuan'] = $this->userkelahiran_model->getKematianByUser($data['user']['id_user']);
        
        
		$this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/surat_kematian',$data);
		$this->load->view('footer/footerstaff');
	}

	public function validasi(){
		$this->form_validation->set_rules('validasi', 'validasi', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/surat_lahir',$data);
		$this->load->view('footer/footerstaff');
        
        }else{

        $id_lahir = $this->input->post('id_lahir');
        $validasi = $this->input->post('validasi');
        $keterangan = $this->input->post('keterangan');
        
        
        
        $data = [
            'keterangan' => $keterangan,
            'status' => $validasi
        ];
        $this->adminkelahiran_model->validasi($data,$id_lahir);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Validasi
          </div>');
          
        redirect('admin/surat_lahir');
        }

        
	}

    public function tambah(){
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $bulan = date('m');
        if($bulan=='01'){
            $bulan='I';
        }else if($bulan=='02'){
            $bulan='II';
        }else if($bulan=='03'){
            $bulan='III';
        }else if($bulan=='04'){
            $bulan='IV';
        }else if($bulan=='05'){
            $bulan='V';
        }else if($bulan=='06'){
            $bulan='VI';
        }else if($bulan=='07'){
            $bulan='VII';
        }else if($bulan=='08'){
            $bulan='VIII';
        }else if($bulan=='09'){
            $bulan='IX';
        }else if($bulan=='10'){
            $bulan='X';
        }else if($bulan=='11'){
            $bulan='XI';
        }else if($bulan=='12'){
            $bulan='XII';
        }
        $tahun = date('Y');
        $dariDB = $this->userkelahiran_model->cekNoSuratKematian(); 
        $kodeJabatanSekarang = $dariDB+1;
        $data['no_surat_kematian'] = sprintf("%03s",$kodeJabatanSekarang);
        $data['no_surat'] = $data['no_surat_kematian'].'/SKKEM/TS/'.$bulan.'/'.$tahun;
        $QR = $data['no_surat_kematian'].'SKKEM';
        //Cek Id Pelayanan
        //Cek No Id Pelayanan
        $bln = date('m');
        $dariD = $this->adminkelahiran_model->cekNoPelKematian(); 
        $kodeJabatanSekaran = $dariD+1;
        $data['no_surat_kematia'] = sprintf("%03s",$kodeJabatanSekaran);
        $data['id_pel'] = 'SKEM'.$tahun.$bln.$data['no_surat_kematia'];
        $idkem = $this->adminkelahiran_model->cekIdKematian();
        $idkem_now = $idkem+1;

        $this->form_validation->set_rules('nama', 'nama', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/surat_kematian',$data);
		$this->load->view('footer/footerstaff');
        
        }else{

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/barcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $qr_name=$QR.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $QR; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qr_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        
        if (isset($_FILES['foto_ktp']['name']) && $_FILES['foto_ktp']['name'] !='') {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
      
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_ktp')) {
              $error = array('error' => $this->upload->display_errors());
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              ' . $error . '
            </div>');
              redirect('user/surat_kematian');
            } else {
              $foto_ktp = $this->upload->data('file_name');
            }
    } else {
        $foto_ktp='';
        
    }
        if (isset($_FILES['foto_kk']['name']) && $_FILES['foto_kk']['name'] !='') {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
      
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_kk')) {
              $error = array('error' => $this->upload->display_errors());
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              ' . $error . '
            </div>');
              redirect('user/surat_kematian');
            } else {
              $foto_kk = $this->upload->data('file_name');
            }
    } else {
        $foto_kk='';
        
    }
        if (isset($_FILES['foto_sk']['name']) && $_FILES['foto_sk']['name'] !='' ) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
    
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_sk')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_kematian');
        } else {
            $foto_sk = $this->upload->data('file_name');
    }
    
        }else{
            $foto_sk='';
        }
        $this->adminkelahiran_model->tambah($foto_ktp,$foto_kk,$foto_sk,$data['user']['id_user'],$data['no_surat'], $qr_name,$data['id_pel']);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pendaftaran Berhasil
        </div>');
        redirect('user/surat_kematian');
    }
}
    public function detail($id){
        $data['title'] = 'Detail Data Kelahiran';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_lahir'] = $this->userkelahiran_model->getLahirById($id);
        

        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/detail_kematian',$data);
		$this->load->view('footer/footerstaff');
        
        }else{
            if (isset($_FILES['foto_kk']['name']) && $_FILES['foto_kk']['name'] !='') {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
      
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_kk')) {
              $error = array('error' => $this->upload->display_errors());
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              ' . $error . '
            </div>');
              redirect('user/surat_kematian');
            } else {
              $foto_kk = $this->upload->data('file_name');
            }
    } else {
        $foto_kk=$this->input->post('foto_kk');
        
    }
        if (isset($_FILES['foto_sk']['name']) && $_FILES['foto_sk']['name'] !='' ) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
    
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_sk')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_kematian');
        } else {
            $foto_sk = $this->upload->data('file_name');
    }
    
        }else{
            $foto_sk=$this->input->post('foto_kk');;
        }

        
        $this->userkelahiran_model->edit_kematian($foto_sk, $foto_kk, $data, $id_lahir);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Validasi
          </div>');
          
        redirect('user/surat_kematian');
        }

    }
    
    public function edit_kematian($id){
        $data['title'] = 'Detail Data Kematian';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_kematian'] = $this->userkelahiran_model->getKematianById($id);
        

        $this->form_validation->set_rules('nik', 'nik', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/edit_kematian',$data);
		$this->load->view('footer/footerstaff');
        
        }else{
        if (isset($_FILES['foto_kk']['name']) && $_FILES['foto_kk']['name'] !='') {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
      
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_kk')) {
              $error = array('error' => $this->upload->display_errors());
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              ' . $error . '
            </div>');
              redirect('user/surat_kematian');
            } else {
              $foto_kk = $this->upload->data('file_name');
            }
    } else {
        $foto_kk=$this->input->post('foto_kk_awal');
        
    }
        if (isset($_FILES['foto_sk']['name']) && $_FILES['foto_sk']['name'] !='' ) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
    
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_sk')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_kematian');
        } else {
            $foto_sk = $this->upload->data('file_name');
    }
    
        }else{
            $foto_sk=$this->input->post('foto_sk_awal');;
        }

        if (isset($_FILES['foto_ktp']['name']) && $_FILES['foto_ktp']['name'] !='' ) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2086;
    
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_ktp')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_kematian');
        } else {
            $foto_ktp = $this->upload->data('file_name');
    }
    
        }else{
            $foto_ktp=$this->input->post('foto_ktp_awal');;
        }
        
        $this->userkelahiran_model->edit_kematian($foto_sk, $foto_kk,$foto_ktp);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Validasi
          </div>');
          
        redirect('user/surat_kematian');
        }

    }
	
}
