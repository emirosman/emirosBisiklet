<!--Content-->
<div class="col-sm-9 padding-right">
    <div class="row">
        <div class="col-sm-12">
            <div class="contact-form">
                <h2 class="title text-center">Sipariş Bilgileri</h2>
                <div class="status alert alert-success" style="display: none"></div>
                <?=($this->session->flashdata("success")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("success")."</label>"?>
                <form action="<?=base_url()."uye/siparis_kayit"?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                    <label class="col-md-3">İsim Soyisim</label>
                    <div class="form-group col-md-9">
                        <input type="text" name="name_surname" class="form-control" required="required" placeholder="İsim" value="<?=$this->session->user_sess['name']." ".$this->session->user_sess['surname']  ?>">
                    </div>
                    <label class="col-md-3">Telefon Numarası</label>
                    <div class="form-group col-md-9">
                        <input type="text" name="phone" class="form-control" required="required" placeholder="Email" value="<?=$this->session->user_sess['phone']?>">
                    </div>
                    <label class="col-md-3">Adres Seç</label>
                    <div class="form-group col-md-9">
                        <select name="address">
                            <?php foreach ($address as $adres){?>
                            <option value="<?=$adres->address?>"><?=$adres->name?></option>
                            <?php } ?>
                        </select>
                        <a class="text-warning" href="<?=base_url()?>uye/profil">Yeni Adres Ekle</a>
                    </div>
                    <label class="col-md-3">Toplam Tutar</label>
                    <div class="form-group col-md-9">
                        <input name="total" id="message" readonly value="<?=$total[0]->total;?>"  class="form-control" rows="8">
                    </div>
                    <label class="col-md-3">Ödeme Tipi</label>
                    <div class="form-group col-md-9">
                        <select name="pay_type" >
                            <option value="Kredi Kartı">Kredi Kartı</option>
                            <option value="Havale">Havale</option>
                            <option value="Kapıda Ödeme">Kapıda Ödeme</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section><!--/Content-->