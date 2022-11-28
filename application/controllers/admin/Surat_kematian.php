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
        $data['pengajuan'] = $this->adminkelahiran_model->data_kematian();
        
        
		$this->load->view('header/headerpindah',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/surat_kematian',$data);
		$this->load->view('footer/footerpindah');
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
        //Cek No Surat Kematian
        $dariDB = $this->userkelahiran_model->cekNoSuratKematian(); 
        $kodeJabatanSekarang = $dariDB+1;
        $data['no_surat_kematian'] = sprintf("%03s",$kodeJabatanSekarang);
        $data['no_surat'] = $data['no_surat_kematian'].'/SKKEM/TS/'.$bulan.'/'.$tahun;
        //Cek No Id Pelayanan
        $bln = date('m');
        $dariDB = $this->adminkelahiran_model->cekNoPelKematian(); 
        $kodeJabatanSekarang = $dariDB+1;
        $data['no_surat_kematian'] = sprintf("%03s",$kodeJabatanSekarang);
        $data['id_pel'] = 'SKEM'.$tahun.$bln.$data['no_surat_kematian'];
        $QR = $data['no_surat_kematian'].'SKKEM';

        $idkem = $this->adminkelahiran_model->cekIdKematian();
        $idkem_now = $idkem+1;

        $this->form_validation->set_rules('nama', 'nama', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/surat_kematian',$data);
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
              redirect('admin/surat_kematian');
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
        redirect('admin/surat_kematian');
        } else {
            $foto_sk = $this->upload->data('file_name');
    }
    
        }else{
            $foto_sk='';
        }
        $this->adminkelahiran_model->tambah($foto_kk,$foto_sk,$data['user']['id_user'],$data['no_surat'], $qr_name, $data['id_pel']);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pendaftaran Berhasil
        </div>');
        redirect('admin/surat_kematian');
    }
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Validasi
          </div>');
          
        redirect('admin/surat_lahir');
        }

    }
    
    public function detail_kematian($id){
        $data['title'] = 'Detail Data Kematian';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
        $data['surat_kematian'] = $this->adminkelahiran_model->getKematianById($id);
        

        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run()==false){
        
        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_lahir');
		$this->load->view('admin/detail_kematian',$data);
		$this->load->view('footer/footerstaff');
        
        }else{
        $id_kematian = $this->input->post('id_kematian');
        $validasi = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        
        
        
        $data = [
            'keterangan' => $keterangan,
            'status' => $validasi
        ];
        $this->adminkelahiran_model->validasi_kematian($data,$id_kematian);
        $this->email_kematian($id_kematian);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Validasi
          </div>');
          
        redirect('admin/surat_kematian');
        }

    }

    public function ambil($id_kematian){
        $date = date('Y-m-d');
        $status = 'selesai';
        $data = [
            'tanggal_ambil' => $date,
            'status' =>$status
        ];
        $this->db->where('id_kematian',$id_kematian);
        $this->db->update('surat_kematian',$data);
        redirect('admin/surat_kematian');
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
      $data['laporan'] = $this->adminkelahiran_model->laporan_kematian($data['awal'],$data['akhir']);
      $data['url']= 'admin/surat_kematian/cetak?awal='.$data['awal'].'&akhir='.$data['akhir'];

        $this->load->view('header/headerstaff',$data);
		$this->load->view('admin/sidebar_laporan');
		$this->load->view('admin/laporan_kematian',$data);
		$this->load->view('footer/footerstaff');

    }

    public function cetak(){
      $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata['nama']])->row_array();
      $data['title'] = 'Laporan Surat Kematian';

        $data['awal'] =$_GET['awal'];
        $data['akhir'] =$_GET['akhir'];
        $data['transaksi'] = $this->adminkelahiran_model->getKematianByDate($data['awal'],$data['akhir']);
        $rol = 'kades';
        $data['kades'] = $this->db->get_where('user', ['role' => $rol])->row_array();
        
        ob_start();
        
        $this->load->view('admin/cetak_laporan_kematian', $data);
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
        $pdf->Output('Laporan Surat Keterangan Kematian.pdf', 'D');
	redirect('admin/surat_kematian/laporan');

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
	
}
