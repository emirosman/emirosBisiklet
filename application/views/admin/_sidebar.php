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
            <li class="active"> <a href="index.html"><i class="icon-home"></i>Home</a></li>
            <li> <a href="<?=base_url()."admin/uyeler"?>"><i class="icon-user"></i>Kullanıcılar</a></li>
            <li> <a href="<?=base_url()."admin/kategoriler"?>"><i class="fa fa-book"></i>Kategoriler</a></li>
            <li> <a href="<?=base_url()."admin/urunler"?>"><i class="fa fa-bicycle"></i>Ürünler</a></li>
            <li> <a href="index.html"><i class="icon-bill"></i>Siparişler</a></li>
            <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Dropdown </a>
                <ul id="dashvariants" class="collapse list-unstyled">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                </ul>
            </li>
            <li> <a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
            <li> <a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
            <li> <a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
            <li> <a href="login.html"> <i class="icon-interface-windows"></i>Login Page</a></li>
        </ul><span class="heading">Extras</span>
        <ul class="list-unstyled">
            <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
        </ul>
    </nav>