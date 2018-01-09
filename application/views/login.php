    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Giriş Yap</h2>
                    <form action="<?=base_url()."home/login_ol"?>" method="post">
                        <input type="text" required name="username" placeholder="Kullanıcı Adı" />
                        <input type="password" required name="password" placeholder="Şifre" />
                        <?=($this->session->flashdata("alert")=="")?"":"<label class='text-danger'>".$this->session->flashdata("alert")."</label>"."<br>"?>
                        <a href="#" style="color:#ee8a0f  ">şifremi unuttum</a><br>
                        <button type="submit" class="btn btn-default">Giriş</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Kayıt Ol</h2>
                    <form action="<?= base_url()."home/kayit_ol"?>" method="post">
                        <input type="text" name="username" required placeholder="Kullanıcı Adı"/>
                        <?=($this->session->flashdata("alert1")=="")?"":"<label class='text-danger'>".$this->session->flashdata("alert1")."</label>"."<br>"?>
                        <input type="email" name="email" required placeholder="Email"/>
                        <?=($this->session->flashdata("alert2")=="")?"":"<label class='text-danger'>".$this->session->flashdata("alert2")."</label>"."<br>"?>
                        <input type="password" name="password" required placeholder="Şifre"/>
                        <input type="password" name="password2" required placeholder="Şifre Tekrar"/>
                        <?=($this->session->flashdata("alert3")=="")?"":"<label class='text-danger'>".$this->session->flashdata("alert3")."</label>"."<br>"?>                        <button type="submit" class="btn btn-default">Kayıt Ol</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
    <br><br><br><br><br>