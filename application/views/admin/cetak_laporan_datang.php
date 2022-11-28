<html>
    <body>
           <style>
               table {
            border-collapse: collapse;
        }
           </style>
    
    <div class="container-fluid">
        
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        
                       <h4 align="center">
                            <ins>LAPORAN SURAT KETERANGAN PINDAH DATANG</ins><br>
                            <?php 
                            if ($awal!='') { 
                                $awalin = date('d-m-Y', strtotime($awal));
                            $akhirin = date('d-m-Y', strtotime($akhir));
                            ?>
                            
                            Periode Tanggal <?=$awalin;?> Sampai Tanggal <?=$akhirin;?>
                            <?php
                            }else{
                                ?>
                                
                                <?php
                            }
                            ?>
                        </h4>
                        
                        <div class="font-15">
                            
                            <table width="500px" class="table-bordered" border="1">
                                
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Surat</th>
                                    <th>Nama</th>
                                    <th>Nomor Kartu Keluarga</th>
                                    <th>NIK</th>
                                    <th>Keterangan</th>
                                </tr>
                                <?php
                                $no = 1;
                                 foreach ($transaksi as $t ) { ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?php $tanggal_acc = date('d-m-Y', strtotime($t['tanggal_acc'])); echo $tanggal_acc;?></td>
                                        <td><?=$t['no_surat_datang'];?></td>
                                        <td><?=$t['nama'];?></td>
                                        <td><?=$t['no_kk'];?></td>
                                        <td><?=$t['nik'];?></td>
                                        <td>Pengajuan Surat Pindah Datang</td>
                                    </tr>
                                    
                                <?php } ?>
                                
                            </table>
                            <br>
                            
                            <br><br><?php $tgl = date('d-m-Y');?>
                            <table align="right">
                                <tr>
                                    <td>
                                    Tanjung Setia, <?=$tgl;?><br>
                                    Kepala Desa Tanjung Setia<br><br><br><br><br>
                                    <?=$kades['nama'];?>
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