<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function __construct()
  {
    parent::__construct();
    $this->load->model('register_model');
    $this->load->library('form_validation');
  }
	public function index()
	{
		$this->load->view('register');
	}

    public function tambah (){
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    if($this->form_validation->run()==false){
    
    $this->load->view('register');
    
    }else{

      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $role = 'user';
      
      $data = [
        'nama' => $nama,
        'email' => $email,
        'role' => $role,
        'password' => $password,
        
      ];
      $this->register_model->tambah($data, $email);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pendaftaran Berhasil
      </div>');
      redirect('register');
    }


    }
}