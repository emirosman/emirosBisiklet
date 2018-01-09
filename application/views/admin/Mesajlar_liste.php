<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Kategoriler</h2>
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
                        <th>Durum</th>
                        <th>Cevap</th>
                        <th>isim</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($veri as $message){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$message->id;?></td>
                        <td><center><?=($message->status=="unread")?"<i class='fa fa-envelope'>":"<i class='fa fa-envelope-open-o'>";?></center></td>
                        <td><center><?=($message->answer=="not answer")?"<i class='fa fa-close'>":"<i class='fa fa-check'>";?></center></td>
                        <td><?=$message->username;?></td>
                        <td><?=$message->subject;?></td>
                        <td><?=(strlen($message->message)>120)?substr($message->message,0,120)."...":$message->message;?></td>
                        <td>
                            <a href="<?=base_url()."admin/mesajlar/mesaj_oku/".$message->id?>" class="btn btn-outline-warning btn-sm">Oku</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/mesajlar/mesaj_sil/".$message->id?>" onclick="return confirm('are you sure')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>