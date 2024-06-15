<!--Header Area Start Here -->
<style>
.error{
    color: red;
}
body > .skiptranslate {
    display: none;
}

.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
.goog-te-combo
{
    height: 50px;
    width: 100%;
    font-size: 15pt;
}

.goog-te-gadget{
    color:#fff;
}
.goog-logo-link
{
  display: none !important;   
}
/*@media print {
  #google_translate_element {display: none;}
}*/
</style>  
        <header class="main-header-area">
            <!-- Header Top Area Start Here -->
            <div class="header-top-area">
                <div class="container container-default-2 custom-area">
                    <div class="row">
                        <div class="col-12 col-custom header-top-wrapper text-center">
                            <div class="short-desc text-white">
                                <p>Please select your preferred language </p>
                            </div>
                            <div class="header-top-button">
                                 <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                           Select 
                                        </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Main Header Area Start -->
            <div class="main-header">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom" style="padding-right: 9px;
    padding-left: 9px;">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                                    <div class="header-logo d-flex align-items-center">
                                        <a href="index.php">
                                            <img class="img-full" src="assets\images\logo\F1.png" alt="Header Logo" style="width: 100%">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-xl-7 position-static d-none d-lg-block col-custom">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul class="nav">
                                            
                                             <li><a href="dailyrates.php">Daily Rates</a></li>
                                             <li><a href="weather.php">Farming Advice</a></li>
											
											 <li><a href="coldstorage.php">ColdStore</a></li>
                                           
                                            <li>
                                                <a href="#">
                                                    <span class="menu-text"> Other</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
													<li><a href="about-us.php">About</a></li>
                                                     <li><a href="faq.php">FAQ</a></li>
                                                     <?php if(isset($_SESSION['login'])){ ?>
                                                    <li><a href="my-account.php">My Account</a></li>
                                                    <li><a href="plantdiseases.php">Plant Diseases</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact-us.php">
                                                    <span class="menu-text">Contact</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-1 col-xl-3 col-sm-6 col-6 col-custom">
                                    <div class="header-right-area main-nav">
                                        <ul class="nav">
                                            <?php if(isset($_SESSION['login'])){ ?>
                                            <li class="login-register-wrap d-none d-xl-flex">
                                                <span><?php echo ucwords($_SESSION['username']); ?></span>
                                                <span><a href="logout.php">Logout</a></span>
                                            </li>
                                               <?php } else { ?> 
                                            <li class="login-register-wrap d-none d-xl-flex">
                                                <span><a href="login.php">Login</a></span>
                                                <span><a href="register.php">Register</a></span>
                                            </li>
                                                <?php }  ?>
                                            <li class="mobile-menu-btn d-lg-none">
                                                <a class="off-canvas-btn" href="#">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Header Area End -->
            <!-- Sticky Header Start Here-->
            <div class="main-header header-sticky">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                                    <div class="header-logo">
                                        <a href="index.php">
                                            <img class="img-full" src="assets/images/logo/F1.png" alt="Header Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                                   <nav class="main-nav d-flex justify-content-center">
                                        <ul class="nav">
                                            
                                             <li><a href="dailyrates.php">Daily Rates</a></li>
                                             <li><a href="weather.php">Farming Advice</a></li>
                                            
                                             <li><a href="coldstorage.php">ColdStore</a></li>
                                           
                                            <li>
                                                <a href="#">
                                                    <span class="menu-text"> Other</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    <li><a href="about-us.php">About</a></li>
                                                     <li><a href="faq.php">FAQ</a></li>
                                                     <?php if(isset($_SESSION['login'])){ ?>
                                                    <li><a href="my-account.php">My Account</a></li>
                                                    <li><a href="plantdiseases.php">Plant Diseases</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact-us.php">
                                                    <span class="menu-text">Contact</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                                    <div class="header-right-area main-nav">
                                        <ul class="nav">
                                            <?php if(isset($_SESSION['login'])){ ?>
                                            <li class="login-register-wrap d-none d-xl-flex">
                                                <span><?php echo ucwords($_SESSION['username']); ?></span>
                                                <span><a href="logout.php">Logout</a></span>
                                            </li>
                                               <?php } else { ?> 
                                            <li class="login-register-wrap d-none d-xl-flex">
                                                <span><a href="login.php">Login</a></span>
                                                <span><a href="register.php">Register</a></span>
                                            </li>
                                                <?php }  ?>
                                            <li class="mobile-menu-btn d-lg-none">
                                                <a class="off-canvas-btn" href="#">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sticky Header End Here -->
            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper" id="mobileMenu">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form>
                                <input type="text" placeholder="Search product...">
                                <button class="search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="dailyrates.php">Daily Rates</a></li>
                                    <li><a href="weather.php">Farming Advice</a></li>
                                    <li><a href="coldstorage.php">ColdStore</a></li>
                                           
                                    <li class="menu-item-has-children "><a href="#">Other</a>
                                        <ul class="dropdown">
                                            <li><a href="about-us.php">About</a></li>
                                            <li><a href="faq.php">FAQ</a></li>
                                             <?php if(isset($_SESSION['login'])){ ?>
                                            <li><a href="my-account.php">My Account</a></li>
                                        <?php } ?>
                                        </ul>
                                    </li>
                                   
                                    <li><a href="contact-us.php">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->
                        <div class="header-top-settings offcanvas-curreny-lang-support">
                            <!-- mobile menu navigation start -->
                            <nav>
                     
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">My Account</a>
                                        <ul class="dropdown">
                                             <?php if(isset($_SESSION['login'])){ ?>
                                            <li><?php echo ucwords($_SESSION['username']); ?></li>
                                            <li><a href="logout.php">Logout</a></li>
                                             <?php } else { ?> 
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="Register.php">Register</a></li>
                                             <?php }  ?>
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- offcanvas widget area start -->
                      
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
        </header>
        <!-- Header Area End Here