<div class="row">
    <div class="large-12"><h2>You're purchasing this</h2></div>
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
<div class="row">
    <div class="large-12 columns">
            <fieldset>
                <legend>Your Contact Email</legend>
                <?php echo form_input('email_contact') ;?>
            </fieldset>
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
            <input type="button" name="continue" class="button" value="Order"/>or go back to <a style="color:red;" href="<?php echo site_url('customer/shop');?>">store</a>.
            <div class="messager"></div>
        </fieldset>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("input[name='continue']").click(function(){
        $.ajax({
            url: '<?php echo site_url('customer/validateBuyConfirmation'); ?>',
            type: 'POST',
            data: {
                idNo: $("input[name='id_no']").val(),
                firstname:$("input[name='firstname']").val(),
                lastname:$("input[name='lastname']").val(),
                phone: $("input[name='phone_contact']").val(),
                email: $("input[name='email_contact']").val(),
                totalPrice: '<?php echo $total_price; ?>'
            },
            success: function(responseBuy){
                $(".messager").html(responseBuy);
            }
            // Pass by via AJAX on continuation  1/20/2014
        });
    });
});
</script>
