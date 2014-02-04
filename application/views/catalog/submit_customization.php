<div class="row">
    <div class="large-12"><h2>You're purchasing this</h2></div>
</div>
<div class="row">
    <?php echo form_open_multipart('customer/validateBuyConfirmation'); ?>
    <div class="large-6 columns">
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
                        <tr>
                            <td><?php echo $feature[0]['feature'];?></td>
                            <td>₱<?php echo $feature[0]['feature_price'];?></td>
                            <?php echo form_hidden('features[]', $feature[0]['feature_no']);?>
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </li>
            <li class="description">Total Price:</li>
            <li class="price">₱<?php echo $total_price; ?></li>
            <?php echo form_hidden('total_price', $total_price);?>
        </ul>
    </div>
    <div class="large-6 columns">
            <fieldset>
                <legend>Your Contact Email</legend>
                <?php echo form_input('email') ;?>
            </fieldset>
        <fieldset>
            <legend>Billing</legend>
            <label>ID number:</label>
            <?php echo form_input('idNo'); ?>
            <label>Firstname:</label>
            <?php echo form_input('firstname');?>
            <label>Lastname:</label>
            <?php echo form_input('lastname');?>
            <label>Contact No.:</label>
            <?php echo form_input(array('name'=>'phone','maxlength'=>'11')); ?>
            <label>Your Product Image:</label>
            <?php echo form_upload('product_image');?>
<!--            <div id="confirmOrderAlert" data-alert class="alert-box info radius">
                <p>Are your sure you want to submit your order?</p>
                <ul class="button-group">
                    <li><a id="confirmOrderYes" href="#" class="button">Yes</a></li>
                </ul>
                <a href="#" class="close">&times;</a>
            </div>-->
            <div class="messager">
            </div>
            <?php echo form_hidden('product_no', $product_info[0]['product_no']);?>
            <input type="submit" name="continue" class="button" value="Order"/>or go back to <a style="color:red;" href="<?php echo site_url('customer/shop');?>">store</a>.
        </fieldset>
    </div>
    <?php echo form_close();?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    $("#confirmOrderAlert").hide();
    
//    $("input[name='continue']").click(function(){
//                
//        $("#confirmOrderAlert").show();
        
//        $("#confirmOrderYes").on('click', function(){
//            
//        // gets features
//        var features = '';
//        $("input[name='features[]']").each(function() {
//            features = features + '|' + $(this).val();
//        });
//
//            $.ajax({
//                url: '<?php //echo site_url('customer/validateBuyConfirmation'); ?>',
//                type: 'POST',
//                data: {
//                    idNo: $("input[name='id_no']").val(),
//                    firstname:$("input[name='firstname']").val(),
//                    lastname:$("input[name='lastname']").val(),
//                    phone: $("input[name='phone_contact']").val(),
//                    email: $("input[name='email_contact']").val(),
//                    product: '00001',
//                    features: features,
//                    totalPrice: '<?php //echo $total_price; ?>'
//                },
//                success: function(responseBuy){
//                    $(".messager").html(responseBuy);
//                }
//            });
//        });
//    });
});
</script>
