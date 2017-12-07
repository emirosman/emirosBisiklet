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
                    <form class="form-horizontal" method="post" action="<?=base_url()."admin/uyeler/uye_duzenle_kayit/".$uye[0]->id?>">
                        <div class="col-md-12">
                            <!--Username-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Kullanıcı Adı</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control" required value="<?=$uye[0]->username?>">
                                    <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-username");?></label><!--login sayfasındaki css ler farklı olabilir-->
                                </div>
                            </div>
                            <!--Password-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Parola</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" required value="<?=$uye[0]->password?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Parola Tekrar</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password-again" class="form-control" required value="<?=$uye[0]->password?>">
                                    <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-password");?></label><!--login sayfasındaki css ler farklı olabilir-->
                                </div>
                            </div>
                            <!--Name-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">İsim</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" required value="<?=$uye[0]->name?>">
                                </div>
                            </div>
                            <!--Surname-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Soyisim</label>
                                <div class="col-sm-8">
                                    <input type="text" name="surname" class="form-control" required value="<?=$uye[0]->surname?>">
                                </div>
                            </div>
                            <!--Email-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" required value="<?=$uye[0]->email?>">
                                    <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-email");?></label><!--login sayfasındaki css ler farklı olabilir-->

                                </div>
                            </div>
                            <!--Phone-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Telefon</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" required value="<?=$uye[0]->surname?>">
                                </div>
                            </div>
                            <!--Newsletter-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Bülten</label>
                                <div class="col-sm-8 ">
                                    <input id="option" class="checkbox-template" type="checkbox" <?=($uye[0]->newsletter==0)?"":"checked"?> name="newsletter"><label for="option">Kampanyalardan haberdar olmak istiyorum</label>
                                </div>
                            </div>
                            <!--Authority-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Yetki</label>
                                <div class="col-sm-8">
                                    <select name="authority" class="form-control">
                                        <option <?=($uye[0]->authority=="user")?"selected='selected'":""?>>user</option>
                                        <option <?=($uye[0]->authority=="admin")?"selected='selected'":""?> >admin</option>
                                    </select>
                                </div>
                            </div>
                            <!--Status-->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Durum</label>
                                <div class="col-sm-8">
                                    <input id="optionsRadios1" class="radio-template" type="radio" <?=($uye[0]->status==1)?"checked":""?> value="1" name="status"><label for="optionsRadios1">Aktif&nbsp;</label>
                                    <input id="optionsRadios1" class="radio-template" type="radio" <?=($uye[0]->status==0)?"checked":""?> value="0" name="status"><label for="optionsRadios2">Pasif</label>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
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
                    <form class="form-horizontal" action="<?=base_url()."admin/uyeler/resim_guncelle/".$uye[0]->id?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group row">
                            <img class="rounded-circle col-5 " height="200px" src="<?=base_url()."uploads/users/".$uye[0]->image?>">
                            <div class="col-7">
                                <h4>Resim Seçin:</h4>
                                <div><input type="file" name="user_image" accept=".jpg, .jpeg, .png" /></div><br>
                                <div><input type="submit" value="Yükle" class="btn btn-success" /></div>
                            </div>
                    </form>
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
                <form action="<?=base_url()."admin/uyeler/adres_duzenle_kayit/".$rsad->id."/".$rsad->user_id?>" method="post">
                    <div class="form-group row">
                        <div class="col-3 ">
                            <input name="name" class="form-control" type="text" value="<?=$rsad->name?>">
                        </div>
                        <div class="col-sm-7">
                            <textarea name="address" class="form-control" rows="3" cols="30"><?=$rsad->address?></textarea>
                        </div>
                        <div class="col-1 row">
                            <div class="col-12">
                                <button type="submit" class=" btn btn-sm btn-warning">Güncelle</button>
                            </div>
                            <div class="col-12">
                                <a href="<?=base_url()."admin/uyeler/adres_sil/".$rsad->id."/".$rsad->user_id?>" class=" btn btn-sm btn-danger">sil</a>
                            </div>
                        </div>
                </form>
            </div>
            <?php }?>

            <form action="<?=base_url()."admin/uyeler/adres_ekle/".$uye[0]->id?>" method="post">
                <div class="form-group row">
                    <div class="col-3 ">
                        <input name="name" class="form-control" type="text" placeholder="Başlık" >
                    </div>
                    <div class="col-sm-7">
                        <textarea name="address" class="form-control" rows="3" cols="30" placeholder="Yeni Adres..."></textarea>
                    </div>
                    <div class="col-1">
                        <button type="submit" class=" btn btn-sm btn-success">Ekle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
