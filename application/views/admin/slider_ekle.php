<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Slider Ekle</h2>
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
                    <form class="form-horizontal" method="post" action="<?=base_url()."admin/urunler/slider_ekle_kayit"?>">
                        <!--Username-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Ürün </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="product">
                                    <?php foreach ($urunler as $urun) {?>

                                        <option value="<?=$urun->id?>">
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
                                    <option value="1">
                                        Aktif
                                    </option>
                                    <option value="0">
                                        Pasif
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                                <button type="submit" class="btn btn-success">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>