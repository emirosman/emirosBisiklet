<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?=base_url()?>/uploads/user_default.png" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h4"><?= $this->session->admin_sess['username'];?></h1>
                <p>Web Designer</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li> <a href="index.html"><i class="icon-home"></i>Home</a></li>
            <li> <a href="<?=base_url()."admin/uyeler"?>"><i class="icon-user"></i>Kullanıcılar</a></li>
            <li> <a href="<?=base_url()."admin/kategoriler"?>"><i class="fa fa-book"></i>Kategoriler</a></li>
            <li> <a href="<?=base_url()."admin/urunler"?>"><i class="fa fa-bicycle"></i>Ürünler</a></li>
            <li> <a href="<?=base_url()."admin/ayarlar"?>"><i class="fa fa-gears"></i>Ayarlar</a></li>
            <li> <a href="index.html"><i class="icon-bill"></i>Siparişler</a></li>
        </ul>
    </nav>