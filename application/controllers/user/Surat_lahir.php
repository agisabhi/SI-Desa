<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_lahir extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    
    $this->load->model('adminkelahiran_model');
    $this->load->model('userkelahiran_model');
    $this->load->library('form_validation');
  }
	
	public function index()
	{
		$data['title'] = 'Dashboard User';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['pengajuan'] = $this->userkelahiran_model->datalahir($data['user']['id_user']);
        
        
		$this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/kelahiran',$data);
		$this->load->view('footer/footerstaff');
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
        $dariDB = $this->userkelahiran_model->cekNoSuratLahir(); 
        $kodeJabatanSekarang = $dariDB+1;
        $data['no_surat_lahir'] = sprintf("%03s",$kodeJabatanSekarang);
        $data['no_surat'] = $data['no_surat_lahir'].'/SKK/TS/'.$bulan.'/'.$tahun;
        //Cek No Pelayanan
        $cek_pel = $this->adminkelahiran_model->cekNoPel();
        $pel_now = $cek_pel+1;
        $bln = date('m');
        $data['no_pel'] = sprintf("%03s",$pel_now);
        $data['id_pel'] = 'SKEL'.$tahun.$bln.$data['no_pel'];
        //QR nama
        $QR = $data['no_surat_lahir'].'SKK';

        $this->form_validation->set_rules('nama', 'nama', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/kelahiran',$data);
		$this->load->view('footer/footerstaff');
        
        }else{

        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $nama_ayah = $this->input->post('nama_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $alamat = $this->input->post('alamat');
        $anak_ke = $this->input->post('anak_ke');
        $status = 'menunggu';
        $foto_ktp_ayah = $_FILES['foto_ktp_ayah'];
        $foto_ktp_ibu = $_FILES['foto_ktp_ibu'];
        $foto_kk = $_FILES['foto_kk'];
        $foto_sk = $_FILES['foto_sk'];
        $nik_ayah = $this->input->post('nik_ayah');
        $nik_ibu = $this->input->post('nik_ibu');
        $id_user = $data['user']['id_user'];
        $tanggal_input = date('Y-m-d');

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
        
        if ($foto_ktp_ayah = '') {
    } else {
      $config['upload_path'] = './assets/foto';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 2086;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_ktp_ayah')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_lahir');
      } else {
        $foto_ktp_ayah = $this->upload->data('file_name');
      }
    }
        if ($foto_ktp_ibu = '') {
    } else {
      $config['upload_path'] = './assets/foto';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 2086;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_ktp_ibu')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_lahir');
      } else {
        $foto_ktp_ibu = $this->upload->data('file_name');
      }
    }
    
    
        if ($foto_kk = '') {
    } else {
      $config['upload_path'] = './assets/foto';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 2086;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_kk')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_lahir');
      } else {
        $foto_kk = $this->upload->data('file_name');
      }
    }
    
        if ($foto_sk = '') {
    } else {
      $config['upload_path'] = './assets/foto';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 2086;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_sk')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . $error . '
      </div>');
        redirect('user/surat_lahir');
      } else {
        $foto_sk = $this->upload->data('file_name');
      }
    }
        
        $data = [
            'no_surat_lahir' => $data['no_surat'],
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'anak_ke' => $anak_ke,
            'foto_ktp_ayah' => $foto_ktp_ayah,
            'foto_ktp_ibu' => $foto_ktp_ibu,
            'foto_kk' => $foto_kk,
            'foto_sk' => $foto_sk,
            'status' => $status,
            'id_user' => $id_user,
            'nik_ayah' => $nik_ayah,
            'nik_ibu' => $nik_ibu,
            'qr_lahir' => $qr_name,
            'id_pelayanan' => $data['id_pel'],
            'tanggal_input' => $tanggal_input
            
        ];
        $this->userkelahiran_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pendaftaran Berhasil
        </div>');
        redirect('user/surat_lahir');
        }
    }

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_lahir'] = $this->userkelahiran_model->getLahirById($id);
        

        $this->form_validation->set_rules('nama_ayah', 'Nama', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar_lahir');
		$this->load->view('user/edit_surat_lahir',$data);
		$this->load->view('footer/footerstaff');
        
        }else{
            if (isset($_POST['submit'])) {
           $file_ktp_ayah = $this->input->post('file_ktp_ayah');
           $file_ktp_ibu = $this->input->post('file_ktp_ibu');
           $file_kk = $this->input->post('file_kk');
           $file_sk = $this->input->post('file_sk');
        
        if ($_FILES['foto_kk']['name'] != '' ) {

          $config['upload_path'] = './assets/foto';
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size'] = 2086;

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('foto_kk')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Foto KTP harus PNG/JPG atau maks ukuran 1 MB
            </div>');
            redirect('user/surat_lahir');
          } else {
            $foto_kk = $this->upload->data('file_name');
          }

          
          if (file_exists('./assets/foto' . $foto_kk) ) {
            unlink('./assets/foto' . $foto_kk);
            
          }
        } else {
          $foto_kk = $file_kk;
        }
        
        if ($_FILES['foto_ktp_ayah']['name'] != '' ) {

          $config['upload_path'] = './assets/foto';
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size'] = 2086;

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('foto_ktp_ayah')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Foto KTP harus PNG/JPG atau maks ukuran 1 MB
            </div>');
            redirect('user/surat_lahir');
          } else {
            $foto_ktp_ayah = $this->upload->data('file_name');
          }

          if (file_exists('./assets/foto' . $foto_ktp_ayah) ) {
            unlink('./assets/foto' . $foto_ktp_ayah);
            
          }
        } else {
          $foto_ktp_ayah = $file_ktp_ayah;
        }
        
        if ($_FILES['foto_ktp_ibu']['name'] != '' ) {

          $config['upload_path'] = './assets/foto';
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size'] = 2086;

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('foto_ktp_ibu')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Foto KTP harus PNG/JPG atau maks ukuran 1 MB
            </div>');
            redirect('user/surat_lahir');
          } else {
            $foto_ktp_ibu = $this->upload->data('file_name');
          }

          if (file_exists('./assets/foto' . $foto_ktp_ibu) ) {
            unlink('./assets/foto' . $foto_ktp_ibu);
            
          }
        } else {
          $foto_ktp_ibu = $file_ktp_ibu;
        }
        if ($_FILES['foto_sk']['name'] != '' ) {

          $config['upload_path'] = './assets/foto';
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size'] = 2086;

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('foto_sk')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Foto KTP harus PNG/JPG atau maks ukuran 1 MB
            </div>');
            redirect('user/surat_lahir');
          } else {
            $foto_sk = $this->upload->data('file_name');
          }

          if (file_exists('./assets/foto' . $foto_sk) ) {
            unlink('./assets/foto' . $foto_sk);
            
          }
        } else {
          $foto_sk = $file_sk;
        }
      }
      

    $this->userkelahiran_model->edit($foto_kk,$foto_ktp_ayah, $foto_ktp_ibu, $foto_sk, $id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data Pengajuan Berhasil Diubah
      </div>');
      redirect('user/surat_lahir');
    }
    }

    
    


	
}
