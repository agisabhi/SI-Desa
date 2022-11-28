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
                            <ins>SURAT KETERANGAN KEMATIAN</ins><br>
                            NO: <?=$transaksi['no_surat_kematian'];?>
                        </h4>
                        
                        <div class="font-15">
                            <p align="justify" size="5">
                                Yang bertanda tangan dibawah ini Kepada Desa Tanjung Setia Kecamatan Pesisir Selatan Kabupaten Pesisir Barat. 
                                menerangkan dengan sebenarnya bahwa: <br>
                                
                            </p>
                            <table width="500px">
                                <tr>
                                    <td width="200px">Nama</td>
                                    <td width="10px" align="left">:</td>
                                    <td width="290px"align="left"><?=$transaksi['nama'];?></td>
                                </tr>
                                <tr>
                                    <td>Bin/Binti</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['bin'];?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['nik'];?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['jk'];?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['tanggal_lahir'];?></td>
                                </tr>
                                <tr>
                                    <td>Warganegara/Agama</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['wn'];?> / <?=$transaksi['agama'];?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['alamat'];?></td>
                                </tr>
                            </table>
                            <p align="justify" size="5">
                                Telah meninggal dunia pada: <br>
                                
                            </p>
                            <table width="500px">
                                <tr>
                                    <td>Tanggal</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['tanggal_kematian'];?></td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['jam'];?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Meninggal</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['tempat'];?></td>
                                </tr>
                                <tr>
                                    <td>Sebab Meninggal</td>
                                    <td align="left">:</td>
                                    <td align="left"><?=$transaksi['sebab'];?></td>
                                </tr>
                            </table>

                            <br>
                            
                            <p align="justify">
                            Surat keterangan ini dibuat untuk keamanan. <br>
                            Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih. 
                            </p>
                            
                            <br><br><?php $tgl = date('d-m-Y', strtotime($transaksi['tanggal_acc']));?>
                            <table align="right">
                                <tr>
                                    <td>
                                    Tanjung Setia, <?=$tgl;?><br>
                                    Kepala Desa Tanjung Setia<br><br><br><br><br>
                                    <?=$kades['nama'];?> <br>
                                    <img src="<?=base_url();?>assets/barcode/<?=$transaksi['qr_kematian'];?>" width="150px" height="150px">
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