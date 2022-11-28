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
            class="sidebar-item active ">
            <a href="<?=base_url();?>user/user" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
                </a>
            </li>
            
            <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                    <span>Pengajuan Surat</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>user/surat_lahir">Surat Kelahiran</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>user/surat_kematian">Surat Kematian</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?=base_url();?>user/surat_datang">Surat Pindah Datang</a>
                    </li>
                    
                </ul>
            </li>
            
            
        
        
        
        </ul>
    </div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>