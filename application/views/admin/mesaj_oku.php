<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Mesaj Oku</h2>
        </div>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form class="form-horizontal" method="post" action="<?=base_url()."admin/mesajlar/okundu/".$veri[0]->id?>">
                            <!--Mesaj Göster-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">İsim:</label>
                                <label class="col-sm-5 form-control-label"><?=$veri[0]->username?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Email:</label>
                                <label class="col-sm-5 form-control-label"><?=$veri[0]->email?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Telefon:</label>
                                <label class="col-sm-5 form-control-label"><?=$veri[0]->phone?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Tarih:</label>
                                <label class="col-sm-5 form-control-label"><?=$veri[0]->time?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">IP:</label>
                                <label class="col-sm-5 form-control-label"><?=$veri[0]->ip?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Konu:</label>
                                <label class="col-sm-5 form-control-label"><?=$veri[0]->subject?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Mesaj:</label>
                                <label class="col-sm-10 form-control-label"><?=$veri[0]->message?></label>
                            </div>
                            <div class="form-group row col-sm-6">
                                <input id="control" class="checkbox-template" type="checkbox" name="control"><label for="control">Okunmadı olarak işaretle</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 offset-sm-3">
                                    <button type="submit" class="btn btn-success col-sm-4"><i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <form class="form-horizontal" method="post" action="<?=base_url()."admin/mesajlar/cevapla/".$veri[0]->id?>">
                            <!--Mesaj Cevapla-->

                            <input type="hidden" name="email" value="<?=$veri[0]->email?>">
                            <div class="form-group row">
                                <textarea required name="answer" cols="50" rows="5" ></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 offset-sm-3">
                                    <button type="submit" class="btn btn-success">Cevapla</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
