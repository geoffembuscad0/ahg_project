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
<div class="row">
    <?php foreach($products AS $product_grid){ ?>
    <div class="large-4 columns">
        <img style="width:98%" src="<?php echo site_url("assets/imgs/products/custom_" . $product_grid['file_img']); ?>"/>
        <ul class="pricing-table">
            <li class="title"><h2 class="white-txt"><?php echo $product_grid['name']; ?></h2></li>
            <li class="price">Starting at <?php echo "₱" . $product_grid['price']; ?></li>
            <li class="bullet-item"><?php echo $product_grid['description'];?></li>
            <?php if($product_grid['category_no'] == 1){ ?>
            <li class="cta-button">
                <a class="button" href="<?php echo site_url("customer/browse_designs?product_no=" . $product_grid['product_no']); ?>">Browse Designs</a>
            </li>
            <li class="cta-button">
                <a class="button" href="<?php echo site_url("customer/customize_product?product=".$product_grid['product_no']); ?>">Customize & Buy</a>
            </li>
            <li class="cta-button">
                <a class="button" href="<?php echo site_url("customer/draw_product"); ?>">Draw your <?php echo $product_grid['name'];?></a>
            </li>
            <?php } else { ?>
            <li class="cta-button">
                <a class="button" href="<?php echo "by"; ?>">Buy</a>
            </li>
            <?php } ?>
        </ul>        
    </div>
    <?php } ?>
    <div class="large-4 columns"></div>
</div>

<?php echo $footer; ?>
