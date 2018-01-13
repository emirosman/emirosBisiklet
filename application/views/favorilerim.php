<!--Content-->
<div class="col-sm-10 padding-right">
   <center><b class="text-success"><?=$this->session->flashdata("success")?></b></center>
    <?php if(count($favoriler)>0) {?>
    <div id="cart_items">
        <div class="container col-sm-12">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image"><center>Ürün</center></td>
                        <td class="description"></td>
                        <td class="price">Fiyat</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($favoriler as $urun) {?>
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
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?=base_url()."uye/fav_sil/".$urun->id?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php }else{
        echo "<center><b>Favorilerinizde ürün bulunmamakta,<a href='".base_url()."' style='color: #fe980f'> Alışverişe devam etmek için tıklayın</a></b></center>";
    } ?>
</div>
</div>
</div>
</div>
</section><!--/Content-->