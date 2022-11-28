<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct()
  {
    parent::__construct();
    $this->load->model('register_model');
    $this->load->library('form_validation');
    $this->load->library('session');
  }
	public function index()
	{
        
		$this->load->view('login');
	}

    public function process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $akun = $this->db->get_where('user', ['email' => $email])->row_array();
        
        //jika nip sudah sama
        if ($akun) {
            if ($password == $akun['password']) {

                $data = [
                    'id_user' => $akun['id_user'],
                    'email' => $akun['email'],
                    'nama' => $akun['nama'],
                    'foto' => $akun['foto'],
                    'alamat' => $akun['alamat'],
                    'no_hp' => $akun['no_hp'],
                    'nik' => $akun['nik'],
                    'no_kk' => $akun['no_kk'],
                    'role' => $akun['role']
                ];
                $this->session->set_userdata($data);

                if ($akun['role'] == "staff") {
                    redirect('admin/admin');
                } else if ($akun['role'] == "kades") {
                    redirect('kades/home');
                } else {
                    redirect('user/user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password Salah 
          </div>');
                redirect('login','refresh');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun Tidak Terdaftar
          </div>');
          
            redirect('login','refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('no_hp');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('foto');

       
        redirect('welcome');
    }
}
