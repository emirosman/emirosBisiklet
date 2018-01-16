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
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Tutar</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($veri as $siparis){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$siparis->id;?></td>
                        <td><?=$siparis->name_surname?></td>
                        <td><?=$siparis->total?></td>
                        <td><?=$siparis->order_status?></td>
                        <td><?=$siparis->date?></td>
                        <td>
                            <a href="<?=base_url()."admin/siparisler/siparis_detay/".$siparis->id?>" class="btn btn-outline-warning btn-sm">Görüntüle</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/siparisler/siparis_iptal/".$siparis->id?>" onclick="return confirm('Siparis iptal edilecek emin misiniz?')" class="btn btn-outline-danger btn-sm">İptal</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>