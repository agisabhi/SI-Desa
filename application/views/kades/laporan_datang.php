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
                                            <p class="mb-0 text-sm text-gray-600">Kepala Desa</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?=base_url();?>assets/mazer-main/dist/assets/images/faces/1.jpg">
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
                <h3>Laporan Surat Keterangan Pindah Datang</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>user/user">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Surat Keterangan Pindah Datang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div><?= $this->session->flashdata('message'); ?></div>
                            <div>
                <form action="" method="post">
                    <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tanggal Awal</label>
                                            <input type="date" id="first-name-column" class="form-control"
                                                placeholder="" name="awal">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tanggal Akhir</label>
                                            <input type="date" id="first-name-column" class="form-control"
                                                placeholder="" name="akhir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            
                                            <input type="submit" id="first-name-column" class="btn btn-success"
                                                placeholder="" name="submit" value="Lihat">
                                                
                                        </div>
                                    </div>

                    </div>
                </form>
                
            <div class="modal fade text-left" id="primary" tabindex="4"
														role="dialog" aria-labelledby="myModalLabel160"
														aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
															role="document">
															<div class="modal-content">
																<div class="modal-header bg-primary">
																	<h5 class="modal-title white" id="myModalLabel160">
																		Tambah Pengajuan Surat Kelahiran
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
                        <h4 class="card-title">Data Kelahiran</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?=base_url();?>admin/surat_lahir/tambah" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Lengkap Anak</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="nama">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Tempat Lahir</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Tempat Lahir" name="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Tanggal Lahir</label>
                                            <input type="date" id="city-column" class="form-control" placeholder="Tanggal Lahir"
                                                name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Alamat Lengkap</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="alamat" placeholder="Alamat">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Nomor Induk Kependudukan Ayah</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="nik_ayah" placeholder="NIK Ayah">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Nama Ayah</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="nama_ayah" placeholder="Nama Ayah">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Nomor Induk Kependudukan Ibu</label>
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="nik_ibu" placeholder="NIK Ibu">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Nama Ibu</label>
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="nama_ibu" placeholder="Nama Ibu">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Anak-Ke</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="anak_ke" placeholder="Anak-ke">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto Kartu Keluarga</label>
                                            <input type="file" id="email-id-column" class="form-control"
                                                name="foto_kk">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Surat </th>
                            <th>Nama </th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($laporan as $p) : ?>
                            
                       <tr>
                           
                           <td><?=$p['tanggal_acc'];?></td>
                           <td><?=$p['no_surat_datang'];?></td>
                           <td><?=$p['nama'];?></td>
                           <td><?=$p['no_kk'];?></td>
                           <td><?=$p['nik'];?></td>
                           <td><?=$p['jk'];?></td>
                           <td><?php if($p['status']=="menunggu"){
                               ?><span class="badge bg-primary">Menungggu<br>Verifikasi</span><?php
                           }else if($p['status']=="acc_staff"){
                                   ?><span class="badge bg-success">ACC<br>Staff</span><?php
                            }else if($p['status']=="acc_kades"){
                                   ?><span class="badge bg-success">ACC<br>Kades</span><?php
                            }else if($p['status']=="siap_ambil"){
                                   ?><span class="badge bg-success">Sudah Bisa Diambil</span><?php
                            }else if($p['status']=="selesai"){
                                   ?><span class="badge bg-success">SELESAI</span><?php
                            }else{
                                   ?><span class="badge bg-danger">Ditolak</span><?php
                           };?></td>
                                 
                       </tr> 
                       
                       <?php endforeach;?>
                    </tbody>
                </table>
                
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
    
</body>

</html>
