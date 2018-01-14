
<div class="owl-carousel owl-theme col-sm-2">
    <?php foreach ($sliders as $slider){?>
       <a href="<?=base_url()."home/urun_detay/".$slider->product_id?>"> <div class="item"><img style="width: 90%;height: auto " src="<?=base_url()."uploads/sliders/".$slider->image?>"></div></a>
    <?php }?>
</div>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true
    });
</script>
