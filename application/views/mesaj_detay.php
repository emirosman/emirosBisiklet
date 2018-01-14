<div class="content-inner col-sm-10">
    <!-- Page Header-->
    <center>  <?=($this->session->flashdata("success")==null)?"": "<label class='text-success'>".$this->session->flashdata("success")."</label>"?></center>

    <div class="row">
        <!--Form Başlangıç Bilgiler-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="title text-center">Mesaj</h2>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?=base_url()."uye/bilgi_guncelle"?>">
                        <div class="col-md-12">
                            <!--Username-->
                            <div class="form-group row">
                                <label class="col-sm-1 form-control-label">Mesaj</label>
                                <div class="col-sm-8">
                                    <label class="col-sm-12 form-control-label"><?=$mesaj[0]->message?></label>
                                </div>
                            </div>
                            <?php if($mesaj[0]->cevap!=null){?>
                            <div class="form-group row">
                                <label class="col-sm-1 form-control-label">cevap</label>
                                <div class="col-sm-8">
                                    <label class="col-sm-12 form-control-label"><?=$mesaj[0]->cevap?></label>
                                </div>
                            </div>
                            <?php }?>

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