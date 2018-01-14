<div class="content-inner col-sm-10">
    <!-- Page Header-->
    <center>  <?=($this->session->flashdata("success")==null)?"": "<label class='text-success'>".$this->session->flashdata("success")."</label>"?></center>

    <div class="row">
        <!--Form Başlangıç Bilgiler-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="title text-center">Yorum</h2>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?=base_url()."uye/bilgi_guncelle"?>">
                        <div class="col-md-12">
                            <!--Username-->
                            <div class="form-group row">
                                <label class="col-sm-1 form-control-label">Ürün</label>
                                <div class="col-sm-8">
                                    <label class="col-sm-12 form-control-label"><?=$yorum[0]->p_name?></label>
                                </div>
                            </div>
                            <!--Password-->
                            <div class="form-group row">
                                <label class="col-sm-1 form-control-label">Tarih</label>
                                <div class="col-sm-8">
                                    <label class="col-sm-12 form-control-label"><?=$yorum[0]->date?></label>
                                </div>
                            </div>
                            <!--Name-->
                            <div class="form-group row">
                                <label class="col-sm-1 form-control-label">Yorum</label>
                                <div class="col-sm-8">
                                    <label class="col-sm-12 form-control-label"><?=$yorum[0]->comment?></label>
                                </div>
                            </div>
                            <!--Surname-->
                    </form>
                </div>
            </div>
        </div>

        <br><br><br>
    </div>
</div>
</div>
</div>
</div>
0</div>