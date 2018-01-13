<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="owl-carousel owl-theme">
                <?php foreach ($resimler as $resim) {?>
                    <div class=" item">
                        <img src="<?=base_url()."uploads/products/".$resim->image?>" alt="" />
                    </div>
                <?php } ?>
            </div>
            <script>
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    items:1,
                    loop:true,
                    autoplay:true,
                    autoplayTimeout:3000,
                    autoplayHoverPause:true
                });
            </script>
        </div>
        <!--Ürün isim Fiyat-->
        <form method="post" action="<?=base_url()."uye/sepet_ekle/".$veri[0]->id?>">
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                    <b class="text-success"><?=$this->session->flashdata("success")?></b><br>
                    <h2><?=$veri[0]->name?></h2>
                    <img src="images/product-details/rating.png" alt="" />
                    <span>
                    <span><?= $veri[0]->s_price?> ₺</span>
                        <?php if($veri[0]->stock>0){?>
                            <label>Adet:</label>
            <!--Form-->
                    <input name="piece" type="number" value="1"  min="1" max="<?=$veri[0]->stock?>"/>
                            <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Sepete Ekle
                    </button>

                        <?php }?>
                </span>
                 <div class="row">
                     <div class="col-sm-6"
                    <p><b>Stok Durumu:</b><?=($veri[0]->stock>0)?"Mevcut":"Tükenmiş"?></p>
                    <p><b>Kategori:</b><?=$veri[0]->cat_name?></p>
                 </div>
                    <div class="col-sm-6">
                     <a href="<?=base_url()."uye/fav_ekle/".$veri[0]->id?>" class="pull-left" style="color:#fe980f;"><i class="fa fa-star"></i> Favorilere Ekle  </a>
                    </div>
                 </div>
                </div><!--/product-information-->
            </div>
        </form>

    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#description" data-toggle="tab">Açıklama</a></li>
                <li><a href="#tecnic_details" data-toggle="tab">Teknik Bilgiler</a></li>
                <li><a href="#reviews" data-toggle="tab">Yorumlar (<?=count($comments)?>)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="description" >
                <div class="col-sm-12">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo">
                                <p><?=$veri[0]->description?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tecnic_details" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="reviews" >
                <div class="col-sm-12">
                    <?php foreach ($comments as $comment) { ?>
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i><?=$comment->username?></a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i><?=$comment->date?></a></li>
                    </ul>
                    <p><?=$comment->comment?></p>
                   <?php } ?>
                    <?php if($this->session->user_sess) {?>
                    <hr>
                    <p style="color:#fe980f;"><b><?=(count($comments)>0)?"Sen de bir yorum bırak":"İlk yorumu siz yapın"?></b></p>

                    <form action="<?=base_url()."uye/yorum_yap/".$veri[0]->id?>" method="post">
                        <textarea name="comment" placeholder="Yorumunuz..." ></textarea>
                        <button type="submit" class="btn btn-default pull-right">
                            Gönder
                        </button>
                    </form>
                    <?php }
                    else echo "<hr>Yorum yapmak için <a style='color:#fe980f' href='".base_url()."home/login'>giriş yapın</a>"
                    ?>
                </div>
            </div>

        </div>
    </div><!--/category-tab-->

</div>

</div>
</div>
</section>