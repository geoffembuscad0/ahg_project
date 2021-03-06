<?php echo $head; ?>
<script>
var piecesFeatures = '';
</script>
    <div class="row" style="width:100%;">
        <div class="large-12 columns color-pinky center-txt"><?php echo logo(175);?>
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
        <div id="customizationInput" class="large-12 columns">
        </div>
    </div>
    <?php //echo form_open(null,'id="form"'); ?>
    <div class="row">
        <div class="large-12 columns">
            <h1 class="text-left"><?php echo $header_text;?></h1>
            <ul class="inline-list">
            <li><?php echo form_button('submit_customize', 'Submit Customized Product', 'id="submitCustomization" class="button"');?></li>
            <li><a id="clearCustomization" class="button" href="#restart">Restart</a></li>
            </ul>
            <?php echo form_hidden('product_no', $product_info[0]['product_no']);?>
        </div>
    </div>

    <!-- Customization -->
    <div id='ColorsSizeCustomization' class='row'>
        <div class="large-6 columns">
        <h4>Sizes:</h4>
        <ul class="inline-list">
        <?php foreach($product_available_sizes AS $size){ ?>
        <li><?php echo form_radio('product_size', $size['size']); ?><?php echo $size['name'];?></li>
        <?php } ?>
        </ul>
        </div>
        <div class="large-6 columns">
            <h4>Colors Available:</h4>
            <ul class="inline-list">
            <?php foreach($product_available_colors AS $colors){ ?>
                <li><ul class="pricing-table">
                <?php foreach($colors AS $color){ ?>
                <li id="pColor<?php echo $color['hexcode']; ?>" class="title" style="text-align:left;background:<?php echo $color['hexcode']; ?>;padding: 5px;">
                <?php echo form_radio('product_color', $color['hexcode']);?>
                </li>
                <?php } ?>
                </ul></li>
            <?php } ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
        <h3>Preview<?php echo form_button('convert_img','Convert to Image', "id='convertToImage' class='button' style='float:right;'");?></h3><?php //Converts sample canvas to image ?>
        <div class="draggedItems" style="width:100%;height:486px; border-style: solid; border-width: 5px; border-color: #cccccc;">
        <!-- Added border style for canvas -->
        <canvas id="theCob" width="640" height="480"></canvas>
        </div>
        </div>
    </div>
    <div class="row">
        <div id="featuresGrid" class="large-12 columns">
            <div style="width:100%">
                <h2>Features:</h2>
            </div>
            <ul id="gallery" class="inline-list">
            <?php foreach($product_custom_features AS $features){ ?>
            <li>
            <a id="featureCore<?php echo $features['feature_no'];?>" class="draggable" href="#">
            <img src="<?php echo site_url("assets/imgs/custom_avail/" . $features['img_file']); ?>"/>
            <?php //echo form_hidden($features['part_name'], $features['feature_no']); ?>
            <input id="feature<?php echo $features['feature_no'];?>" class="feature_product" type="hidden" name="<?php echo $features['part_name'];?>" value="<?php echo $features['feature_no'];?>"/>
            </a></br>
            <span class="label">
            <h5 class='white-txt'><?php echo $features['feature']; ?></h5>
            </span>
            </li>
            <script>
                $(document).ready(function(){                    
                    $("#featureCore<?php echo $features['feature_no'];?>").hover(function(){
                    },function(){
                        piecesFeatures += $("#featureCore<?php echo $features['feature_no'];?> #feature<?php echo $features['feature_no'];?>").val() + "/";
                    });
                });
            </script>
            <?php } ?>
            </ul>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
    var selectedcolor;
    var selectedsize;
    
    function clearCanvas(){
        var canvas = document.getElementById('theCob');
        var context = canvas.getContext('2d');
        context.clearRect(0, 0, canvas.width, canvas.height);
        $(".draggable").css({
            "left": $(".draggable").data('originalLeft'),
            "top": $(".draggable").data('origionalTop')
        });
        piecesFeatures = '';
    }
    function saveImg(){
        var oCanvas = document.getElementById("theCob");
        // Canvas2Image.saveAsPNG(oCanvas);
        var oImgPNG = Canvas2Image.saveAsPNG(oCanvas, true);
    }
    function cob(color, size) {
        var canvas = document.getElementById("theCob");
        var context = canvas.getContext("2d");
        var centerX = (canvas.width/2)+128;
        var centerY = canvas.height/2;
        var radius = size;

        // var startingAngle = 1.2 * Math.PI;
        // var endingAngle = 1.8 * Math.PI;
        var counterclockwise = false;
        context.beginPath();
        context.arc(centerX, centerY, radius, 2.15, 1.07, counterclockwise);
        context.lineWidth = 14;
        context.strokeStyle = color;
        context.stroke();
        context.closePath();
    }
    $("input:radio[name='product_size']").change(function(){
        if($(this).is(':checked')){
            if($(this).val() == 's'){
                selectedsize = 's';
            } else if($(this).val() == 'm'){
                selectedsize = 'm';
            // cob(selectedcolor, 135);
            } else if($(this).val() == 'l'){
                selectedsize = 'l';
            // cob(selectedcolor, 140);
            }
        }
    });
    $("input:radio[name='product_color']").change(function(){
        if($(this).is(':checked')){
        cob($(this).val(), 140);
            selectedcolor = $(this).val();
        }
    });    
    
    // makes items draggable important
    $(".draggable").draggable();
    
    $("#submitCustomization").on('click', function(){
        $.ajax({
            url: '<?php echo site_url('customer/submitCustomOrder');?>',
            type: 'POST',
            data: {
                customFeatures: piecesFeatures,
                product_no: '<?php echo $product_info[0]['product_no'];?>',
                product_size: selectedsize,
                product_color: selectedcolor
             },
             beforeSend:function(){
                $("#customizationInput").hide();
             },
             success: function(repsonseFormCustomer){
                $("#customizationInput").html(repsonseFormCustomer);
             },
             complete: function(){
                $("#customizationInput").slideDown(1500);
             }
        });

    });
    $("#clearCustomization").on('click', function(){
        clearCanvas();
    });
    
    $("#convertToImage").on('click', function(){
//        $("#featuresGrid").hide();
        FireShotAPI.savePage(false);
        
    });
});
</script>
<?php echo $footer; ?>