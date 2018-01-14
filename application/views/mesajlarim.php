<!--Content-->
<div class="col-sm-10 padding-right">
    <h2 class="title text-center">Mesajlar</h2>
    <center><b class="text-success"><?=$this->session->flashdata("success")?></b></center>
    <?php if(count($mesajlar)>0) {?>
    <div id="cart_items">
        <div class="container col-sm-12">

                <a href="<?=base_url()."home/bize_yazin"?>" style="color:#fe980f;"><i class="fa fa-plus"></i>Yeni Mesaj</a>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="price"><center>No</center></td>
                        <td class="price">Mesaj</td>
                        <td class="price">Durum</td>
                        <td class="price">Tarih</td>
                        <td class="total"></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    foreach($mesajlar as $mesaj) {
                        $i++;
                        ?>
                        <tr>
                            <td class="cart_price">
                                <center><p><?=$i?></p></center>
                            </td>
                            <td class="cart_price">
                                <p><?=substr($mesaj->message,0,50)?></p>
                            </td>
                            <td class="cart_price">
                                <p><?=($mesaj->answer=="answered")?"cevaplandı":"cevap bekliyor"?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_price">
                                    <p><?=$mesaj->time?></p>
                                </div>
                            </td>
                            <td class="cart_delete">
                                <a class="btn btn-warning" href="<?=base_url()."uye/mesaj_detay/".$mesaj->id?>">Detay</a>
                                <a class="cart_quantity_delete" onclick="return confirm('Mesaj silinecek emin misiniz?')" href="<?=base_url()?>uye/mesaj_sil/<?=$mesaj->id?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php }else{
        echo "<center><b>Mesajınız bulunmamakta,<a href='".base_url()."' style='color: #fe980f'> Alışverişe devam etmek için tıklayın</a></b></center>";
    } ?>
</div>
</div>
</div>
</div>
</section><!--/Content-->