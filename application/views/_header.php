<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$veri[0]->meta_description?>">
    <meta name="keywords" content="<?=$veri[0]->meta_keywords?>">
    <meta name="author" content="">
    <title><?=$sayfa?> <?=$veri[0]->name?></title>
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/main.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/responsive.css" rel="stylesheet">
    <script src="<?= base_url()?>/assets/js/jquery.js"></script>
    <script src="<?= base_url()?>/assets/owlcarousel/owl.carousel.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= base_url()?>/assets/js/html5shiv.js"></script>
    <script src="<?= base_url()?>/assets/js/respond.min.js"></script>

    <![endif]-->

    <link rel="shortcut icon" href="<?=base_url()?>assets/admin/img/bisiklet_logo.png">
    <link rel="stylesheet" href="<?=base_url()?>assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url()?>assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url()?>assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url()?>assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url()?>assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?=base_url()?>"><img src="<?= base_url()?>/assets/images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if($this->session->user_sess){?>
                                <li><a class="<?=($menu=="sepet")?"active":""?>" href="<?=base_url()."uye/sepetim"?>"><i class="fa fa-shopping-cart"></i> Sepetim</a></li>
                                <li><a class="<?=($menu=="profil")?"active":""?>" href="<?=base_url()."uye/profil"?>"><i class="fa fa-user"></i> <?= $this->session->user_sess["username"]?></a></li>
                                <li><a href="<?=base_url()."home/logout"?>"><i class="fa fa-sign-out"></i>çıkış yap </a></li>
                            <?php } else{?>
                                <li>  <a class="<?=($menu=="login")?"active":""?>" href="<?=base_url()."home/login"?>"><i class="fa fa-lock"></i> Giriş Yap</button></a></li>
                                <li>  <a class="<?=($menu=="login")?"active":""?>" href="<?=base_url()."home/login"?>"><i class="fa fa-user"></i> Üye Ol</button></a></li>
                                <label style="color:;"
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a class="<?=($menu=="ana")?"active":""?>" href="<?=base_url()?>">Ana Sayfa</a></li>
                            <li><a class="<?=($menu=="hakkımızda")?"active":""?>" href="<?=base_url()."home/hakkimizda"?>">Hakkımızda</a></li>
                            <li><a class="<?=($menu=="bizeyazın")?"active":""?>" href="<?=base_url()."home/bize_yazin"?>">Bize Yazın</a></li>
                            <li><a class="<?=($menu=="iletişim")?"active":""?>" href="<?=base_url()."home/iletisim"?>">İletişim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->