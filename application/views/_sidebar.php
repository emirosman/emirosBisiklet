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
                                                    <?=$catsub->name?>
                                                </a>
                                                <?php if(count($catsub->sub)>0){ ?>
                                                    <ul id="<?=$catsub->id?>" class="panel-collapse collapse">
                                                        <?php foreach ($catsub->sub as $catsub2) {?>
                                                            <li><?=$catsub2->name?></li>
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

                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                    </div>
                </div><!--/sidebar-->
            </div>
        </div>
    </div>