<div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <br>
            <div class="sidebar">
        <div class="d-flex justify-content-between">
            <div class="">
                <a href="#"><img src="<?=base_url();?>assets/mazer-main/dist/assets/images/logo/logo-sidebar.png" width="280px" height="100px" ></a>
            </div>
            
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
            class="sidebar-item  ">
            <a href="<?=base_url();?>admin/admin" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
                </a>
            </li>
            
            <li
            class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                    <span>Pengajuan Surat</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item " >
                        <a href="<?=base_url();?>admin/surat_lahir">Surat Kelahiran</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>admin/surat_kematian">Surat Kematian</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>admin/surat_datang">Surat Pindah Datang</a>
                    </li>
                    
                </ul>
            </li>
            
             <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Data Master</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="<?=base_url();?>admin/surat_lahir/data_kades">Data Kepala Desa</a>
                    </li>
                    
                </ul>
            </li>
            
            <li
            class="sidebar-item active has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Laporan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="<?=base_url();?>admin/surat_lahir/laporan">Laporan Surat Kelahiran</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>admin/surat_kematian/laporan">Laporan Surat Kematian</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>admin/surat_datang/laporan">Laporan Surat Pindah Datang</a>
                    </li>
                </ul>
            </li>
        
        
        
        </ul>
    </div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>