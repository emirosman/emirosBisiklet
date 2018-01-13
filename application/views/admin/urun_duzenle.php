<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Ürün Düzenle Formu</h2>
            <?=($this->session->flashdata("success")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("success")."</label>"?>

        </div>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12 row">
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Ürün Bilgileri</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?=base_url()."admin/urunler/urun_duzenle_kayit/".$urun[0]->id?>">
                        <!--Username-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">İsim</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control" value="<?=$urun[0]->name?>">
                            </div>
                        </div>
                        <!--Kategori-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Kategori</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="category">
                                    <?php foreach ($kategoriler as $cat){?>
                                        <option <?=(($urun[0]->cat_id==$cat->id)?"selected":"" )?> value="<?=$cat->id?>">
                                            <?= $cat->id."-".$cat->name?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Alış Fiyatı</label>
                            <div class="col-sm-4">
                                <input type="text" name="b_price" value="<?=$urun[0]->b_price?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Satış Fiyatı</label>
                            <div class="col-sm-4">
                                <input type="text" name="s_price" value="<?=$urun[0]->s_price?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Stok</label>
                            <div class="col-sm-4">
                                <input type="text" name="stock" value="<?=$urun[0]->stock?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Açıklama</label>
                            <div class="col-sm-9">
                                <textarea name="editor1" id="editor1"  class="form-control"><?=$urun[0]->description?></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Galeri</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?=base_url()."admin/urunler/galeri_ekle/".$urun[0]->id?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group row">
                            <div class="col-12">
                                <h4>Resim Ekle:</h4>
                                <div><input type="file" name="product_image" accept=".jpg, .jpeg, .png"  onchange="this.form.submit()"/></div><br>
                                <!-- <div><input type="submit" value="Yükle" class="btn btn-success" /></div> -->
                                <hr>
                                <div class="row">
                                    <?php foreach ($resim as $rs_img){ ?>
                                        <div class="col-4 row offset-1">
                                            <img class="rounded-circle col-12 " height="150px" src="<?=base_url()."uploads/products/".$rs_img->image?>">
                                            <div class=" col-12 ">
                                                <a href="<?=base_url()."admin/urunler/galeri_sil/".$urun[0]->id."/".$rs_img->id?>" class="btn btn-sm btn-outline-danger col-5">Sil</a>
                                                <a href="<?=base_url()."admin/urunler/galeri_sec/".$urun[0]->id."/".$rs_img->image?>" class="btn btn-sm btn-outline-success col-5">Seç</a>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
