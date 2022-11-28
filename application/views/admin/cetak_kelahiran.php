<html>
    <body>
           
    
    <div class="container-fluid">
        
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        
                       <h4 align="center">
                            <ins>SURAT KETERANGAN KELAHIRAN</ins><br>
                            NO: <?=$transaksi['no_surat_lahir'];?>
                        </h4>
                        
                        <div class="font-15">
                            <p align="justify" size="5">
                                Yang bertanda tangan dibawah ini Kepada Desa Tanjung Setia Kecamatan Pesisir Selatan Kabupaten Pesisir Barat. <br><br>
                                Dengan ini menyatakan bahwa : <br>
                                
                            </p>
                            <table width="500px">
                                <tr>
                                    <td width="200px">a. Nama</td>
                                    <td width="10px" align="left">:</td>
                                    <td width="290px"align="left"><?=$transaksi['nama'];?></td>
                                </tr>
                                <tr>
                                    <td>b. Tempat, Tanggal Lahir</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['tempat_lahir'];?>, <?=$transaksi['tanggal_lahir'];?></td>
                                </tr>
                                <tr>
                                    <td>c. Jenis Kelamin</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['jenis_kelamin'];?></td>
                                </tr>
                                <tr>
                                    <td>d. Alamat</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['alamat'];?></td>
                                </tr>
                                
                            
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td colspan="3" align="left">Adalah Anak Dari :</td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr></tr>

                                <tr>
                                    <td>Nama Ayah Kandung</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['nama_ayah'];?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu Kandung</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['nama_ibu'];?></td>
                                </tr>
                                <tr>
                                    <td>    Anak Ke</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['anak_ke'];?></td>
                                </tr>
                            </table>
                            <br>
                            Demikian surat keterangan kelahiran ini dibuat untuk dapat digunakan sebagaimana mestinya.
                            <br><br><?php $tgl = date('d-m-Y', strtotime($transaksi['tanggal_acc']));?>
                            <table align="right">
                                <tr>
                                    <td>
                                    Tanjung Setia, <?=$tgl;?><br>
                                    Kepala Desa Tanjung Setia<br><br><br><br><br>
                                    <?=$kades['nama'];?> <br>
                                    <img src="<?=base_url();?>assets/barcode/<?=$transaksi['qr_lahir'];?>" width="150px" height="150px">
                                    <br> Scan Barcode disini!
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