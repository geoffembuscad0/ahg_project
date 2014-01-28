<?php //Geoff Update December 17 ?>
<?php echo $head; ?>

<!--<div class="row">
    <div class="large-12 columns color-pinky center-txt">
        <?php //echo logo(175);?>
    </div>
</div>

<div class="row center-txt">
<nav class="top-bar">
<section class="top-bar-section">
<ul>
    <li><a href="#home"><strong>Home</strong></a></li>
    <li><a href="#about"><strong>About</strong></a></li>
    <li><a href="#ourproduct"><strong>Our Products</strong></a></li>
    <li><a href="#contactus"><strong>Contact Us</strong></a></li>
<li class="has-dropdown not-click"><a href="#home">Home</a>
<ul class="dropdown">
<li><a href="#sub">Sub</a></li>
</ul>
</li>
</ul>
<ul class="right">
    <li class="has-dropdown not-click"><a href="#customer">Customer</a>
        <ul class="dropdown">
            <li><a href="<?php echo site_url('customer/login');?>">Login</a></li>
            <li><a href="<?php echo site_url('customer/register');?>">Register</a></li>
        </ul>
    </li>
</ul>
</section>
</nav>
</div>-->

<div class="row">
    <div class="large-12 columns center-txt">
        <?php echo logo(200);?>
    </div>
</div>

<div class="row">
    <div class="large-12 columns center-txt">
        <h1>Customer Registration</h1>
    </div>
</div>
<?php echo form_open('customer/validate_registration');?>
<div class="row">
    <div class="large-12 large-centered columns center-txt">
        <?php // For error validation ?>
        <?php echo (validation_errors() != null) ? "<span class='alert radius label' style='width:80%;'><h3 class='white-txt'>" . validation_errors() . "</h3></span>" : null; ?>
        <?php // For success validation ?>
        <?php echo ($success_validation != null) ? "<span class='success radius label'><h3 class='white-txt'>" . $success_validation . "</h3></span>" : null; ?>
    </div>
</div>
<div class="row">
    <div class="large-9 large-centered columns center-txt color-facebook">        
            <h3 class="white-txt">Student ID:</h3>
            <?php echo form_input('student_id', set_value('student_id'), 'maxlength="11" placeholder="Student ID" ');?>
            <h3 class="white-txt">Password:</h3>
            <?php echo form_password('password', set_value('password'), 'placeholder="Password" ');?>
            <h3 class="white-txt">Confirm Password:</h3>
            <?php echo form_password('conf_password', set_value('conf_password'), 'placeholder="Confirm Password"');?>
            <h3 class="white-txt">Firstname:</h3>
            <?php echo form_input('firstname', set_value('firstname'), 'placeholder="Firstname"');?>
            <h3 class="white-txt">Lastname:</h3>
            <?php echo form_input('lastname', set_value('lastname'), 'placeholder="Lastname"');?>
            <h3 class="white-txt">Email:</h3>
            <?php echo form_input('email', set_value('email'), 'placeholder="Email Address"');?>
            <h3 class="white-txt"><input type="submit" id="validateRegistrationBtn" class="button" value="Register"/> <a class="button" href="<?php echo site_url();?>">Back</a></h3>
        <?php echo form_close();?>
    </div>
</div>
<script src="<?php //echo site_url("/assets/js/validate_login.js");?>"></script>
<?php echo $footer;?>