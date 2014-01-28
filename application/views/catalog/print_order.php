<?php echo $head; ?>
<div class="row" style="width:100%;">
    <div class="large-12 columns center-txt">
        <?php echo logo(175);?>
    </div>
</div>
<div class="row">
    <div class="large-12 columns center-txt">
        <h1>Print Customer Order</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">        
        <ul class="pricing-table">
            <li class="title"><?php echo $product_info[0]['name']; ?></li>
            <li class="bullet-item">Product Additional Features</li>
            <li class="bullet-item">Product Price: ₱<?php echo $product_info[0]['price']; ?></li>
            <li class="description">
                <table style="width:100%">
                    <thead>
                        <tr><th>Feature(s)</th><th>Price</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($product_features AS $feature){ ?>
                        <tr><td><?php echo $feature[0]['feature'];?></td><td>₱<?php echo $feature[0]['feature_price'];?></td></tr>
                        <?php } ?>                        
                    </tbody>
                    
                </table>
            </li>
            <li class="description">Total Price:</li>
            <li class="price">₱<?php echo $total_price; ?></li>
            
        </ul>
    </div>
</div>

