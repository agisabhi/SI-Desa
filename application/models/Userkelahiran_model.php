<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userkelahiran_model extends CI_Model {

    public function datalahir($id){
        $this->db->select('id_lahir');
        $this->db->select('id_pelayanan');
        $this->db->select('no_surat_lahir');
        $this->db->select('surat_lahir.nama');
        $this->db->select('nama_ayah');
        $this->db->select('tanggal_ambil');
        $this->db->select('jenis_kelamin');
        $this->db->select('tempat_lahir');
        $this->db->select('nama_ibu');
        $this->db->select('tanggal_lahir');
        $this->db->select('anak_ke');
        $this->db->select('keterangan');
        $this->db->select('status');
        $this->db->select('tanggal_acc');
        $this->db->from('surat_lahir');
        $this->db->join('user','surat_lahir.id_user=user.id_user');
        $this->db->where('surat_lahir.id_user',$id);
        $this->db->order_by('no_surat_lahir','DESC');
        return $this->db->get()->result_array();
    }

    public function cekNoSuratLahir(){
		$query = $this->db->query('SELECT MAX(substr(no_surat_lahir,1,3)) as no_surat from surat_lahir');
        $hasil = $query->row();
        return $hasil->no_surat;
	}
    public function cekNoSuratKematian(){
		$query = $this->db->query('SELECT MAX(substr(no_surat_kematian,1,3)) as no_surat from surat_kematian');
        $hasil = $query->row();
        return $hasil->no_surat;
	}
    public function cekNoSuratDatang(){
		$query = $this->db->query('SELECT MAX(substr(no_surat_datang,1,3)) as no_surat from surat_datang');
        $hasil = $query->row();
        return $hasil->no_surat;
	}

    public function tambah($data){
        $this->db->insert('surat_lahir',$data);
    }

    public function getLahirById($id){
        $this->db->select('*');
        $this->db->from('surat_lahir');
        $this->db->where('id_lahir',$id);
        return $this->db->get()->row_array();
    }

    public function edit($foto_kk,$foto_ktp_ayah, $foto_ktp_ibu, $foto_sk, $id)
  {
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $nama_ayah = $this->input->post('nama_ayah');
        $nik_ayah = $this->input->post('nik_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $nik_ibu = $this->input->post('nik_ibu');
        $alamat = $this->input->post('alamat');
        $anak_ke = $this->input->post('anak_ke');
        $status = 'menunggu';
        
        $data = [
            
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'anak_ke' => $anak_ke,
            'status' => $status,
            'nik_ayah' => $nik_ayah,
            'nik_ibu' => $nik_ibu,
            'foto_ktp_ibu' => $foto_ktp_ibu,
            'foto_ktp_ayah' => $foto_ktp_ayah,
            'foto_kk' => $foto_kk,
            'foto_sk' => $foto_sk
            
        ];


    $this->db->where('id_lahir', $id);
    $this->db->update('surat_lahir', $data);
   
  }

   public function getKematianById($id){
    $this->db->select('surat_kematian.id_kematian');
    $this->db->select('nama');
    $this->db->select('bin');
    $this->db->select('jk');
    $this->db->select('wn');
    $this->db->select('agama');
    $this->db->select('alamat');
    $this->db->select('tanggal_kematian');
    $this->db->select('tanggal_lahir');
    $this->db->select('jam');
    $this->db->select('tempat');
    $this->db->select('sebab');
    $this->db->select('id_pelayanan');
    $this->db->select('nik');
    $this->db->select('foto_ktp');
    $this->db->select('foto_sk');
    $this->db->select('foto_kk');
    $this->db->from('detail_kematian');
    $this->db->join('surat_kematian','detail_kematian.id_kematian=surat_kematian.id_kematian');
    $this->db->where('surat_kematian.id_kematian',$id);

    return $this->db->get()->row_array();
  }

   public function getKematianByUser($id){
       
    $this->db->select('surat_kematian.id_kematian');
    $this->db->select('nama');
    $this->db->select('no_surat_kematian');
    $this->db->select('bin');
    $this->db->select('id_pelayanan');
    $this->db->select('jk');
    $this->db->select('wn');
    $this->db->select('agama');
    $this->db->select('alamat');
    $this->db->select('tanggal_kematian');
    $this->db->select('tanggal_lahir');
    $this->db->select('jam');
    $this->db->select('tempat');
    $this->db->select('status');
    $this->db->select('keterangan');
    $this->db->select('sebab');
    $this->db->select('nik');
    $this->db->select('foto_ktp');
    $this->db->select('foto_sk');
    $this->db->select('foto_kk');
    $this->db->from('detail_kematian');
    $this->db->join('surat_kematian','detail_kematian.id_kematian=surat_kematian.id_kematian');
    $this->db->where('surat_kematian.id_user',$id);
    $this->db->order_by('no_surat_kematian', 'DESC');

    return $this->db->get()->result_array();
  }

  public function getDatangByUser($id_user){
    $this->db->select('*');
    $this->db->from('surat_datang');
    $this->db->join('user','surat_datang.id_user=user.id_user');
    $this->db->where('surat_datang.id_user',$id_user);
    return $this->db->get()->result_array();
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
    $this->db->select('no_kk');
    $this->db->select('jk');
    $this->db->select('pekerjaan');
    $this->db->select('tanggal_acc');
    $this->db->select('status');
    
    $this->db->select('alamat_sekarang');
    $this->db->select('id_prov_asal');
    $this->db->select('id_kab_asal');
    $this->db->select('id_kec_asal');
    $this->db->select('id_kel_asal');
    $this->db->select('nik');
    $this->db->select('foto_sp');
    $this->db->select('foto_ktp');
    $this->db->select('foto_kk');
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
  public function edit_kematian($foto_sk, $foto_kk,$foto_ktp){
    $id_kematian = $this->input->post('id_kematian');
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
        


        $data = [
            
            
            'nama' => $nama,
            'bin' => $bin,
            'jk' => $jk,
            'nik' => $nik,
            'tanggal_lahir' => $tanggal_lahir,
            'wn' => $wn,
            'agama' => $agama,
            
            'alamat' => $alamat

        ];
        $datu = [
            'tanggal_kematian' => $tanggal_kematian,
            'jam' => $jam,
            'tempat' => $tempat,
            'sebab' => $sebab,
            'foto_ktp' => $foto_ktp,
            'foto_kk' => $foto_kk,
            'foto_sk' => $foto_sk
            
        ];


    $this->db->where('id_kematian',$id_kematian);
    $this->db->update('surat_kematian',$data);
    $this->db->where('id_kematian',$id_kematian);
    $this->db->update('detail_kematian',$datu);

  }

  public function edit_datang($foto_sp, $foto_kk, $foto_ktp, $id){
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
        


        $data = [
            
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
            
            'foto_kk' =>$foto_kk,
            'foto_sp' =>$foto_sp,
            'foto_ktp' =>$foto_ktp,
            'status' => $status
            

        ];
        $this->db->where('id_datang',$id);
        $this->db->update('surat_datang',$data);
  }

  public function hasil_lahir($no){
    $this->db->select('*');
    $this->db->like('id_pelayanan',$no);
    $this->db->from('surat_lahir');
    return $this->db->get()->row_array();
  }
  public function num_lahir($no){
    $this->db->select('*');
    $this->db->like('id_pelayanan',$no);
    $this->db->from('surat_lahir');
    return $this->db->get()->num_rows();
  }
  public function hasil_datang($no){
    $this->db->select('*');
    $this->db->like('id_pelayanan',$no);
    $this->db->from('surat_datang');
    return $this->db->get()->row_array();
  }
  public function num_datang($no){
    $this->db->select('*');
    $this->db->like('id_pelayanan',$no);
    $this->db->from('surat_datang');
    return $this->db->get()->num_rows();
  }
  public function hasil_kematian($no){
    $this->db->select('*');
    $this->db->like('id_pelayanan',$no);
    $this->db->from('surat_kematian');
    return $this->db->get()->row_array();
  }
  public function num_kematian($no){
    $this->db->select('*');
    $this->db->like('id_pelayanan',$no);
    $this->db->from('surat_kematian');
    return $this->db->get()->num_rows();
  }
}