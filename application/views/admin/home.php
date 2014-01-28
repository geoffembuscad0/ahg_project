<?php echo $head; ?>

<div class="row">
    <div class="large-12 columns color-pinky center-txt">
        <?php echo logo(175);?>
    </div>
</div>

<div class="row center-txt">
<nav class="top-bar">
<section class="top-bar-section">
<ul>
    <li><a href="#home"><strong>Dashboard</strong></a></li>
    <!--
    <li class="has-dropdown not-click"><a href="#home">Home</a>
        <ul class="dropdown">
        <li><a href="#sub">Sub</a></li>
        </ul>
    </li>-->
</ul>
<ul class="right">
    <li class="has-dropdown not-click"><a href="#customer"><?php echo $account_data['name'];?></a>
        <ul class="dropdown">
            <li><a href="<?php echo site_url('admin/logout');?>">Logout</a></li>
        </ul>
    </li>
</ul>
</section>
</nav>
</div>

<div class="row">
    <div class="large-12 columns center-txt">
        <span class="radius alert label"><h2 class='white-txt'>Admin Page is still in the development progress.</h2></span>
    </div>
</div>
<?php// echo $footer;?>