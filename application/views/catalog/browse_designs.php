<?php echo $head; ?>
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
        <h1 class="text-left"><?php echo $header_text; ?></h1>
    </div>
</div>

<!-- Shopping Place-->
<?php foreach($products AS $product){ ?>
<div class="row">
    <?php foreach($product AS $product_grid){ ?>
    <div class="large-3 columns">
        <img style="width:98%" src="<?php echo site_url("assets/imgs/products/design_headigniter_" . $product_grid['img_file'] . ".jpg"); ?>"/>
        <ul class="pricing-table">
            <li class="title"><h2 class="white-txt"><?php echo $product_grid['name']; ?></h2></li>
            <li class="price">Price: <?php echo "₱" . $product_grid['design_price']; ?></li>
            <li class="bullet-item"><?php echo ($product_grid['description'] != null) ? $product_grid['description'] : "<i>-No Description Yet-</i>" ;?></li>
            <li class="cta-button"><a class="button" href="#">Buy Now</a></li>
        </ul>
    </div>
    <?php } ?>
</div>
<?php } ?>
<?php echo $footer; ?>
