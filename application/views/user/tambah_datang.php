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
                                        <li><a class="dropdown-item"><?=$tes['id_prov'];?></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?=$user['nama'];?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Staff Desa </p>
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
                                    <li><a class="dropdown-item" href="<?=base_url();?>user/user/profil"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Profil</a></li>
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
                <h3>Data Pengajuan Surat Keterangan Pindah Datang</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>user/user">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Surat Keterangan Pindah Datang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div><?= $this->session->flashdata('message'); ?></div>
                            <div>
                
                
            <div tabindex="4"
														role="dialog" aria-labelledby="myModalLabel160"
														aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
															role="document">
															<div class="modal-content">
																<div class="modal-header bg-primary">
																	<h5 class="modal-title white" id="myModalLabel160">
																		Tambah Pengajuan Surat Pindah Datang
																	</h5>
																	<button type="button" class="close"
																		data-bs-dismiss="modal" aria-label="Close">
																		<i data-feather="x"></i>
																	</button>
																</div>
																<div class="modal-body">
																	<section id="multiple-column-form">
                                                                <!-- Load file CSS Bootstrap melalui CDN -->
    
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pindah Datang</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
                            <form class="form" action="<?=base_url();?>user/surat_datang/tambah" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Lengkap Pemohon</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="nama">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nomor Kartu Keluarga</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="No KK" name="no_kk" value="<?=$user['no_kk'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nomor Induk Kependudukan Pemohon</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="NIK" name="nik" value="<?=$user['nik'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Jenis Kelamin</label>
                                            <select name="jk" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Alamat Asal</label><br>
                                            <label for="provinsi">Provinsi</label>
                                                <select id="prov" name="provinsi" class="form-control">
                                                   
                                                </select> <br>
                                            <label for="kabupaten">Kabupaten</label>
                                                <select id="kabu" name="kabupaten" class="form-control ">
                                                    
                                                     
                                                    
                                                </select> <br>
                                            <label for="kecamatan">Kecamatan</label>
                                                <select id="kecam" name="kecamatan" class="form-control ">
                                                    
                                                </select> <br>
                                            <label for="kelurahan">Kelurahan</label>
                                                <select id="kel" name="kelurahan" class="form-control ">
                                                    
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
                                            <input type="text" name="pekerjaan" class="form-control" placeholfer="Pekerjaan">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Surat Pindah Asal</label>
                                            <input type="file" id="email-id-column" class="form-control"
                                                name="foto_sp" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">KTP</label>
                                            <input type="file" id="email-id-column" class="form-control"
                                                name="foto_ktp" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">KK</label>
                                            <input type="file" id="email-id-column" class="form-control"
                                                name="foto_kk" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="<?=base_url();?>user/surat_datang" class="btn btn-danger me-1 mb-1">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
																</div>
																<div class="modal-footer">
																	
																	
																</div>
															</div>
														</div>
													</div>
            </div>
            <div class="card-body">
                
                
            </div>
        </div>
        <script>
            
            $.ajax({
              url : "<?php echo base_url();?>admin/combobox/get_prov",
            method : "POST",

           async : false,
           dataType : 'json',
            success: function(data){
            var html = '';
           var i;

           for(i=0; i<data.length; i++){
             html += '<option value='+data[i].id_prov+'>'+data[i].nama_prov+'</option>';
           }
           $('#prov').html(html);

           }
           });
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

    </section>
</div>






            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; </p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Devi Metria Dora</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
</body>

</html>
