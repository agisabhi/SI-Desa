<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_surat extends CI_Controller {

	
	
	public function __construct()
  {
    parent::__construct();
    $this->load->model('adminkelahiran_model');
    $this->load->library('form_validation');
  }

	public function index($no)
	{
		$data['title'] = 'Dashboard Staff';
		$status = 'menunggu';
		$data['kades'] = $this->adminkelahiran_model->data_user();
		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
		$data['skk'] = $this->db->get_where('surat_lahir',['status'=>$status])->num_rows();
		$status = 'siap_ambil';
		$tanggal_ambil = date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d"))));
		$data = [
			'status' => $status,
			'tanggal_ambil' => $tanggal_ambil
		];
		$this->db->where('id_lahir',$no);
		$this->db->update('surat_lahir',$data);

		$this->email($no);
        $data['transaksi'] = $this->adminkelahiran_model->data_cetak($no);
        
        ob_start();
        
        $this->load->view('admin/cetak_kelahiran', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require './vendor/autoload.php'; // Load plugin html2pdfnya
        $pdf = new \Mpdf\Mpdf([
	'mode' => 'c',
	'orientation' => 'P',
	'margin_left' => 32,
	'margin_right' => 25,
	'margin_top' => 47,
	'margin_bottom' => 10,
	'margin_header' => 10,
	'margin_footer' => 10,
    'format' => 'A4-P'
]);

$header = '
<table width="100%"><tr>
<td width="30%" align="right"><img src="assets/images/logo-1.jpg" width="120px" /></td>
<td width="170%" align="center"><h1 align="center">PEMERINTAH KABUPATEN PESISIR BARAT<br>KECAMATAN PESISIR SELATAN<br>DESA TANJUNG SETIA</h1></td>
</tr>
</table><hr color="black" size="12px">';


$pdf->SetHTMLHeader($header);
$pdf->showImageErrors = true;
        $pdf->WriteHTML($html);
        $pdf->Output('Surat Keterangan Kelahiran.pdf', 'D');
	redirect('admin/surat_lahir/index');
	}
	
	public function kematian($no)
	{
		$data['title'] = 'Dashboard Staff';
		$status = 'menunggu';
		$data['kades'] = $this->adminkelahiran_model->data_user();
		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
		$data['skk'] = $this->db->get_where('surat_lahir',['status'=>$status])->num_rows();
		$status = 'siap_ambil';
		$tanggal_ambil = date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d"))));
		$data = [
			'status' => $status,
			'tanggal_ambil' => $tanggal_ambil
		];
		$this->db->where('id_kematian',$no);
		$this->db->update('surat_kematian',$data);

		$this->email_kematian($no);
        $data['transaksi'] = $this->adminkelahiran_model->getKematianById($no);
        
        ob_start();
        
        $this->load->view('admin/cetak_kematian', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require './vendor/autoload.php'; // Load plugin html2pdfnya
        $pdf = new \Mpdf\Mpdf([
	'mode' => 'c',
	'orientation' => 'P',
	'margin_left' => 32,
	'margin_right' => 25,
	'margin_top' => 47,
	'margin_bottom' => 10,
	'margin_header' => 10,
	'margin_footer' => 10,
    'format' => 'A4-P'
]);

$header = '
<table width="100%"><tr>
<td width="30%" align="right"><img src="assets/images/logo-1.jpg" width="120px" /></td>
<td width="170%" align="center"><h1 align="center">PEMERINTAH KABUPATEN PESISIR BARAT<br>KECAMATAN PESISIR SELATAN<br>DESA TANJUNG SETIA</h1></td>
</tr>
</table><hr color="black" size="12px">';


$pdf->SetHTMLHeader($header);
$pdf->showImageErrors = true;
        $pdf->WriteHTML($html);
        $pdf->Output('Surat Keterangan Kematian.pdf', 'D');
	redirect('admin/surat_kematian/index');
	}
	public function datang($no)
	{
		$data['title'] = 'Dashboard Staff';
		$status = 'menunggu';
		$data['kades'] = $this->adminkelahiran_model->data_user();
		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
		$data['skk'] = $this->db->get_where('surat_lahir',['status'=>$status])->num_rows();
		$status = 'siap_ambil';
		$tanggal_ambil = date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d"))));
		$data = [
			'status' => $status,
			'tanggal_ambil' => $tanggal_ambil
		];
		$this->db->where('id_datang',$no);
		$this->db->update('surat_datang',$data);

		$this->email_datang($no);
        $data['transaksi'] = $this->adminkelahiran_model->getDatangById($no);
        
        ob_start();
        
        $this->load->view('admin/cetak_datang', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require './vendor/autoload.php'; // Load plugin html2pdfnya
        $pdf = new \Mpdf\Mpdf([
	'mode' => 'c',
	'orientation' => 'P',
	'margin_left' => 32,
	'margin_right' => 25,
	'margin_top' => 47,
	'margin_bottom' => 10,
	'margin_header' => 10,
	'margin_footer' => 10,
    'format' => 'A4-P'
]);

$header = '
<table width="100%"><tr>
<td width="30%" align="right"><img src="assets/images/logo-1.jpg" width="120px" /></td>
<td width="170%" align="center"><h1 align="center">PEMERINTAH KABUPATEN PESISIR BARAT<br>KECAMATAN PESISIR SELATAN<br>DESA TANJUNG SETIA</h1></td>
</tr>
</table><hr color="black" size="12px">';


$pdf->SetHTMLHeader($header);
$pdf->showImageErrors = true;
        $pdf->WriteHTML($html);
        $pdf->Output('Surat Keterangan Pindah Datang.pdf', 'D');
	redirect('admin/surat_datang/index');
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
	public function email_kematian($id)
    {
      $data['user'] = $this->adminkelahiran_model->getKematianByEmail($id);
      
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
	public function email_datang($id)
    {
      $data['user'] = $this->adminkelahiran_model->getDatangById($id);
      
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
