<!--/sidebar-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($cats as $cat){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#<?=$cat->id?>">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        <?=$cat->name?>
                                    </a>
                                </h4>
                            </div>
                            <div id="<?=$cat->sub[0]->parent_id?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php foreach ($cat->sub as $catsub) {?>
                                        <ul>
                                            <li>
                                                <a data-toggle="collapse" href="#<?=$catsub->id?>">
                                                    <span class="badge pull-right"><i class="fa <?=(count($catsub->sub)>0)?"fa-plus":""?>"></i></span>
                                                    <?php if(count($catsub->sub)>0){?>
                                                        <?=$catsub->name?>
                                                    <?php } else{ ?>
                                                    <a href="<?=base_url()."home/kategori_liste/".$catsub->id?>"><li><?=$catsub->name?></li></a>
                                            <?php }?>
                                            </a>
                                            <?php if(count($catsub->sub)>0){ ?>
                                                <ul id="<?=$catsub->id?>" class="panel-collapse collapse">
                                                    <?php foreach ($catsub->sub as $catsub2) {?>
                                                        <a href="<?=base_url()."home/kategori_liste/".$catsub2->id?>"><li><?=$catsub2->name?></li></a>
                                                    <?php }?>
                                                </ul>
                                            <?php }?>
                                            </li>
                                        </ul>
                                    <?php }?>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div><!--/sidebar-->
            </div>
        </div>
    </div>