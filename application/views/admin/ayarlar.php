<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="col-8">Ayarlar</h2>
            <?=($this->session->flashdata("ayar_msj")==null)?"": "<label class='text-success col-8'>".$this->session->flashdata("ayar_msj")."</label>"?>
        </div>
    </header>
    <!-- Client Section-->
    <section class="client no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Work Amount  -->
                <div class="col-lg-12">
                    <div class="work-amount card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#genel" role="tab" aria-controls="genel">Genel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#email" role="tab" aria-controls="email">E-mail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#sosyal" role="tab" aria-controls="sosyal">Sosyal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#hakkımızda" role="tab" aria-controls="hakkımızda">Hakkımızda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#iletisim" role="tab" aria-controls="iletisim">İletişim</a>
                                </li>
                            </ul>

                            <form action="<?=base_url().'admin/ayarlar/guncelle/'.$veri[0]->id?>" method="post">
                            <div class="tab-content">
                                <!--Genel-->
                                <div class="tab-pane active" id="genel" role="tabpanel">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class=" form-control-label col-sm-2">Ad: </label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->adi?>"  name="adi" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label col-sm-2">Açıklama: </label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->description?>" name="description" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label col-sm-2">Anahtar Kelimeler: </label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->keywords?>"  name="keywords" placeholder="" required>
                                            </div>
                                        </div><div class="form-group">
                                            <label class="form-control-label col-sm-2">Adres: </label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->address?>" name="address" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Telefon:</label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->phone?>" name="phone" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Fax:</label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->fax?>" name="fax" placeholder="" required>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <!--Mail-->
                                <div class="tab-pane " id="email" role="tabpanel">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Smtp Server:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->smtp_server?>" name="smtpserver" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Smtp Email:</label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->smtp_email?>" name="smtpemail" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Port:</label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->smtp_port?>" name="smtpport" placeholder="" required>
                                            </div>
                                        </div><div class="form-group">
                                            <label class="form-control-label col-sm-2">Şifre: </label>
                                            <div class="col-sm-offset-2">
                                                <input type="password" class="form-control" value="<?=$veri[0]->password?>" name="password" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Sosyal-->
                                <div class="tab-pane" id="sosyal" role="tabpanel">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Facebook:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->facebook?>" name="facebook" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">İnstagram:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->instagram?>" name="instagram" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Twitter:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->twitter?>" name="twitter" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Pinterest:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->pinterest?>" name="pinterest" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Hakkımızda-->
                                <div class="tab-pane" id="hakkımızda" role="tabpanel">
                                    <div class="form-group">
                                        <div class="">
                                            <textarea name="about" id="editor1" rows="10" cols="80"><?=$veri[0]->about?></textarea>
                                            <script>
                                                CKEDITOR.replace( 'editor1' );
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <!--İletişim-->
                                <div class="tab-pane" id="iletisim" role="tabpanel">
                                    <div class="form-group">
                                        <div class="">
                                            <textarea name="contact" id="editor2" rows="10" cols="80"><?=$veri[0]->contact?></textarea>
                                            <script>
                                                CKEDITOR.replace( 'editor2' );
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(function () {
                                    $('#myTab a:last').tab('show')
                                })
                            </script>

                            <div class="offset-4"><input type="submit" class="btn btn-success" value="Güncelle"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

