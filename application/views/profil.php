<div class="content-inner col-sm-10">
    <!-- Page Header-->
    <h2 class="title text-center">Profilim</h2>
    <center>  <?=($this->session->flashdata("success")==null)?"": "<label class='text-success'>".$this->session->flashdata("success")."</label>"?></center>

    <div class="row">
        <!--Form Başlangıç Bilgiler-->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="title text-center">Hesap Bilgileri</h2>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?=base_url()."uye/bilgi_guncelle"?>">
                        <div class="col-md-12">
                            <!--Username-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Kullanıcı Adı</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control" required value="<?=$uye[0]->username?>">
                                    <?=($this->session->flashdata("alert1")==null)?"": "<label class='text-danger col-sm-12'>".$this->session->flashdata("alert1")."</label>"?>
                                </div>
                            </div>
                            <!--Password-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Parola</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" required value="<?=$uye[0]->password?>">
                                </div>
                            </div>
                            <!--Name-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">İsim</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" required value="<?=$uye[0]->name?>">
                                </div>
                            </div>
                            <!--Surname-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Soyisim</label>
                                <div class="col-sm-8">
                                    <input type="text" name="surname" class="form-control" required value="<?=$uye[0]->surname?>">
                                </div>
                            </div>
                            <!--Email-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" required value="<?=$uye[0]->email?>">
                                    <?=($this->session->flashdata("alert2")==null)?"": "<label class='text-danger col-sm-12'>".$this->session->flashdata("alert2")."</label>"?>
                                </div>
                            </div>
                            <!--Phone-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Telefon</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" required value="<?=$uye[0]->surname?>">
                                </div>
                            </div>
                            <!--Newsletter-->
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Bülten</label>
                                <div class="col-sm-9 ">
                                    <input id="option" class="checkbox-template " type="checkbox" <?=($uye[0]->newsletter==0)?"":"checked"?> name="newsletter"><label for="option">Kampanyalardan haberdar olmak istiyorum</label>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <center> <button type="submit" class="btn btn-success">Güncelle</button></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <!--Form başlangıç Resim-->
            <div class="card">
                <h2 class="title text-center">Profil Resmi</h2>
                <div class="card-body">
                    <form class="form-horizontal" action="<?=base_url()."uye/resim_guncelle"?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group row">
                            <img class=" col-sm-5 " height="200px" src="<?=base_url()."uploads/users/".$uye[0]->image?>">
                            <div class="col-sm-7">
                                <h4>Resim Seçin:</h4>
                                <div><input type="file" name="user_image" accept=".jpg, .jpeg, .png" /></div><br>
                                <div><input type="submit" value="Güncelle" class="btn btn-success" /></div>
                            </div>
                    </form>
                </div>
            </div>


            <!--Form başlangıç Adres-->
            <div class="card">
                <h2 class="title text-center">Adreslerim</h2>
                <div class="card-body">
                    <div class="form-group row">
                        <h4 style="color:#fe980f;" class="text-center col-sm-3">Adres Başlığı</h4>
                        <h4 style="color: #fe980f" class="text-center col-sm-6">Adres</h4>
                    </div>
                    <?php foreach ($adres as $rsad)
                    {?>
                    <form action="<?=base_url()."uye/adres_guncelle/".$rsad->id."/".$rsad->user_id?>" method="post">
                        <div class="form-group row">
                            <div class="col-sm-3 ">
                                <input name="name" class="form-control" type="text" value="<?=$rsad->name?>">
                            </div>
                            <div class="col-sm-7">
                                <textarea name="address" class="form-control" rows="3" cols="30"><?=$rsad->address?></textarea>
                            </div>
                            <div class="col-sm-1 row">
                                <div class="col-sm-12">
                                    <button style="margin-bottom: 5px;margin-top: 2px" type="submit" class=" btn btn-sm btn-warning">Güncelle</button>
                                </div>
                                <div class="col-sm-12">
                                    <a href="<?=base_url()."uye/adres_sil/".$rsad->id."/".$rsad->user_id?>" class=" btn btn-sm btn-danger">sil</a>
                                </div>
                            </div>
                    </form>
                </div>
                <?php }?>

                <form action="<?=base_url()."uye/adres_ekle/".$uye[0]->id?>" method="post">
                    <div class="form-group row">
                        <div class="col-sm-3 ">
                            <input name="name" class="form-control" type="text" placeholder="Başlık" >
                        </div>
                        <div class="col-sm-7">
                            <textarea name="address" class="form-control" rows="3" cols="30" placeholder="Yeni Adres..."></textarea>
                        </div>
                        <div class="col-sm-1">
                            <button style="margin-top: 3px" type="submit" class=" btn btn-sm btn-success">Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
    </div>
</div>
</div>
</div>
</div>
</div>