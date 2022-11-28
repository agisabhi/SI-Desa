<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    
    $this->load->model('user_model');
    $this->load->library('form_validation');
  }
	
	public function index()
	{
		$data['title'] = 'Dashboard User';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();

		$this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar');
		$this->load->view('user/index',$data);
		$this->load->view('footer/footerstaff');
	}
	public function profil()
	{
		$data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();

		$this->load->view('header/headerstaff',$data);
		$this->load->view('user/sidebar');
		$this->load->view('user/profil',$data);
		$this->load->view('footer/footerstaff');
	}
	public function editprofil()
	{
		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
        $this->load->view('user/sidebar');
        $this->load->view('user/profil',$data);
        $this->load->view('footer/footerstaff');
        
        }else{

        
		if (isset($_POST['submit'])) {
           $file_foto = $this->input->post('file_foto');
        
        if ($_FILES['foto']['name'] != '' ) {

          $config['upload_path'] = './assets/foto';
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size'] = 2086;

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Foto KTP harus PNG/JPG atau maks ukuran 1 MB
            </div>');
            redirect('user/user/profil');
          } else {
            $foto = $this->upload->data('file_name');
          }

          $this->user_model->editprofil($foto);
          if (file_exists('./assets/foto' . $foto) ) {
            unlink('./assets/foto' . $foto);
            
          }
        } else {
          $this->user_model->editprofil($file_foto);
        }
      }
      


      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data Profil Berhasil Diubah
      </div>');
      redirect('user/user/index');
    }
  }
	}

	

	

