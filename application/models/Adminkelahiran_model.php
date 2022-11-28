<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminkelahiran_model extends CI_Model {


    public function validasi($data, $id)
  {
    $this->db->where('id_lahir', $id);
    $this->db->update('surat_lahir', $data);
   
  }
    public function validasi_kematian($data, $id)
  {
    $this->db->where('id_kematian', $id);
    $this->db->update('surat_kematian', $data);
   
  }
    public function validasi_datang($data, $id)
  {
    $this->db->where('id_datang', $id);
    $this->db->update('surat_datang', $data);
   
  }

  public function data_cetak($id){
    $this->db->select('*');
    $this->db->from('surat_lahir');
    $this->db->where('id_lahir',$id);
    return $this->db->get()->row_array();
  }
  public function hitung_tugas(){
    $stat1='menunggu';
    $stat2 = 'acc_kades';
    $this->db->select('*');
    $this->db->from('surat_lahir');
    $this->db->where('status',$stat1);
    $this->db->or_where('status',$stat2);
    return $this->db->get()->num_rows();
  }

  public function data_kelahiran(){
    $stat = 'menunggu';
    $stat2 = 'acc_kades';
    $this->db->select('id_lahir');
    $this->db->select('id_pelayanan');
    $this->db->select('no_surat_lahir');
        $this->db->select('surat_lahir.nama');
        $this->db->select('nama_ayah');
        $this->db->select('tempat_lahir');
        $this->db->select('nama_ibu');
        $this->db->select('tanggal_lahir');
        $this->db->select('anak_ke');
        $this->db->select('keterangan');
        $this->db->select('status');
        $this->db->select('tanggal_acc');
        $this->db->from('surat_lahir');
        $this->db->join('user','surat_lahir.id_user=user.id_user');
        
        $this->db->order_by('no_surat_lahir','DESC');
        return $this->db->get()->result_array();
  }

  public function data_kematian(){
    
    $this->db->select('*');
    $this->db->from('detail_kematian');
    $this->db->join('surat_kematian','detail_kematian.id_kematian=surat_kematian.id_kematian');
        $this->db->order_by('detail_kematian.id_kematian','DESC');
        return $this->db->get()->result_array();
  }
  public function data_datang(){
    
    $this->db->select('id_datang');
    $this->db->select('id_pelayanan');
    $this->db->select('no_surat_datang');
    $this->db->select('surat_datang.nama');
    $this->db->select('surat_datang.nik');
    $this->db->select('surat_datang.no_kk');
    $this->db->select('status');
    $this->db->select('keterangan');
    $this->db->from('surat_datang');
    $this->db->join('user','surat_datang.id_user=user.id_user');
        $this->db->order_by('id_datang','DESC');
        return $this->db->get()->result_array();
  }
    
    public function data_user(){
        $kades = 'kades';
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role',$kades);
        return $this->db->get()->result_array();
    }
    public function getUserById($id){
        $kades = 'kades';
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$id);
        return $this->db->get()->row_array();
    }
  public function cekIdKematian(){
		$query = $this->db->query('SELECT MAX(id_kematian) as id_kematian from surat_kematian');
        $hasil = $query->row();
        return $hasil->id_kematian;
	}
  public function cekNoSuratKematian(){
		$query = $this->db->query('SELECT MAX(substr(no_surat_kematian,1,3)) as no_surat from surat_kematian');
        $hasil = $query->row();
        return $hasil->no_surat;
	}
  public function cekNoPel(){
		$query = $this->db->query('SELECT MAX(substr(id_pelayanan,11,3)) as no_pel from surat_lahir');
        $hasil = $query->row();
        return $hasil->no_pel;
	}
  public function cekNoPelKematian(){
		$query = $this->db->query('SELECT MAX(substr(id_pelayanan,11,3)) as no_pel from surat_kematian');
        $hasil = $query->row();
        return $hasil->no_pel;
	}
  public function cekNoPelDatang(){
		$query = $this->db->query('SELECT MAX(substr(id_pelayanan,11,3)) as no_pel from surat_datang');
        $hasil = $query->row();
        return $hasil->no_pel;
	}

  public function tambah($foto_ktp, $foto_kk, $foto_sk,$id_user,$no_surat, $qr, $id_pel){
    $query = $this->db->query('SELECT MAX(id_kematian) as id_kematian from surat_kematian');
        $hasil = $query->row();
        $idkem_now = $hasil->id_kematian;
    $nama = $this->input->post('nama');
        $bin = $this->input->post('bin');
        $nik = $this->input->post('nik');
        $jk = $this->input->post('jk');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $wn = $this->input->post('wn');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $tanggal_kematian = $this->input->post('tanggal_kematian');
        $jam = $this->input->post('jam');
        $tempat = $this->input->post('tempat');
        $sebab = $this->input->post('sebab');
        $status = 'menunggu';
        $tanggal_input = date('Y-m-d');
        
        $id_kematian = $idkem_now+1;


        $data = [
            'id_kematian' => $id_kematian,
            'no_surat_kematian' => $no_surat,
            'nama' => $nama,
            'bin' => $bin,
            'jk' => $jk,
            'nik' => $nik,
            'tanggal_lahir' => $tanggal_lahir,
            'wn' => $wn,
            'agama' => $agama,
            'status' => $status,
            'id_user' => $id_user,
            'alamat' => $alamat,
            'qr_kematian' => $qr,
            'tanggal_input' => $tanggal_input,
            'id_pelayanan' => $id_pel

        ];
        $datu = [
            'tanggal_kematian' => $tanggal_kematian,
            'jam' => $jam,
            'tempat' => $tempat,
            'sebab' => $sebab,
            'id_kematian' => $id_kematian,
            'foto_ktp' => $foto_ktp,
            'foto_kk' => $foto_kk,
            'foto_sk' => $foto_sk
            
        ];


    $this->db->insert('surat_kematian',$data);
    $this->db->insert('detail_kematian',$datu);

  }
  public function tambah_datang($foto_kk, $foto_sp, $foto_ktp,$id_user,$no_surat, $qr, $id_pel){
    
        $nama = $this->input->post('nama');
        $no_kk = $this->input->post('no_kk');
        $nik = $this->input->post('nik');
        $jk = $this->input->post('jk');
        $id_prov_asal = $this->input->post('provinsi');
        $id_kab_asal = $this->input->post('kabupaten');
        $id_kec_asal = $this->input->post('kecamatan');
        $id_kel_asal = $this->input->post('kelurahan');
        $prov_now = $this->input->post('prov_now');
        $kab_now = $this->input->post('kab_now');
        $kec_now = $this->input->post('kec_now');
        $kel_now = $this->input->post('kel_now');
        $pekerjaan = $this->input->post('pekerjaan');
        $alamat_sekarang = 'Desa '.$kel_now.' Kecamatan '.$kec_now.' Kabupaten '.$kab_now.' Provinsi '.$prov_now;
        $status = 'menunggu';
        $tanggal_input = date('Y-m-d');


        $data = [
            'no_surat_datang' => $no_surat,
            'nama' => $nama,
            'no_kk' => $no_kk,
            'nik' => $nik,
            'jk' => $jk,
            'id_prov_asal' => $id_prov_asal,
            'id_kab_asal' => $id_kab_asal,
            'id_kec_asal' => $id_kec_asal,
            'id_kel_asal' => $id_kel_asal,
            'alamat_sekarang' => $alamat_sekarang,
            'pekerjaan' => $pekerjaan,
            'id_user' =>$id_user,
            'foto_kk' =>$foto_kk,
            'foto_sp' =>$foto_sp,
            'foto_ktp' =>$foto_ktp,
            'status' => $status,
            'qr_datang' => $qr,
            'id_pelayanan' => $id_pel,
            'tanggal_input' => $tanggal_input
            

        ];
        
    $this->db->insert('surat_datang',$data);
    
  }
  

  public function getKematianById($id){
    $this->db->select('surat_kematian.id_kematian');
    $this->db->select('no_surat_kematian');
    $this->db->select('nama');
    $this->db->select('bin');
    $this->db->select('jk');
    $this->db->select('wn');
    $this->db->select('agama');
    $this->db->select('keterangan');
    $this->db->select('tanggal_acc');
    $this->db->select('alamat');
    $this->db->select('tanggal_kematian');
    $this->db->select('tanggal_lahir');
    $this->db->select('jam');
    $this->db->select('tempat');
    $this->db->select('sebab');
    $this->db->select('nik');
    $this->db->select('qr_kematian');
    $this->db->select('foto_sk');
    $this->db->select('foto_kk');
    $this->db->select('foto_ktp');
    $this->db->from('detail_kematian');
    $this->db->join('surat_kematian','detail_kematian.id_kematian=surat_kematian.id_kematian');
    $this->db->where('surat_kematian.id_kematian',$id);

    return $this->db->get()->row_array();
  }
  public function getDatangById($id){
    
    $this->db->select('id_datang');
    $this->db->select('id_pelayanan');
    $this->db->select('no_surat_datang');
    $this->db->select('surat_datang.nama');
    $this->db->select('provinsi.nama_prov');
    $this->db->select('kabupaten.nama_kab');
    $this->db->select('kecamatan.nama_kec');
    $this->db->select('kelurahan.nama_kel');
    $this->db->select('surat_datang.no_kk');
    $this->db->select('surat_datang.jk');
    $this->db->select('pekerjaan');
    $this->db->select('tanggal_acc');
    $this->db->select('status');
    $this->db->select('email');
    $this->db->select('alamat_sekarang');
    $this->db->select('id_prov_asal');
    $this->db->select('id_kab_asal');
    $this->db->select('id_kec_asal');
    $this->db->select('id_kel_asal');
    $this->db->select('surat_datang.nik');
    $this->db->select('foto_sp');
    $this->db->select('foto_ktp');
    $this->db->select('foto_kk');
    $this->db->select('qr_datang');
    $this->db->select('keterangan');
    $this->db->select('surat_datang.id_user');
    $this->db->from('surat_datang');
    $this->db->join('user','surat_datang.id_user=user.id_user');
    $this->db->join('provinsi','surat_datang.id_prov_asal=provinsi.id_prov');
    $this->db->join('kabupaten','surat_datang.id_kab_asal=kabupaten.id_kab');
    $this->db->join('kecamatan','surat_datang.id_kec_asal=kecamatan.id_kec');
    $this->db->join('kelurahan','surat_datang.id_kel_asal=kelurahan.id_kel');
    $this->db->where('id_datang',$id);

    return $this->db->get()->row_array();
  }

  public function data_kematian_kades(){
    $status1 = "acc_staff";
    $status2 = "siap_ambil";
    $status3 = "acc_kades";
    $this->db->select('surat_kematian.id_kematian');
    $this->db->select('nama');
    $this->db->select('bin');
    $this->db->select('jk');
    $this->db->select('wn');
    $this->db->select('agama');
    $this->db->select('alamat');
    $this->db->select('id_pelayanan');
    $this->db->select('tanggal_kematian');
    $this->db->select('tanggal_lahir');
    $this->db->select('jam');
    $this->db->select('status');
    $this->db->select('keterangan');
    $this->db->select('tempat');
    $this->db->select('sebab');
    $this->db->select('nik');
    $this->db->select('foto_ktp');
    $this->db->select('foto_sk');
    $this->db->select('foto_kk');
    $this->db->from('detail_kematian');
    $this->db->join('surat_kematian','detail_kematian.id_kematian=surat_kematian.id_kematian');
    $this->db->where('surat_kematian.status',$status1);
    $this->db->or_where('surat_kematian.status',$status2);
    $this->db->or_where('surat_kematian.status',$status3);
    $this->db->order_by('id_pelayanan','DESC');

    return $this->db->get()->result_array();
  }

  public function laporan_lahir($awal = null, $akhir=null){
    if ($awal && $akhir) {
      $this->db->where('tanggal_acc >=',$awal);
      $this->db->where('tanggal_acc <=',$akhir);
    }
    $status = 'selesai';
    $this->db->where('status',$status);
    return $this->db->get('surat_lahir')->result_array();
  }
  public function laporan_kematian($awal = null, $akhir=null){
    if ($awal && $akhir) {
      $this->db->where('tanggal_acc >=',$awal);
      $this->db->where('tanggal_acc <=',$akhir);
    }
    $status = 'selesai';
    $this->db->where('status',$status);
    return $this->db->get('surat_kematian')->result_array();
  }
  public function laporan_datang($awal = null, $akhir=null){
    if ($awal && $akhir) {
      $this->db->where('tanggal_acc >=',$awal);
      $this->db->where('tanggal_acc <=',$akhir);
    }
    $status = 'selesai';
    $this->db->where('status',$status);
    return $this->db->get('surat_datang')->result_array();
  }
  public function getLahirByDate($awal = null, $akhir=null){
    if ($awal && $akhir) {
      $this->db->where('tanggal_acc >=',$awal);
      $this->db->where('tanggal_acc <=',$akhir);
    }
    $status = 'selesai';
    $this->db->where('status',$status);
    return $this->db->get('surat_lahir')->result_array();
  }
  
  public function getLahirById($id){
    $this->db->select('id_lahir');
    $this->db->select('id_pelayanan');
        $this->db->select('no_surat_lahir');
        $this->db->select('surat_lahir.nama');
        $this->db->select('nama_ayah');
        $this->db->select('jenis_kelamin');
        $this->db->select('tempat_lahir');
        $this->db->select('nama_ibu');
        $this->db->select('tanggal_lahir');
        $this->db->select('anak_ke');
        $this->db->select('keterangan');
        $this->db->select('email');
        $this->db->select('tanggal_ambil');
        $this->db->select('tanggal_input');
        $this->db->select('status');
        $this->db->select('foto_kk');
        $this->db->select('foto_sk');
        $this->db->select('foto_ktp_ayah');
        $this->db->select('foto_ktp_ibu');
        $this->db->select('tanggal_acc');
        $this->db->from('surat_lahir');
        $this->db->join('user','surat_lahir.id_user=user.id_user');
        $this->db->where('id_lahir',$id);
        
        return $this->db->get()->row_array();
  }
  public function getKematianByEmail($id){
    $this->db->select('id_kematian');
        $this->db->select('id_pelayanan');
        $this->db->select('no_surat_kematian');
        $this->db->select('surat_kematian.nama');
        $this->db->select('email');
        $this->db->select('status');
        
        $this->db->from('surat_kematian');
        $this->db->join('user','surat_kematian.id_user=user.id_user');
        $this->db->where('id_kematian',$id);
        
        return $this->db->get()->row_array();
  }
  public function getKematianByDate($awal = null, $akhir=null){
    if ($awal && $akhir) {
      $this->db->where('tanggal_acc >=',$awal);
      $this->db->where('tanggal_acc <=',$akhir);
    }
    $status = 'selesai';
    $this->db->where('status',$status);
    return $this->db->get('surat_kematian')->result_array();
  }
  
  public function lahir_baru(){
      $now = date('Y-m-d');
      $status = 'menunggu';
      $this->db->select('*');
      $this->db->from('surat_lahir');
      $this->db->where('tanggal_input',$now);
      $this->db->where('status',$status);
      return $this->db->get()->num_rows();
  }
  public function lahir_proses(){
      $status1 = 'acc_staff';
      $status2 = 'acc_kades';
      $status3 = 'siap_ambil';
      $this->db->select('*');
      $this->db->from('surat_lahir');
      $this->db->where('status',$status1);
      $this->db->or_where('status',$status2);
      $this->db->or_where('status',$status3);
      return $this->db->get()->num_rows();
  }
  public function datang_proses(){
      $status1 = 'acc_staff';
      $status2 = 'acc_kades';
      $status3 = 'siap_ambil';
      $this->db->select('*');
      $this->db->from('surat_datang');
      $this->db->where('status',$status1);
      $this->db->or_where('status',$status2);
      $this->db->or_where('status',$status3);
      return $this->db->get()->num_rows();
  }
  public function kematian_proses(){
      $status1 = 'acc_staff';
      $status2 = 'acc_kades';
      $status3 = 'siap_ambil';
      $this->db->select('*');
      $this->db->from('surat_kematian');
      $this->db->where('status',$status1);
      $this->db->or_where('status',$status2);
      $this->db->or_where('status',$status3);
      return $this->db->get()->num_rows();
  }
  public function getDatangByDate($awal = null, $akhir=null){
    if ($awal && $akhir) {
      $this->db->where('tanggal_acc >=',$awal);
      $this->db->where('tanggal_acc <=',$akhir);
    }
    $status = 'selesai';
    $this->db->where('status',$status);
    return $this->db->get('surat_datang')->result_array();
  }
}