<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid ">
            <h2 class="col-8">Üyeler</h2>
            <?=($this->session->flashdata("list_msj")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("list_msj")."</label>"?>
        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <!--cart Başlığı Silindi-->
            <!--<div class="card-header d-flex align-items-center">
                <h3 class="h4">Striped Table</h3>
                <h5><a href="<?/*=base_url()."admin/uyeler/uye_ekle"*/?>"><span class="fa fa-plus"></span>Üye Ekle</a></h5>
            </div>-->
            <div class="card-body">
                <h5><a href="<?=base_url()."admin/uyeler/uye_ekle"?>"><span class="fa fa-plus"></span>Üye Ekle</a></h5>
                <table class="table table-striped table-responsive table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Kullanıcı Adı</th>
                        <th>İsim</th>
                        <th>Şifre</th>
                        <th>E-mail</th>
                        <th>Bülten Aboneliği</th>
                        <th>Durum</th>
                        <th>Kayıt Tarihi</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($uye_list as $user_row){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$user_row->id;?></td>
                        <td><?=$user_row->username;?></td>
                        <td><?=$user_row->name." ".$user_row->surname ;?></td>
                        <td><?=$user_row->password;?></td>
                        <td><?=$user_row->email;?></td>
                        <td><?=$user_row->newsletter;?></td>
                        <td><?=($user_row->status==1)?"aktif":"pasif";?></td>
                        <td><?=$user_row->create_time;?></td>
                        <td>
                            <a href="<?=base_url()."admin/uyeler/uye_detay/".$user_row->id?>" class="btn btn-outline-success btn-sm">Detay</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/uyeler/uye_duzenle/".$user_row->id?>" class="btn btn-outline-warning btn-sm">Düzenle</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/uyeler/uye_sil/".$user_row->id?>" onclick="return confirm('are you sure')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>