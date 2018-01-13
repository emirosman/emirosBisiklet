<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Slider Düzenle</h2>
            <?=($this->session->flashdata("success")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("success")."</label>"?>
        </div>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12 row">
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Slider Bilgileri</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?=base_url()."admin/urunler/slider_duzenle_kayit/".$slider[0]->id?>">
                        <!--Username-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Ürün </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="product">
                                    <?php foreach ($urunler as $urun) {?>

                                        <option <?=(($urun->id==$slider[0]->product_id)?"selected":"") ?> value="<?=$urun->id?>">
                                            <?= $urun->name?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!--Kategori-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Durum</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option <?=(($slider[0]->status==1)?"selected":"")?"selected":"" ?> value="1">
                                        Aktif
                                    </option>
                                    <option <?=(($slider[0]->status==0)?"selected":"" )?> value="0">
                                        Pasif
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                                <button type="submit" class="btn btn-success">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Resim</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?=base_url()."admin/urunler/slider_resim/".$slider[0]->id?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group row">
                            <img class="col-12 " height="200px" src="<?=base_url()."uploads/sliders/".$slider[0]->image?>">
                            <div class="col-7">
                                <h4>Resim Seçin:</h4>
                                <div><input type="file" name="slider_image" accept=".jpg, .jpeg, .png" /></div><br>
                                <div><input type="submit" value="Yükle" class="btn btn-success" /></div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
