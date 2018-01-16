<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img style="height: 55px" src="<?=base_url()?>uploads/users/<?=$this->session->admin_sess['image']?>" alt="<?=$this->session->admin_sess['username']?>" class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h4"><?= $this->session->admin_sess['username'];?></h1>
                <p><?= $this->session->admin_sess['authority'];?></p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li> <a href="<?=base_url()."admin/uyeler"?>"><i class="icon-user"></i>Kullanıcılar</a></li>
            <li> <a href="<?=base_url()."admin/kategoriler"?>"><i class="fa fa-book"></i>Kategoriler</a></li>
            <li> <a href="<?=base_url()."admin/urunler"?>"><i class="fa fa-bicycle"></i>Ürünler</a></li>
            <li> <a href="<?=base_url()."admin/urunler/kampanya_urunler"?>"><i class="fa fa-bomb"></i>Kampanyalar</a></li>
            <li> <a href="<?=base_url()."admin/urunler/slider"?>"><i class="fa fa-window-restore"></i>Slider</a></li>
<!--            <li> <a href="--><?//=base_url()."admin/siparisler"?><!--" ><i class="icon-bill"></i>Siparişler</a></li>-->
            <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-bill"></i>Siparişler</a>
                <ul id="dashvariants" class="collapse list-unstyled">
                    <li><a href="<?=base_url()."admin/siparisler"?>">Tüm Siparişler</a></li>
                    <li><a href="<?=base_url()."admin/siparisler/durum/yeni"?>">Yeni</a></li>
                    <li><a href="<?=base_url()."admin/siparisler/durum/onay"?>">Onaylanan</a></li>
                    <li><a href="<?=base_url()."admin/siparisler/durum/kargo"?>">Kargo</a></li>
                    <li><a href="<?=base_url()."admin/siparisler/durum/tamam"?>">Tamamlanmış</a></li>
                </ul>
            </li>
            <!--Okunmamış mesaj sayısı gösterilebilir-->
            <li> <a href="<?=base_url()."admin/mesajlar"?>"><i class="fa fa-envelope"></i>Mesajlar</a></li>
            <li> <a href="<?=base_url()."admin/urunler/yorumlar"?>"><i class="fa fa-pencil"></i>Yorumlar</a></li>
            <li> <a href="<?=base_url()."admin/ayarlar/duyuru"?>"><i class="fa fa-microphone"></i> Duyuru</a></li>
            <li> <a href="<?=base_url()."admin/ayarlar"?>"><i class="fa fa-gears"></i>Ayarlar</a></li>
        </ul>
    </nav>