<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-3">Üye Düzenle Formu</h2>
            <label class="alert-success"><?=$this->session->flashdata("dzn_msj");?></label>
        </div>

    </header>
    <div class="row">
        <!--Form Başlangıç Bilgiler-->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Hesap Bilgileri</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <!--Username-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Kullanıcı Adı </label>
                            <div class="col-sm-8">
                                <?=$uye[0]->username?>
                            </div>
                        </div>
                        <!--Password-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Parola</label>
                            <div class="col-sm-8">
                                <?=$uye[0]->password?>
                            </div>
                        </div>
                        <!--Name-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">İsim</label>
                            <div class="col-sm-8">
                                <?=$uye[0]->name?>
                            </div>
                        </div>
                        <!--Surname-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Soyisim</label>
                            <div class="col-sm-8">
                                <?=$uye[0]->surname?>
                            </div>
                        </div>
                        <!--Email-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">E-mail</label>
                            <div class="col-sm-8">
                                <?=$uye[0]->email?>

                            </div>
                        </div>
                        <!--Phone-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Telefon</label>
                            <div class="col-sm-8">
                                <?=$uye[0]->surname?>
                            </div>
                        </div>
                        <!--Newsletter-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Bülten</label>
                            <div class="col-sm-8 ">
                                <?=($uye[0]->newsletter==0)?"Abone Değil":"Abone"?>
                            </div>
                        </div>
                        <!--Authority-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Yetki</label>
                            <div class="col-sm-8">
                                    <?=$uye[0]->authority?>
                            </div>
                        </div>
                        <!--Status-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Durum</label>
                            <div class="col-sm-8">
                                 <?=($uye[0]->status==1)?"Aktif":"Pasif"?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <!--Form başlangıç Resim-->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Resim</h3>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                         <center><img class="rounded-circle col-5 " height="200px" src="<?=base_url()."uploads/users/".$uye[0]->image?>"></center>

                        </div>
            </div>
        </div>

        <!--Form başlangıç Adres-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Adres</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <h4 class="col-3">Adres Başlığı</h4>
                    <h4 class="col-9">Adres</h4>
                </div>
                <?php foreach ($adres as $rsad)
                {?>
                    <div class="form-group row">
                        <div class="col-3 ">
                            <?=$rsad->name?>
                        </div>
                        <div class="col-sm-7">
                            <?=$rsad->address?>
                        </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
</div>
