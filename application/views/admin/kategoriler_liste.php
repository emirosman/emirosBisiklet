<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Kategoriler</h2>
            <div class="input-group col-4">
                <input id="searchBox" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn"><button id="searchBtn" class="btn btn-default" type="button"><span class="fa fa-search"></span></button></span>
            </div>
        </div>
    </header>
    <!--Tablo Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5><a href="<?=base_url()."admin/kategoriler/kategori_ekle"?>"><span class="fa fa-plus"></span>Kategori Ekle</a></h5>
                <?=$this->session->flashdata("cat_ekle")?>
                <table class="table table-striped table-responsive table-bordered" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Üst Kategori</th>
                        <th>İsim</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($cat_list as $cat_row){?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$cat_row->id;?></td>
                        <td><?=$cat_row->p_cat_name;?></td>
                        <td><?=$cat_row->name;?></td>
                        <td>
                            <a href="<?=base_url()."admin/kategoriler/kategori_duzenle/".$cat_row->id?>" class="btn btn-outline-warning btn-sm">Düzenle</a>
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/kategoriler/kategori_sil/".$cat_row->id?>" onclick="return confirm('are you sure')" class="btn btn-outline-danger btn-sm">Sil</a>
                        </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>