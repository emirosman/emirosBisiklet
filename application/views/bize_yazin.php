<!--Content-->
<div class="col-sm-9 padding-right">

    <div class="row">
        <div class="col-sm-12">
            <div class="contact-form">
                <h2 class="title text-center">Bize Yazın</h2>
                <div class="status alert alert-success" style="display: none"></div>
                <?=($this->session->flashdata("success")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("success")."</label>"?>
                <form action="send_msg" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                    <div class="form-group col-md-6">
                        <!--user_sess çevir otomatik değer al-->
                        <input type="text" name="name" class="form-control" required="required" placeholder="İsim" value="<?=($this->session->user_sess)?$this->session->user_sess['username']:""?>">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?=($this->session->user_sess)?$this->session->user_sess['email']:""?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="phone" class="form-control" placeholder="Telefon" value="<?=($this->session->user_sess)?$this->session->user_sess['phone']:""?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="subject" class="form-control" required="required" placeholder="Konu">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Mesajınız ..."></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="contact-info">
        <div class="social-networks">
            <h2 class="title text-center">Sosyal Medyada Biz</h2>
            <ul>
                <li>
                    <a href="https://facebook.com/<?=$veri[0]->facebook?>"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/<?=$veri[0]->twitter?>"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="https://instagram.com/<?=$veri[0]->instagram?>"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://tr.pinterest.com/<?=$veri[0]->pinterest?>"><i class="fa fa-pinterest"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
</section><!--/Content-->