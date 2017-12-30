<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Üye Kayıt Formu</h2>
        </div>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <!--<div class="card-header d-flex align-items-center">
                <h3 class="h4">Üye Kayıt Formu</h3>
            </div>-->
            <div class="card-body">
                <form class="form" method="post" action="<?=base_url()."admin/uyeler/uye_ekle_kayit"?>">
                    <div class="col-md-8">
                        <!--Username-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Kullanıcı Adı</label>
                            <div class="col-sm-6">
                                <input type="text" name="username" class="form-control" required>
                                <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-username");?></label><!--login sayfasındaki css ler farklı olabilir-->
                            </div>
                        </div>
                        <!--Password-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Parola</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Parola Tekrar</label>
                            <div class="col-sm-6">
                                <input type="password" name="password-again" class="form-control" required>
                                <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-password");?></label><!--login sayfasındaki css ler farklı olabilir-->
                            </div>
                        </div>
                        <!--İsim-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">İsim</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <!--Soyisim-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Soyisim</label>
                            <div class="col-sm-6">
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                        </div>
                        <!--Telefon-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Telefon</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <!--Email-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">E-mail</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" required>
                                <label id="login-username-error" class="error"><?=$this->session->flashdata("msg-email");?></label><!--login sayfasındaki css ler farklı olabilir-->

                            </div>
                        </div>
                        <!--Bülten-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Bülten Aboneliği</label>
                            <div class="col-sm-6">
                                <input id="option" class="checkbox-template" type="checkbox" checked="" name="newsletter"><label for="option">Kampanyalardan haberdar olmak istiyorum</label>
                            </div>
                        </div>
                        <!--Yetki-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Yetki</label>
                            <div class="col-sm-6">
                                <select name="authority" class="form-control">
                                    <option>user</option>
                                    <option>admin</option>
                                </select>
                            </div>
                        </div>
                        <!--Durum-->
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Durum</label>
                            <div class="col-sm-6">
                                <input id="optionsRadios1" class="radio-template" type="radio" checked="" value="1" name="status"><label for="optionsRadios1">Aktif&nbsp;</label>
                                <input id="optionsRadios1" class="radio-template" type="radio" value="0" name="status"><label for="optionsRadios2">Pasif</label>
                            </div>
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
