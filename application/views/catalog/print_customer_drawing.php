<?php echo $head; ?>
<div class="row" style="width:100%;">
    <div class="large-12 columns center-txt">
        <?php echo logo(175);?>
    </div>
</div>
<div class="row">
    <div class="large-12 columns center-txt">
        <h1>Customers Drawing</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns center-txt">
        <img src="<?php echo site_url('orders/canvas2.png');?>"/>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <ul class="pricing-table">
            <li class="title">Customer Name</li>
            <li class="price"><?php echo $customer_name;?></li>
            <li class="price">Drawn Hairband</li>
            <li class="bullet-item"></li>
        </ul>
    </div>
</div>

