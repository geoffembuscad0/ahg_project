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
            <li><a href="#home"><strong>Home</strong></a></li>
            <li><a id="aboutUs" href="#aboutUs"><strong>About</strong></a></li>
            <li><a id="ourProducts" href="#ourProducts"><strong>Our Products</strong></a></li>
            <li><a id="contactUs" href="#contactUs"><strong>Contact Us</strong></a></li>
        </ul>
        </section>
    </nav>
</div>

<div class="row">
    <div class="large-12 columns">
        <ul class="example-orbit-content" data-orbit>
            <li data-orbit-slide="headline-1">
                <div>
                    <h2>Upcoming Post</h2>
                    <h3>No recent post yet</h3>
                </div>
            </li> 
            <li data-orbit-slide="headline-2"> 
                <div class=""> 
                    <h2>Upcoming Post</h2> 
                    <h3>No recent post yet</h3> 
                </div> 
            </li>
            <li data-orbit-slide="headline-3"> 
                <div class=""> 
                    <h2>Upcoming Post</h2> 
                    <h3>No recent post yet</h3> 
                </div> 
            </li> 
        </ul>
    </div>    
</div>

<div id="aboutUs" class="row">
    <div class="large-12"><h1>About Us</h1></div>
</div>
<div class="row">
    <div class="large-6 columns color-rose">
        <h1 class="white-txt">The story so far</h1>
        <p class="small white-txt">
            It all started at room H405 around 6pm on last November 2013 when Prof. Val Guarin 
            formed a group of young IT practitioners to experience on how to become a successful entrepreneur.
            These young IT practitioners used 'Artisans Handy Gifts' as their business 
            organization name which means, gifts made by the hands of the artists and craftsman.            
        </p>
    </div>
    <div class="large-5 columns color-facebook">
        <h1 class="white-txt">The MVC<br><small class="white-txt"><b>M</b>ission, <b>V</b>ision & <b>C</b>ore Value</small>
        </h1>
        <p class='small white-txt'>
            The mission is simply to get the customers needs. The vision is to make a customer satisfied. The core value make our products more valuable to them.
        </p>
    </div>
</div><br>
<div class="row">
    <div class="large-10 large-centered columns color-ichigo">
        <h1 class="white-txt">Want to meet the people behind this?</h1>
        <p class="white-txt">Get to know them <a class="white-txt" href="<?php echo site_url("home/artisans");?>"><strong>now</strong></a>.</p>
    </div>
</div>

<div id="ourProducts" class="row">
    <div class="large-9 columns"><h1>Our Products</h1></div>
    <div class="large-3 columns">
        <a href="<?php echo $cutomize_link; ?>" class="button radius round" style="float:right;">Shop</a>
    </div>
</div>
<div class="row">
    <div class="large-6 columns color-rose">
        <h2 class="white-txt center-txt">Head Igniter</h2>
        <center>
        <img style="width:80%;" src="./assets/imgs/products/headigniter.jpg"/>
        <span class="success label"><h3>PHP 75.00</h3></span>
        </center>
        
    </div>

    <div class="large-6 columns color-ichigo">
        <h2 class="white-txt center-txt">Pick Of Destiny</h2>
        <center>
        <img style="width:80%;" src="./assets/imgs/products/pickofdestiny.JPG"/>
        <span class="success label"><h3>PHP 20.00</h3></span>
        </center>
        
    </div>
</div>

<div id="contactUs" class="row">
    <div class="large-12"><h1>Contact Us</h1></div>
</div>
<div class="row">
    <div class="large-8 columns color-facebook">
        <h2 class="white-txt">Message Us</h2>
        <form>
            <label for="subjectTxt" class="white-txt">Subject:</label>
            <input id="subjectTxt" type="text" placeholder="Subject"/>
            <label for="fromTxt" class="white-txt">From:</label>
            <input id="fromTxt" type="text" placeholder="From"/>
            <label class="white-txt">Message:</label>
            <textarea placeholder="Message"></textarea>
            <a href="#" class="button">Send</a>
        </form>
    </div>
    <div class="large-4 columns color-midnightblue">
        <h1 class="white-txt">Or follow us</h1>
        <ul class="no-bullet">
            <li><a href="https://www.facebook.com/artisanshandygifts"><img src="./assets/imgs/facebook_001.jpg"/></a></li>
        </ul>
    </div>
</div>
<?php echo $footer; ?>