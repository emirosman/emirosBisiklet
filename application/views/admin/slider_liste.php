<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Slider</h2>
            <?=($this->session->flashdata("success")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("success")."</label>"?>
        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5><a href="<?=base_url()."admin/urunler/slider_ekle"?>"><span class="fa fa-plus"></span>Slider Ekle</a></h5>
                <table class="table table-striped table-responsive table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Durum</th>
                        <th>Ürün</th>
                        <th>Resim</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($sliders as $slider){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$slider->id;?></td>
                        <td><?=($slider->status==1)?"Aktif":"Pasif";?></td>
                        <td><?=$slider->name;?></td>
                        <td><img style="height: 70px" src="<?=base_url()."uploads/sliders/".$slider->image?>"></td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/slider_duzenle/".$slider->id?>" class="btn btn-outline-warning btn-sm">Düzenle</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/slider_sil/".$slider->id?>" onclick="return confirm('Slider silinecek emin misiniz?')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>