<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Siparişler</h2>
            <?=($this->session->flashdata("success")==null)?"": "<label class='text-success col-sm-8'>".$this->session->flashdata("success")."</label>"?>
        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-responsive table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Adı</th>
                        <th>Fiyat</th>
                        <th>Miktar</th>
                        <th>Tutar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($urunler as $urun){?>
                        <tr>
                            <th scope="row"><?=$count++?></th>
                            <td><?=$urun->name;?></td>
                            <td><?=$urun->price?></td>
                            <td><?=$urun->piece?></td>
                            <td><?=$urun->piece*$urun->price?></td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                </table>
                <form method="post" action="<?=base_url()."admin/siparisler/siparis_guncelle/".$urunler[0]->order_id?>">
                    <div class="row">
                        <label class="col-sm-2">Toplam Tutar</label>
                        <label class="col-sm-2"><?=$urunler[0]->total?> ₺</label>
                    </div>
                    <div class="row">
                        <label class="col-sm-2">Durum</label>
                        <select name="order_status" >
                            <option><?=$siparis[0]->order_status?></option>
                            <option>onay</option>
                            <option>kargo</option>
                            <option>tamam</option>
                        </select>
                    </div>
                    <div class="row">
                        <label class="col-sm-2">Kargo Bilgisi</label>
                        <input type="text" class="col-sm-3" name="kargo" value="<?=$siparis[0]->shipment?>">
                    </div>
                    <div class="row">
                        <label class="col-sm-2">Açıklama</label>
                        <textarea name="açıklama" class="col-sm-3" cols="30" rows="3"><?=$siparis[0]->description?></textarea>
                    </div>
                    <br>
                    <div class="col-sm-6">
                        <center><input type="submit" value="güncelle" class="btn btn-success"></center>
                    </div>
                </form>
            </div>
        </div>
    </div>