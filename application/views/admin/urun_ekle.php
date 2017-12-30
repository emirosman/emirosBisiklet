<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Ürün Kayıt Formu</h2>
        </div>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="form" method="post" action="<?=base_url()."admin/urunler/urun_ekle_kayit"?>">
                    <div class="col-md-8">
                        <!--isim-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">İsim</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" required>
                                <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-username");?></label><!--login sayfasındaki css ler farklı olabilir-->
                            </div>
                        </div>
                        <!--Kategori-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Kategori</label>
                            <div class="col-sm-6">
                                <select name="cat_id" class="form-control">
                                    <?php foreach ($cats as $rs_cat) {
                                    echo    "<option value='$rs_cat->id'>$rs_cat->name</option>";
                                    }?>
                                </select>
                            </div>
                        </div>
                        <!--Alış-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Alış Fiyat</label>
                            <div class="col-sm-6">
                                <input type="text" name="b_price" class="form-control" required>
                                <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-password");?></label><!--login sayfasındaki css ler farklı olabilir-->
                            </div>
                        </div>
                        <!--Satış-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Satış Fiyat</label>
                            <div class="col-sm-6">
                                <input type="text" name="s_price" class="form-control" required>
                            </div>
                        </div>
                        <!--Stok-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Stok</label>
                            <div class="col-sm-6">
                                <input type="text" name="stock" class="form-control" required>
                            </div>
                        </div>
                        <!--Açıklama-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Açıklama</label>
                            <div class="col-sm-9">
                                    <textarea name="editor1" id="editor1"  class="form-control"></textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'editor1' );
                                    </script>
                        </div>
                        </div>
                    <div class="form-group row col-12">
                        <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-success">Kayıt</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
