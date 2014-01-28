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
    <li><a href="<?php //echo site_url();?>"><strong>Home</strong></a></li>
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
        <h1>Customer Login</h1>
    </div>
</div>

<div class="row">
    <div id="login_msg" class="large-12 large-centered columns center-txt">
        
    </div>
</div>

<div class="row">
    <div id="loginForm" class="large-9 large-centered columns center-txt color-facebook">        
        <h2 class="white-txt">Student ID:</h2>
        <?php echo form_input('student_id', null, "placeholder='Student ID'");?>
        <h2 class="white-txt">Password:</h2>
        <?php echo form_password('password', null, "placeholder='Password'");?>
        <?php echo form_button('LoginBtn', 'Login', 'class="button" id="validateLoginBtn"');?>
        <a class="button" href="<?php echo site_url();?>">Back</a>
    </div>
</div>

<script src="<?php echo site_url("/assets/js/validate_login.js");?>"></script>
<?php echo $footer; ?>