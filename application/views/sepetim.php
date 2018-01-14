<!--Content-->
<div class="col-sm-10 padding-right">
    <h2 class="title text-center">Sepetim</h2>
   <center><b class="text-success"><?=$this->session->flashdata("success")?></b></center>
    <?php if(count($sepet)>0) {?>
    <div id="cart_items">
        <div class="container col-sm-12">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image"><center>Ürün</center></td>
                        <td class="description"></td>
                        <td class="price">Fiyat</td>
                        <td class="quantity">Adet</td>
                        <td class="total">Toplam</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($sepet as $urun) {?>
                        <tr>
                            <td class="cart_product">
                                <a href="<?=base_url()."home/urun_detay/".$urun->id?>"><img style="height: 100px" hspace="10px" src="<?=base_url()."uploads/products/".$urun->preview_img?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="<?=base_url()."home/urun_detay/".$urun->id?>"><?=substr($urun->name,0,20)?></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><?=$urun->s_price?> ₺</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_price">
                                    <p><?=$urun->piece?></p>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?= $urun->piece*$urun->s_price?> ₺</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?=base_url()."uye/sepet_urun_sil/".$urun->id?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    $sepet_toplam=0;
    foreach ($sepet as $urun) {
        $sepet_toplam+=$urun->s_price*$urun->piece;
    }
    ($sepet_toplam>=100)?$kargo=0:$kargo=7;
    ?>
    <div class="container " id="do_action">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="<?=base_url()."uye/siparis_tamamla"?>">
                    <div class="total_area">
                        <ul>
                            <li>Toplam <span><?=$sepet_toplam?> ₺</span></li>
                            <input type="hidden" value="<?=$sepet_toplam?> ₺" name="total">
                        </ul>
                     <center><input type="submit" value="Sipariş Tamamla" class="btn btn-default check_out"></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }else{
        echo "<center><b>Sepetinizde ürün bulunmamakta,<a href='".base_url()."' style='color: #fe980f'> Alışverişe devam etmek için tıklayın</a></b></center>";
    } ?>
</div>
</div>
</div>
</div>
</section><!--/Content-->