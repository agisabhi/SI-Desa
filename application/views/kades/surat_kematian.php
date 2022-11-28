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
                <h3>Data Pengajuan Surat Kematian</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>user/user">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Surat Kematian</li>
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
                
                    
                
            <div class="modal fade text-left" id="primary" tabindex="4"
														role="dialog" aria-labelledby="myModalLabel160"
														aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
															role="document">
															<div class="modal-content">
																<div class="modal-header bg-primary">
																	<h5 class="modal-title white" id="myModalLabel160">
																		Tambah Pengajuan Surat Kematian
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
                        <h4 class="card-title">Data Kematian</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
                            <form class="form" action="<?=base_url();?>admin/surat_kematian/tambah" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Lengkap Almarhum(ah)</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="nama">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Ayah Almarhum(ah)</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="bin">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nomor Induk Kependudukan Almarhum(ah)</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="NIK" name="nik">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Alamat</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="alamat" name="alamat">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Kelamin</label>
                                            <select name="jk" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Tanggal Lahir</label>
                                            <input type="date" id="last-name-column" class="form-control"
                                                placeholder="Tanggal Lahir" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Warga Negara</label>
                                            <select name="wn" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Agama</label>
                                            <select name="agama" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Tanggal Kematian</label>
                                            <input type="date" id="country-floating" class="form-control"
                                                name="tanggal_kematian" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Jam</label>
                                            <input type="time" id="company-column" class="form-control"
                                                name="jam" placeholder="Jam">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Tempat Meninggal</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="tempat" placeholder="Tempat">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Penyebab Meninggal</label>
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="sebab" placeholder="Penyebab Meninggal">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto Kartu Keluarga</label>
                                            <input type="file" id="email-id-column" class="form-control"
                                                name="foto_kk" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">(optional) Foto Surat Keterangan Rumah Sakit</label>
                                            <input type="file" id="email-id-column" class="form-control"
                                                name="foto_sk">
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
                            <th>Nama </th>
                            <th>Tanggal Kematian</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Ayah</th>
                            <th>Agama</th>
                            
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengajuan as $p) : ?>
                            
                       <tr>
                           
                           <td><?=$p['nama'];?></td>
                           <td><?=$p['tanggal_kematian'];?></td>
                           <td><?=$p['jk'];?></td>
                           <td><?=$p['bin'];?></td>
                           <td><?=$p['agama'];?></td>
                           <td><?php if($p['status']=="menunggu"){
                               ?><span class="badge bg-primary">Menungggu<br>Verifikasi</span><?php
                           }else if($p['status']=="acc_staff"){
                                   ?><span class="badge bg-success">ACC<br>Staff</span><?php
                            }else if($p['status']=="acc_kades"){
                                   ?><span class="badge bg-success">ACC<br>Kades</span><?php
                            }else if($p['status']=="siap_ambil"){
                                   ?><span class="badge bg-success">Siap<br>Diambil</span><?php
                            }else if($p['status']=="selesai"){
                                   ?><span class="badge bg-success">SELESAI</span><?php
                            }else{
                                   ?><span class="badge bg-danger">Ditolak</span><?php
                           };?></td>
                           <td>
                               <?php if ($p['status']=="acc_staff") { ?>
                                   
                                <a href="<?=base_url();?>kades/surat_kematian/detail_kematian/<?=$p['id_kematian'];?>" class="btn btn-primary">Detail</a>
                               <?php }
                               ?>
                            </form>
                               
                            </td>
                              
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
