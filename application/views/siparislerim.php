<!--Content-->
<div class="col-sm-10 padding-right">
    <h2 class="title text-center">Siparişlerim</h2>
    <center><b class="text-success"><?=$this->session->flashdata("success")?></b></center>
    <?php if(count($siparisler)>0) {?>
    <div id="cart_items">
        <div class="container col-sm-12">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="price"><center>No</center></td>
                        <td class="price">İsim</td>
                        <td class="price">Tutar</td>
                        <td class="quantity">Durum</td>
                        <td class="total"></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    foreach($siparisler as $siparis) {
                        $i++;
                        ?>
                        <tr>
                            <td class="cart_price">
                                <center><p><?=$i?></p></center>
                            </td>
                            <td class="cart_price">
                                <p><?=$siparis->name_surname?></p>
                            </td>
                            <td class="cart_price">
                                <p><?=$siparis->total?> ₺</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_price">
                                    <p><?=$siparis->order_status?></p>
                                </div>
                            </td>
                            <td class="cart_delete">
                                <a href="<?=base_url()."uye/siparis_detay/".$siparis->id?>" class="btn btn-warning"> Detay</a>
                                <?php if($siparis->order_status=="Yeni"){?>
                                <a class="cart_quantity_delete" href="<?=base_url()."uye/siparis_sil/"."$siparis->id"?>"><i class="fa fa-times"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php }else{
        echo "<center><b>Siparişiniz bulunmamakta,<a href='".base_url()."' style='color: #fe980f'> Alışverişe devam etmek için tıklayın</a></b></center>";
    } ?>
</div>
</div>
</div>
</div>
</section><!--/Content-->