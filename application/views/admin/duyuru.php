<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Duyuru</h2>
        </div>
            <label class="text-success col-8"><?=$this->session->flashdata("success")?></label>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <!--<div class="card-header d-flex align-items-center">
                <h3 class="h4">Üye Kayıt Formu</h3>
            </div>-->
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?=base_url()."admin/ayarlar/duyuru_guncelle"?>">
                    <!--Üst Kategori-->
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Duyuru</label>
                        <div class="col-sm-8">
                            <textarea name="notice" cols="90"><?=$duyuru[0]->notice?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                            <button type="submit" style="margin-left: 40%;margin-right: 40%" class="btn btn-success">Güncelle</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
