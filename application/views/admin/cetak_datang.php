<html>
    <body>
            
        
    </style>
    
    <div class="container-fluid">
        
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        
                       <h4 align="center">
                            <ins>SURAT KETERANGAN PINDAH DATANG (SKPD)</ins><br>
                            NO: <?=$transaksi['no_surat_datang'];?>
                        </h4>
                        
                        <div class="font-15">
                            <p align="justify" size="5">
                                Yang bertanda tangan dibawah ini Kepada Desa Tanjung Setia Kecamatan Pesisir Selatan Kabupaten Pesisir Barat. 
                                menerangkan keterangan pindah datang penduduk dengan data sebagai berikut: <br>
                                
                            </p>
                            <table width="500px">
                                <tr>
                                    <td width="200px">NIK</td>
                                    <td width="10px" align="left">:</td>
                                    <td width="290px"align="left"><?=$transaksi['nik'];?></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['nama'];?></td>
                                </tr>
                                <tr>
                                    <td>No Kartu Keluarga</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['no_kk'];?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['jk'];?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['pekerjaan'];?></td>
                                </tr>
                                <tr>
                                    <?php 
                                    $nama_kel = strtolower($transaksi['nama_kel']);
                                    $nama_kel_baru = ucwords($nama_kel);
                                    $nama_kec = strtolower($transaksi['nama_kec']);
                                    $nama_kec_baru = ucwords($nama_kec);
                                    $nama_kab = strtolower($transaksi['nama_kab']);
                                    $nama_kab_baru = ucwords($nama_kab);
                                    $nama_prov = strtolower($transaksi['nama_prov']);
                                    $nama_prov_baru = ucwords($nama_prov);
                                    ?>
                                    <td>Alamat Asal</td>
                                    <td align="left">:</td>
                                    <td align="left">Kelurahan <?=$nama_kel_baru;?> Kecamatan <?=$nama_kec_baru;?> <?=$nama_kab_baru;?> Provinsi <?=$nama_prov_baru;?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Sekarang</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['alamat_sekarang'];?></td>
                                </tr>
                            </table>
                            
                            <br>
                            
                            <p align="justify">
                            
                            Demikian surat keterangan ini dibuat, agar dapat digunakan sebagaimana mestinya. 
                            </p>
                            
                            <br><br><?php $tgl = date('d-m-Y', strtotime($transaksi['tanggal_acc']));?>
                            <table align="right">
                                <tr>
                                    <td>
                                    Tanjung Setia, <?=$tgl;?><br>
                                    Kepala Desa Tanjung Setia<br><br><br><br><br>
                                    <?=$kades['nama'];?> <br>
                                    <img src="<?=base_url();?>assets/barcode/<?=$transaksi['qr_datang'];?>" width="150px" height="150px">
                                    <br> Scan Barcode!
                                    </td>
                                </tr>

                            </table>
                            
                        <table class="font-15" width="100%">
                        <tr>
                            
                        </tr>
                        
                        <tr>
                            
                            
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            
                            
                            </table>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
        
        
    </body>
</html>