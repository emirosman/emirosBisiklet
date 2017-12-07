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
                <form class="form-horizontal" method="post" action="<?=base_url()."admin/uyeler/uye_duzenle_kayit/".$veri[0]->username?>"><!--username yenine ID gelicek-->
                    <!--Username-->
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Normal</label>
                        <div class="col-sm-4">
                            <input type="text" name="username" class="form-control" value="<?=$veri[0]->username?>">
                        </div>
                    </div>
                    <!--Password-->
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Password</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?=$veri[0]->password?>" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Password Again</label>
                        <div class="col-sm-4">
                            <input type="password" name="password_control" value="<?=$veri[0]->password?>" class="form-control">
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
