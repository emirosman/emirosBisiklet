<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="col-8">Kampanya Ürünleri</h2>
            <?=($this->session->flashdata("urun_msj")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("urun_msj")."</label>"?>

        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-responsive table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Alış Fiyat</th>
                        <th>Satış Fiyat</th>
                        <th>Stok</th>
                        <th>Resim</th>
                        <th>Kayıt Tarihi</th>
                        <th>Son Güncelleme</th>
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
                        <td><?=$p_row->name;?></td>
                        <td><?=$p_row->b_price;?></td>
                        <td><?=$p_row->s_price;?></td>
                        <td><?=$p_row->stock;?></td>
                        <td><img width="50px" height="50px" src=" <?=base_url()."uploads/products/".$p_row->preview_img;?>"></td>
                        <td><?=$p_row->create_time;?></td>
                        <td><?=$p_row->update_time;?></td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/kampanya_cikar/".$p_row->id?>" onclick="return confirm('Ürün kampanyadan çıkartılacak emin misiniz?')" class="btn btn-outline-danger btn-sm">Çıkart</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>