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
    <div class="large-12 columns"><h1><?php echo $header_link;?></h1></div>
</div>
<div class="row">
    <?php echo form_open_multipart("customer/print_customer_drawing"); ?>
    <div class="large-6 columns">
        <fieldset>
            <legend>Upload Product Image</legend>
            <i>The one that you drew earlier.</i>
            <?php echo form_upload('drawing'); ?>
        </fieldset>
    </div>
    <div class="large-6 columns">
        <fieldset>
            <legend>Your Contact Email</legend>
            <?php echo form_input('email_contact') ;?>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <fieldset>
            <legend>Billing</legend>
            <label>ID number:</label>
            <?php echo form_input('id_no'); ?>
            <label>Firstname:</label>
            <?php echo form_input('firstname');?>
            <label>Lastname:</label>
            <?php echo form_input('lastname');?>
            <label>Contact No.:</label>
            <?php echo form_input('phone_contact'); ?>
            <input type="submit" name="continue" class="button" value="Continue"/>or go back to <a style="color:red;" href="<?php echo site_url('customer/shop');?>">store</a>.
            <div class="messager"></div>
        </fieldset>
        <?php echo form_close();?>
    </div>
</div>
