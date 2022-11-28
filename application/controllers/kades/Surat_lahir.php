<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_lahir extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('adminkelahiran_model');
    $this->load->model('userkelahiran_model');
    $this->load->model('kadeskelahiran_model');
    $this->load->library('form_validation');
  }
	
	public function index()
	{
		$data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['pengajuan'] = $this->kadeskelahiran_model->data_kelahiran();
        
        
		$this->load->view('header/headerstaff',$data);
		$this->load->view('kades/sidebar_lahir');
		$this->load->view('kades/surat_lahir',$data);
		$this->load->view('footer/footerstaff');
	}
	
	public function detail($id){
        $data['title'] = 'Detail Data Kelahiran';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_lahir'] = $this->userkelahiran_model->getLahirById($id);
        

        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('kades/sidebar_lahir');
		$this->load->view('kades/detail',$data);
		$this->load->view('footer/footerstaff');
        
        }else{
        $id_lahir = $this->input->post('id_lahir');
        $validasi = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        
        
        
        $data = [
            'keterangan' => $keterangan,
            'status' => $validasi
        ];
        $this->adminkelahiran_model->validasi($data,$id_lahir);
        $this->email($id_lahir);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pendaftaran Berhasil
        </div>');
        redirect('kades/surat_lahir');
        }

    }

	public function validasi($id_lahir){
		

        
        $tanggal_acc = date('Y-m-d');
        $status = 'acc_kades';

        $data = [
            'tanggal_acc' => $tanggal_acc,
            'status' => $status
            
        ];
        $this->kadeskelahiran_model->validasi($data,$id_lahir);
        $this->email($id_lahir);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Validasi
          </div>');
        redirect('kades/surat_lahir');
        
	}

  public function laporan(){
      $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
      $data['title'] = 'Laporan Surat Kelahiran';
      
      if ($this->input->post('submit')) {
        $data['awal'] = $this->input->post('awal');
        $data['akhir'] = $this->input->post('akhir');
      }else{
        $data['awal'] = null;
        $data['akhir'] = null;
      }
      $data['laporan'] = $this->adminkelahiran_model->laporan_lahir($data['awal'],$data['akhir']);
      $data['url']= 'admin/surat_lahir/cetak?awal='.$data['awal'].'&akhir='.$data['akhir'];

        $this->load->view('header/headerstaff',$data);
		$this->load->view('kades/sidebar_laporan');
		$this->load->view('kades/laporan_lahir',$data);
		$this->load->view('footer/footerstaff');

    }

  public function email($id)
    {
      $data['user'] = $this->adminkelahiran_model->getLahirById($id);
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.tanjungsetia.my.id',
            'smtp_user' => 'staff@tanjungsetia.my.id',  // Email gmail
            'smtp_pass'   => 'Agis089683118126',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('staff@tanjungsetia.my.id','Desa Tanjung Setia');

        // Email penerima
        $this->email->to($data['user']['email']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Pengajuan Surat Keterangan Kelahiran');

        // Isi email
        if ($data['user']['status']=='ditolak') {
            $status = '<b>DITOLAK.</b> Silahkan Perhatikan Catatan dari Staff Desa untuk diperbaiki pada akun masing-masing';
        }else if ($data['user']['status']=='acc_staff') {
            $status = '<b>Disetujui Staff Desa.</b> Silahkan menunggu persetujuan dari Kepala Desa untuk kemudian Surat Keterangan Kelahiran dapat diambil';
        }else if ($data['user']['status']=='acc_kades') {
            $status = '<b>Disetujui Kepala Desa.</b> Surat Keterangan Kelahiran siap untuk dicetak oleh Staff Desa';
        }else if ($data['user']['status']=='siap_ambil') {
            $status = '<b>Selesai Dibuat.</b> Surat Keterangan Kelahiran siap untuk diambil di Kantor Desa Tanjung Setia. <br> Terima kasih.';
        }else{
            echo '';
        }
        $this->email->message('Pengajuan Surat Keterangan Kelahiran dengan Nomor ID '.$data['user']['id_pelayanan'].' Status Pengajuannya : '.$status);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
           
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal Kirim Email
          </div>');
        }
    }

	
}
