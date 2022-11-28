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
		$data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['pengajuan'] = $this->adminkelahiran_model->data_kelahiran();
        
        
		$this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/surat_lahir',$data);
		$this->load->view('footer/footerstaff');
	}
	public function data_kades()
	{
		$data['title'] = 'Data Kepala Desa';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['pengajuan'] = $this->adminkelahiran_model->data_user();
        
        
		$this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/data_kades',$data);
		$this->load->view('footer/footerstaff');
	}
	
	public function edit_kades($id){
	    	$data['title'] = 'Data Kepala Desa';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_kematian'] = $this->adminkelahiran_model->getUserById($id);
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/edit_kades',$data);
		$this->load->view('footer/footerstaff');
		
        
	}
	
	public function ubah_kades(){
	    $nama = $this->input->post('nama');
	    $email = $this->input->post('email');
	    $no_hp = $this->input->post('no_hp');
	    $id_user = $this->input->post('id_user');
	    
	    $data = [
	        'nama' => $nama,
	        'email' => $email,
	        'no_hp' => $no_hp
	        ];
	        $this->db->where('id_user',$id_user);
	        $this->db->update('user',$data);
	}

	public function validasi(){
		$this->form_validation->set_rules('validasi', 'validasi', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/surat_lahir',$data);
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
        //Cek no Surat
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
        //QR Nama
        $QR = $data['no_surat_lahir'].'SKK';


        $this->form_validation->set_rules('nama', 'nama', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/surat_lahir',$data);
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
        $foto_kk = $_FILES['foto_kk'];
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
        redirect('admin/surat_lahir');
      } else {
        $foto_kk = $this->upload->data('file_name');
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
            'foto_kk' => $foto_kk,
            'status' => $status,
            'id_user' => $id_user,
            'nik_ayah' => $nik_ayah,
            'nik_ibu' => $nik_ibu,
            'id_pelayanan' => $data['id_pel'],
            'qr_lahir' => $qr_name,
            'tanggal_input' => $tanggal_input
            
        ];
        $this->userkelahiran_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pendaftaran Berhasil
        </div>');
        redirect('admin/surat_lahir');
        }
    }

    public function ambil($id_lahir){
        $date = date('Y-m-d');
        $status = 'selesai';
        $data = [
            'tanggal_ambil' => $date,
            'status' =>$status
        ];
        $this->db->where('id_lahir',$id_lahir);
        $this->db->update('surat_lahir',$data);
        redirect('admin/surat_lahir');
    }
    public function detail($id){
        $data['title'] = 'Detail Data Kelahiran';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_lahir'] = $this->userkelahiran_model->getLahirById($id);
        

        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/detail',$data);
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
        redirect('admin/surat_lahir');
        }

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
		$this->load->view('admin/sidebar_laporan');
		$this->load->view('admin/laporan_lahir',$data);
		$this->load->view('footer/footerstaff');

    }

    public function cetak(){
      $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
      $data['title'] = 'Laporan Surat Kelahiran';
      $rol = 'kades';
      $data['kades'] = $this->db->get_where('user', ['role' => $rol])->row_array();

        $data['awal'] =$_GET['awal'];
        $data['akhir'] =$_GET['akhir'];
        $data['transaksi'] = $this->adminkelahiran_model->getLahirByDate($data['awal'],$data['akhir']);
        
        ob_start();
        
        $this->load->view('admin/cetak_laporan_lahir', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require './vendor/autoload.php'; // Load plugin html2pdfnya
        $pdf = new \Mpdf\Mpdf([
	'mode' => 'c',
	'orientation' => 'P',
	'margin_left' => 32,
	'margin_right' => 25,
	'margin_top' => 47,
	'margin_bottom' => 47,
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
        $pdf->Output('Laporan Surat Keterangan Kelahiran.pdf', 'D');
	redirect('admin/surat_lahir/laporan');

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
