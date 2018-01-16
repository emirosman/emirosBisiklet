<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Mesajlar</h2>
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
                        <th>Kullanıcı</th>
                        <th>Ürün</th>
                        <th>Yorum</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($yorumlar as $yorum){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$yorum->username;?></td>
                        <td><?=$yorum->name;?></td>
                        <td><?=$yorum->comment;?></td>
                        <td>
                            <a href="<?=base_url()."admin/urunler/yorum_sil/".$yorum->id?>" onclick="return confirm('Yorum silinecek emin misiniz?')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>