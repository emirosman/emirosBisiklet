<!--Content-->
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Önerilen Ürünler</h2>
        <?php
        $i=0;
        foreach ($urunler as $urun) { ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="<?= base_url()."uploads/products/".$urun->preview_img?>" alt="<?=$urun->name?>" />
                        <h2><?=$urun->s_price?>  ₺</h2>
                        <p><?=substr($urun->name,0,28)?></p>
                        <a href="<?=base_url()."home/urun_detay/".$urun->id?>" class="btn btn-default add-to-cart"><i class="fa "></i>İncele</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2><?=$urun->s_price?> ₺</h2>
                            <p><?=$urun->name?></p>
                            <a href="<?=base_url()."home/urun_detay/".$urun->id?>" class="btn btn-default add-to-cart"><i class="fa "></i>İncele</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="<?=base_url()."uye/sepet_ekle/".$urun->id?>"> <i class="fa fa-shopping-cart"></i>Sepete Ekle</a></li>
                        <li><a href="<?=base_url()."uye/fav_ekle/".$urun->id?>"><i class="fa fa-star"></i>Favorilere Ekle</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
    </div><!--features_items-->

    

    <!--Son eklenenler-->
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Yeni Ürünler</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php for ($i=0;$i<count($son);$i=$i+3) { ?>
                <div class="item <?= ($i==0)?"active":""?>">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?= base_url()."uploads/products/".$son[$i]->preview_img?>" alt="" />
                                    <h2><?=$son[$i]->s_price?> ₺</h2>
                                    <p><?= substr($son[$i]->name,0,28)?></p>
                                    <a href="<?=base_url()."home/urun_detay/".$son[$i]->id?>" class="btn btn-default add-to-cart"><i class="fa"></i>İncele</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?= base_url()."uploads/products/".$son[$i+1]->preview_img?>" alt="" />
                                    <h2><?=$son[$i+1]->s_price?> ₺</h2>
                                    <p><?= substr($son[$i+1]->name,0,28)?></p>
                                    <a href="<?=base_url()."home/urun_detay/".$son[$i+1]->id?>" class="btn btn-default add-to-cart"><i class="fa "></i>İncele</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?= base_url()."uploads/products/".$son[$i+2]->preview_img?>" alt="" />
                                    <h2><?=$son[$i+2]->s_price?> ₺</h2>
                                    <p><?= substr($son[$i+2]->name,0,28)?></p>
                                    <a href="<?=base_url()."home/urun_detay/".$son[$i+2]->id?>" class="btn btn-default add-to-cart"><i class="fa"></i>İncele</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->

</div>
</div>
</div>
</section><!--/Content-->