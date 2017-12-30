<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid row">
            <h2 class="col-8">Üye Düzenle Formu</h2>
            <div class="input-group col-4">
                <input id="searchBox" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn"><button id="searchBtn" class="btn btn-default" type="button"><span class="fa fa-search"></span></button></span>
            </div>
        </div>
    </header>
    <!--Form Başlangıç-->
    <div class="col-lg-12">
        <div class="card">
            <!--<div class="card-header d-flex align-items-center">
                <h3 class="h4">Üye Kayıt Formu</h3>
            </div>-->
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?=base_url()."admin/kategoriler/kategori_duzenle_kayit/".$veri[0]->id?>">
                    <!--Üst Kategori-->
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Üst Kategori</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="parent_id">
                                <?php foreach ($cats as $c_rs) {?>
                                    <option <?= ($c_rs->id==$veri[0]->parent_id)?"selected":""?> value="<?=$c_rs->id?>" >
                                        <?= $c_rs->name?>
                                    </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <!--Kategori İsmi-->
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">İsim</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?=$veri[0]->name?>" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
