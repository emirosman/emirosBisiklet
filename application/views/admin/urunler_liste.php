<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Ürünler</h2>
            <div class="input-group col-4">
                <input id="searchBox" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn"><button id="searchBtn" class="btn btn-default" type="button"><span class="fa fa-search"></span></button></span>
            </div>
        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5><a href="<?=base_url()."admin/urunler/urun_ekle"?>"><span class="fa fa-plus"></span>Ürün Ekle</a></h5>
                <?=$this->session->flashdata("urun_ekle")?>
                <table class="table table-striped table-responsive table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>İsim</th>
                        <th>Alış Fiyat</th>
                        <th>Satış Fiyat</th>
                        <th>Stok</th>
                        <th>Resim</th>
                        <th>Kayıt Tarihi</th>
                        <th>Son Güncelleme</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($urun_list as $user_row){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$user_row->id;?></td>
                        <td><?=$user_row->cat_id;?></td>
                        <td><?=$user_row->name;?></td>
                        <td><?=$user_row->s_price;?></td>
                        <td><?=$user_row->b_price;?></td>
                        <td><?=$user_row->stock;?></td>
                        <td><img width="50px" height="50px" src=" <?=base_url()."uploads/products/default_product.png";?>"></td>
                        <td><?=$user_row->create_time;?></td>
                        <td><?=$user_row->update_time;?></td>
          <!--######################3Parametre olarak giden bütün usernameler ID olarak değiştirilicek####################################3-->
                        <td>
                            <a href="<?=base_url()."admin/urunler/urun_detay/".$user_row->id?>" class="btn btn-outline-success btn-sm">Detay</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/urun_duzenle/".$user_row->id?>" class="btn btn-outline-warning btn-sm">Düzenle</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/urun_sil/".$user_row->id?>" onclick="return confirm('are you sure')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>