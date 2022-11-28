<!DOCTYPE html>
<html lang="en">

<body>
    
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?=$user['nama'];?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Staff Desa</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?=base_url();?>assets/foto/<?=$user['foto'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?=$user['nama'];?>!</h6>
                                    </li>
                                    
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?=base_url();?>user/user/profil">
                                     Profil</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url();?>login/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <hr>
            </header>
            <div id="main-content">
            

<div id="app">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pengajuan Surat Kelahiran</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>user/user">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Surat Pindah Datang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                
                   
                
            <div class="modal fade text-left" id="primary" tabindex="4"
														role="dialog" aria-labelledby="myModalLabel160"
														aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
															role="document">
															<div class="modal-content">
																<div class="modal-header bg-primary">
																	<h5 class="modal-title white" id="myModalLabel160">
																		Edit Data Surat Pindah Datang
																	</h5>
																	<button type="button" class="close"
																		data-bs-dismiss="modal" aria-label="Close">
																		<i data-feather="x"></i>
																	</button>
																</div>
																<div class="modal-body">
																	<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
																</div>
																<div class="modal-footer">
																	<button type="button"
																		class="btn btn-light-secondary"
																		data-bs-dismiss="modal">
																		<i class="bx bx-x d-block d-sm-none"></i>
																		<span class="d-none d-sm-block">Close</span>
																	</button>
																	
																</div>
															</div>
														</div>
													</div>
            </div>
            <div class="card-body">
                <form class="form" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Lengkap Pemohon</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="nama" value=<?=$surat_kematian['nama'];?> >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nomor Kartu Keluarga</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="No KK" name="no_kk" value=<?=$surat_kematian['no_kk'];?> >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nomor Induk Kependudukan Pemohon</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="NIK" name="nik" value=<?=$surat_kematian['nik'];?> >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Kelamin</label>
                                            <select name="jk" class="form-control" required >

                                                <?php if($surat_kematian['jk']=='Laki-laki'){?>
                                                    <option value="Laki-laki" selected>Laki-Laki</option>
                                                    <option value="Perempuan" >Perempuan</option>
                                                    <?php
                                                }else{ ?>
                                                    <option value="Laki-laki" >Laki-Laki</option>
                                                    <option value="Perempuan" selected>Perempuan</option>
                                                <?php

                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Alamat Asal</label><br>
                                            <label for="provinsi">Provinsi</label>
                                                <select id="prov" name="provinsi" class="form-control" >
                                                   <?php
                                                   foreach ($prov as $p ) {?>
                                                   <?php if ($p['id_prov']==$surat_kematian['id_prov_asal']) {?>
                                                       <option value="<?=$p['id_prov'];?>" selected><?=$p['nama_prov'];?></option>
                                                   <?php } else {?>
                                                       <option value="<?=$p['id_prov'];?>"><?=$p['nama_prov'];?></option>
                                                   <?php }?>

                                                   <?php } ?>
                                                </select> <br>
                                            <label for="kabupaten">Kabupaten</label>
                                                <select id="kabu" name="kabupaten" class="form-control " >
                                                    <?php
                                                   foreach ($kab as $p ) {?>
                                                   <?php if ($p['id_kab']==$surat_kematian['id_kab_asal']) {?>
                                                       <option value="<?=$p['id_kab'];?>" selected><?=$p['nama_kab'];?></option>
                                                   <?php } else {?>
                                                       <option value="<?=$p['id_kab'];?>"><?=$p['nama_kab'];?></option>
                                                   <?php }?>

                                                   <?php } ?>
                                                     
                                                    
                                                </select> <br>
                                            <label for="kecamatan">Kecamatan</label>
                                                <select id="kecam" name="kecamatan" class="form-control " >
                                                  <?php
                                                   foreach ($kec as $p ) {?>
                                                   <?php if ($p['id_kec']==$surat_kematian['id_kec_asal']) {?>
                                                       <option value="<?=$p['id_kec'];?>" selected><?=$p['nama_kec'];?></option>
                                                   <?php } else {?>
                                                       <option value="<?=$p['id_kec'];?>"><?=$p['nama_kec'];?></option>
                                                   <?php }?>

                                                   <?php } ?>
                                                </select> <br>
                                            <label for="kelurahan">Kelurahan</label>
                                                <select id="kel" name="kelurahan" class="form-control " >
                                                 <?php
                                                   foreach ($kel as $p ) {?>
                                                   <?php if ($p['id_kel']==$surat_kematian['id_kel_asal']) {?>
                                                       <option value="<?=$p['id_kel'];?>" selected><?=$p['nama_kel'];?></option>
                                                   <?php } else {?>
                                                       <option value="<?=$p['id_kel'];?>"><?=$p['nama_kel'];?></option>
                                                   <?php }?>

                                                   <?php } ?>
                                                </select> <br>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Alamat Sekarang</label><br>
                                            <label for="provinsi">Provinsi</label>
                                                <select id="" name="prov_now" class="form-control" readonly>
                                                    <option value="Lampung" selected>Lampung</option>
                                                </select> <br>
                                            <label for="kabupaten">Kabupaten</label>
                                                <select id="" name="kab_now" class="form-control" readonly>
                                                    <option value="Pesisir Barat" selected>Pesisir Barat</option>
                                                </select> <br>
                                            <label for="kecamatan">Kecamatan</label>
                                                <select id="" name="kec_now" class="form-control" readonly>
                                                    <option value="Pesisir Selatan" selected>Pesisir Selatan</option>
                                                </select> <br>
                                            <label for="kelurahan">Kelurahan</label>
                                                <select id="" name="kel_now" class="form-control" readonly>
                                                    <option value="Tanjung Setia" selected>Tanjung Setia</option>
                                                </select> <br>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" class="form-control" placeholfer="Pekerjaan" value="<?=$surat_kematian['pekerjaan'];?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto Surat Pindah Asal</label><br>
                                            <img src="<?=base_url();?>assets/foto/<?=$surat_kematian['foto_sp'];?>" width="500px" height="400px"><br>
                                            <input type="file" name="foto_sp" id="" class="form-control">
                                            <input type="hidden" name="foto_sp_awal" value="<?=$surat_kematian['foto_sp'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto KTP</label><br>
                                            <img src="<?=base_url();?>assets/foto/<?=$surat_kematian['foto_ktp'];?>" width="500px" height="400px"><br>
                                            <input type="file" name="foto_ktp" id="" class="form-control">
                                            <input type="hidden" name="foto_ktp_awal" value="<?=$surat_kematian['foto_ktp'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto Kartu Keluarga</label><br>
                                            <img src="<?=base_url();?>assets/foto/<?=$surat_kematian['foto_kk'];?>" width="500px" height="400px"><br>
                                            <input type="file" name="foto_kk" id="" class="form-control">
                                            <input type="hidden" name="foto_kk_awal" value="<?=$surat_kematian['foto_kk'];?>">
                                        </div>
                                    </div>
                                    
<br>
                                    <input type="hidden" name="id_datang" value="<?=$surat_kematian['id_datang'];?>">
                                    <div class="col-12 d-flex justify-content-start"  align="left">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                        <a href="<?=base_url();?>user/surat_datang" class="btn btn-danger me-1 mb-1">Kembali</a>
                                    </div>
                                </div>
                            </form>
            </div>
        </div>

    </section>
</div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; </p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Devi Metria Dora</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

     <script>
            
            
        $("#prov").change(function(){

            // variabel dari nilai combo box kendaraan
          var nama_prov = $("#prov").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
              url : "<?php echo base_url();?>admin/combobox/get_kab",
                method : "POST",
                data : {nama_prov:nama_prov},
                async : false,
                dataType : 'json',
                success: function(data){
                   var html = '';
           var i;

           for(i=0; i<data.length; i++){
             html += '<option value='+data[i].id_kab+'>'+data[i].nama_kab+'</option>';
           }
           $('#kabu').html(html);

                }
            });
        });
        $("#kabu").change(function(){

            // variabel dari nilai combo box kendaraan
           var nama_kab = $("#kabu").val();

             //Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url : "<?php echo base_url();?>admin/combobox/get_kec",
                method : "POST",
                data : {nama_kab:nama_kab},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kec+'>'+data[i].nama_kec+'</option>';
                    }
                   $('#kecam').html(html);

                }
            });
        });
        $("#kecam").change(function(){

            // variabel dari nilai combo box kendaraan
            var nama_kec = $("#kecam").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
           $.ajax({
              url : "<?php echo base_url();?>admin/combobox/get_kel",
            method : "POST",
               data : {nama_kec:nama_kec},
               async : false,
              dataType : 'json',
              success: function(data){
                    var html = '';
                  var i;

                for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kel+'>'+data[i].nama_kel+'</option>';
                   }
                    $('#kel').html(html);

              }
          });
       });

        
    </script>   
    
    
</body>

</html>
