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
                                            <p class="mb-0 text-sm text-gray-600">Masyarakat</p>
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
                                    <li><a class="dropdown-item" href="<?=base_url();?>user/user/profil"> Profil</a></li>
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
            
<div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="<?=base_url();?>assets/foto/<?=$user['foto'];?>" alt="Card image cap"
                            style="height: 20rem" />
                        <div class="card-body">
                            <h4 class="card-title">Profil User</h4>
                            <div class="card-content">
                        <div class="card-body">
                            <div><?= $this->session->flashdata('message'); ?></div>
                            <form class="form form-horizontal" action="<?=base_url();?>user/user/editprofil" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap"
                                                        name="nama" value="<?=$user['nama'];?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>NIK</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="NIK"
                                                        name="nik" value="<?=$user['nik'];?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor KK</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="Nomor Kartu Keluarga"
                                                        name="no_kk" value="<?=$user['no_kk'];?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        name="email" value="<?=$user['email'];?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Handphone</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nomor hp" value="<?=$user['no_hp'];?>" name="no_hp">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?=$user['alamat'];?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <select name="jk" class="form-control" required>
                                                        <?php if ($user['jk']=="laki-laki") {?>
                                                            <option value="laki-laki" selected>Laki-Laki</option>
                                                            <option value="perempuan" >Perempuan</option>
                                                            
                                                        <?php }else if ($user['jk']=="perempuan"){?>
                                                            <option value="laki-laki" >Laki-Laki</option>
                                                            <option value="perempuan" selected>Perempuan</option>
                                                            
                                                        <?php }else{ ?>
                                                                <option value="" selected>Pilih</option>
                                                                <option value="laki-laki" >Laki-Laki</option>
                                                            <option value="perempuan" >Perempuan</option>

                                                        <?php } ?>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Foto Profil</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" class="image-preview-filepond" name="foto">
                                            <input type="hidden" name="file_foto" value="<?=$user['foto'];?>">
                                            <input type="hidden" value="<?=$user['id_user'];?>" name="id_user">

                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                            <a href="<?=base_url();?>user/user/index" type="submit" class="btn btn-danger me-1 mb-1">Kembali</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Devi Metria Dora</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        
    
    
</body>

</html>
