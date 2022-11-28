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
                        <li class="breadcrumb-item active" aria-current="page">Data Surat Lahir</li>
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
																		Edit Pengajuan Surat Kematian
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
                <form class="form" action="<?=base_url();?>admin/ubah_kades" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Lengkap Lengkap Kepala Desa</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="nama" value="<?=$surat_kematian['nama'];?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Email</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="bin" value="<?=$surat_kematian['email'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">No Handphone</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="bin" value="<?=$surat_kematian['no_hp'];?>" >
                                        </div>
                                    </div>
                                    

                                    <input type="hidden" name="id_user" value="<?=$surat_kematian['id_user'];?>">
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="<?=base_url();?>admin/surat_lahir/data_kades" class="btn btn-danger me-1 mb-1">Kembali</a>  
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        
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

        
    
    
</body>

</html>
