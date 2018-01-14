<!--Content-->
<div class="col-sm-10 padding-right">
    <center><b class="text-success"><?=$this->session->flashdata("success")?></b></center>
    <?php if(count($yorumlar)>0) {?>
    <div id="cart_items">
        <div class="container col-sm-12">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="price"><center>No</center></td>
                        <td class="price">Ürün</td>
                        <td class="price">Yorum</td>
                        <td class="price">Tarih</td>
                        <td class="total"></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    foreach($yorumlar as $yorum) {
                        $i++;
                        ?>
                        <tr>
                            <td class="cart_price">
                                <center><p><?=$i?></p></center>
                            </td>
                            <td class="cart_price">
                                <p><?=$yorum->p_name?></p>
                            </td>
                            <td class="cart_price">
                                <p><?=substr($yorum->comment,0,40)?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_price">
                                    <p><?=$yorum->date?></p>
                                </div>
                            </td>
                            <td class="cart_delete">
                                <a class="btn btn-warning" href="<?=base_url()."uye/yorum_detay/".$yorum->id?>">Detay</a>
                                <a class="cart_quantity_delete" onclick="return confirm('Yorumunuz silinecek emin misiniz?')" href="<?=base_url()?>uye/yorum_sil/<?=$yorum->id?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php }else{
        echo "<center><b>Yorumunuz bulunmamakta,<a href='".base_url()."' style='color: #fe980f'> Alışverişe devam etmek için tıklayın</a></b></center>";
    } ?>
</div>
</div>
</div>
</div>
</section><!--/Content-->