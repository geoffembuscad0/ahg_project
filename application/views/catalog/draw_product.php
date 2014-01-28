<?php echo $head; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#drawProduct').wPaint({
            path: '<?php echo site_url("assets/js/wPaint"); ?>/'
        });
    });
</script>
<div class="row" style="width:100%;">
    <div class="large-12 columns color-pinky center-txt">
        <?php echo logo(175);?>
    </div>
</div>
<div class="row">
    <nav data-topbar="" class="top-bar">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#"></a></h1>
            </li>
            <li class="toggle-topbar menu-icon">
                <a href=""><span>Menu</span></a>
            </li>
        </ul>
        <section class="top-bar-section">
        <!-- Left Nav Section -->
        <ul id="mainNav" class="left show-for-large-up">
            <li><a href="<?php echo base_url();?>"><strong>Back</strong></a></li>
        </ul>
        <ul id="mainNav" class="right show-for-large-up">
            <li><a href="<?php echo site_url("customer/shop"); ?>">View All Products</a></li>
            <?php foreach($product_categories AS $category){ ?>
            <li><a href="<?php echo site_url("customer/shop?category=" . $category['category_no']); ?>"><?php echo $category['name']; ?>s</a></li>
            <?php } ?>
        </ul>
        </section>
    </nav>
</div>

<div class="row">
    <div class="large-12 columns">
        <h1 class="text-left"><?php echo $header_text;?></h1>
    </div>
</div>
<div class="row">
    <div class="large-7 columns">
        Select Size:
        <?php foreach($sizes AS $size){ ?>
        <?php echo form_radio('product_size', $size['value']) . $size['size'];?>
        <?php } ?>
    </div>
    <div class="large-5 columns">
        <button id="downloadDesignedProduct" class="button" style="float:right;">Convert to Image</button>
        <button id="proceedCart" class="button">Proceed to Cart</button>
    </div>
</div>
<!-- Drawing of Product -->
<div class="row">
    <div class="large-12 columns">
        <div id="drawProduct" style="position:relative; width:100%; height:340px; background-color:#cccccc;"></div>

    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#proceedCart").hide();
    $("#proceedCart").on('click', function(){
        self.location = '<?php echo site_url('customer/submit_drawing'); ?>';
    });
    $("#downloadDesignedProduct").on('click', function(){
       $("#proceedCart").show();
    });
    $("#downloadDesignedProduct").on('click', function(){
        var oCanvas = document.getElementById("drawProduct"); 
//	Canvas2Image.saveAsPNG(oCanvas);
	var oImgPNG = Canvas2Image.saveAsPNG(oCanvas, true);
    });
});    
</script>
<!-- END Drawing -->
</br>
</br>
<?php echo $footer; ?>
