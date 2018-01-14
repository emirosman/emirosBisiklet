<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>İletişim</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><i class="fa fa-map-marker"></i><label><?=$veri[0]->address." ".$veri[0]->city?></label></li>
                            <li><i class="fa fa-phone"></i><label><?=$veri[0]->phone?></label></li>
                            <li><i class="fa fa-envelope"></i><label><?=$veri[0]->email?></label></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Kurumsal</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?=base_url()."home/hakkimizda"?>">Hakkımızda</a></li>
                            <li><a href="<?=base_url()."home/iletisim"?>">İletişim</a></li>
                            <li><a href="<?=base_url()."home/bize_yazin?"?>">Bize Yazın</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Sosyal Medya</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="https://facebook.com/<?=$veri[0]->facebook?>">Facebook</a></li>
                            <li><a href="https://twitter.com/<?=$veri[0]->twitter?>">Twitter</a></li>
                            <li><a href="https://instagram.com/<?=$veri[0]->instagram?>">Instagram</a></li>
                            <li><a href="https://tr.pinterest.com/<?=$veri[0]->pinterest?>">Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Emirosman Bisiklet © 2017-<?=date('Y')?></p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Emirosman</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->




<script src="<?= base_url()?>/assets/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>/assets/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url()?>/assets/js/price-range.js"></script>
<script src="<?= base_url()?>/assets/js/jquery.prettyPhoto.js"></script>
<script src="<?= base_url()?>/assets/js/main.js"></script>
</body>
</html>