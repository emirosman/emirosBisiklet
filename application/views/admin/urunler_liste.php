<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="col-8">Ürünler</h2>
            <?=($this->session->flashdata("urun_msj")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("urun_msj")."</label>"?>

        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5><a href="<?=base_url()."admin/urunler/urun_ekle"?>"><span class="fa fa-plus"></span>Ürün Ekle</a></h5>
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
                    foreach ($urun_list as $p_row){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$p_row->id;?></td>
                        <td><?=$p_row->cat_name;?></td>
                        <td><?=$p_row->name;?></td>
                        <td><?=$p_row->b_price;?></td>
                        <td><?=$p_row->s_price;?></td>
                        <td><?=$p_row->stock;?></td>
                        <td><img width="50px" height="50px" src=" <?=base_url()."uploads/products/".$p_row->preview_img;?>"></td>
                        <td><?=$p_row->create_time;?></td>
                        <td><?=$p_row->update_time;?></td>
          <!--######################3Parametre olarak giden bütün usernameler ID olarak değiştirilicek####################################3-->
                        <td>
                            <a href="<?=base_url()."admin/urunler/urun_detay/".$p_row->id?>" class="btn btn-outline-success btn-sm">Detay</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/urun_duzenle/".$p_row->id?>" class="btn btn-outline-warning btn-sm">Düzenle</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/urun_sil/".$p_row->id?>" onclick="return confirm('Ürün silinecek emin misiniz?')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>