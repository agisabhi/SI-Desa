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
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        
                                    </ul>
                                </li>
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
                                        <h6 class="dropdown-header">Hello, John!</h6>
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
            
<div class="row"><h1>Tugas Hari ini</h1></div><br>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            
            <div class="row">
                
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <a href="<?=base_url();?>kades/surat_lahir">
                                    <h6 class="text-muted font-semibold">Surat Kelahiran</h6>
                                    <h6 class="font-extrabold mb-0"><?=$skk;?> Pengajuan</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$lahir_baru_now;?> Pengajuan Baru Hari ini</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skk_kemarin;?> Pengajuan Baru Kemarin</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skk_perlu;?> Pengajuan Perlu diproses !</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skk_tolak;?> Pengajuan Ditolak</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skk_proses;?> Pengajuan diproses</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skk_selesai;?> Pengajuan Selesai</h6><br>
                                    
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?=base_url();?>kades/surat_kematian">
                                    <h6 class="text-muted font-semibold">Surat Kematian</h6>
                                    <h6 class="font-extrabold mb-0"><?=$skem;?> Pengajuan</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skem_baru_now;?> Pengajuan Baru Hari Ini</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skem_baru_now;?> Pengajuan Baru Kemarin</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skem_perlu;?> Pengajuan Perlu diproses !</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skem_tolak;?> Pengajuan ditolak !</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skem_proses;?> Pengajuan Baru diproses</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skem_selesai;?> Pengajuan Selesai</h6><br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?=base_url();?>kades/surat_datang">
                                    <h6 class="text-muted font-semibold">Surat Pindah Datang</h6>
                                    <h6 class="font-extrabold mb-0"><?=$skpd;?> Pengajuan</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skpd_baru_now;?> Pengajuan Baru Hari Ini</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skpd_baru_now;?> Pengajuan Baru Kemarin</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skpd_perlu;?> Pengajuan Perlu diproses !</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skpd_tolak;?> Pengajuan ditolak !</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skpd_proses;?> Pengajuan Baru diproses</h6><br>
                                    <h6 class="font-extrabold mb-0"><?=$skpd_selesai;?> Pengajuan Selesai</h6><br>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </section>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><hr>
            <div class="container">
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
