<!--Content-->
<div class="col-sm-10 padding-right">
    <h2 class="title text-center">Siparişlerim</h2>
   <center><b class="text-success"><?=$this->session->flashdata("success")?></b></center>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($siparisler as $siparis) {?>
                        <tr>
                            <td class="cart_product">
                                <a href="<?=base_url()."home/urun_detay/".$siparis->id?>"><img style="height: 100px" hspace="10px" src="<?=base_url()."uploads/products/".$siparis->preview_img?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="<?=base_url()."home/urun_detay/".$siparis->id?>"><?=substr($siparis->name,0,20)?></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><?=$siparis->s_price?> ₺</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_price">
                                    <p><?=$siparis->piece?></p>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?= $siparis->piece*$siparis->s_price?> ₺</p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section><!--/Content-->