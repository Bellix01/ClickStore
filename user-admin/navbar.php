<?php
$var1 = false;
$flag = false;
if (isset($_SESSION["uid"])) {
    $var1 = true;
};
function toggel()
{
    return $flag = true;
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClickStore</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    
<div class="wait overlay">
    <div class="loader"></div>
</div>
<div class="super_container">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:clickstore1@gmail.com">clickstore1@gmail.com</a>
                        </div>
                        <div class="top_bar_content ml-auto">

                            <div class="top_bar_user" id="cart_container">
                
                                <?php 
                                if ($var1) : 
                                    ?>
                                    <ul class="standard_dropdown main_nav_dropdown "> 
                                        
                                      <li class="hassubs">
                                            <a href="cart.php" class="dropdown-toggle " data-toggle="dropdown">
                                             <img src="./user_avatar_images/man.png" width="40" height="40" class="rounded-circle">
                                            <?php 
                                            echo  $_SESSION["name"]; 
                                            ?>
                                            </a>
                                            <ul class="hii">           
                                                <li><a href="cart.php"> Panier</a></li>
                                                <li><a href="user_page.php">Profile</a></li>
                                                <li><a href="logout.php">Se déconnecter</a></li>

                                            </ul>
                                        </li>

                                     </ul>
                                    </ul>

                                <?php 
                                else : 
                                ?>
                                    <div class="user_icon">
                                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt="">
                                    </div>
                                    <div ><a href="customer_registration.php?register=1" >S'inscrire</a></div>

                                    <div><a href="login_form.php">S'identifier</a></div>
                                <?php
                                 endif;
                                 ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <!-- Header Main -->
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-3 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                    <div class="logo"><a href="index.php"><img src="logo/ClickStore (4).png" alt=""></a></div>
                            <!-- <div class="logo"><a href="index.php"><span class="blue">C</span>lick<span class="orange">S</span>hop</a></div> -->
                        </div>
                    </div> <!-- Search -->
                    <div class="col-lg-5 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">

                                        <input type="search" class="header_search_input" id="search" placeholder="Search for products...">
                                        <button id="search_btn" type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">

                                        <a href="cart.php">
                                            <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                            <div class="cart_count badge py-2"><span>3</span></div>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Main Navigation -->
        <nav id="_nav" class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="main_nav_content d-flex flex-row">
                            <!-- Categories Menu -->
                            <!-- Main Nav Menu -->
                            <div class="main_nav_menu">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="profile.php">Produits<i class="fas fa-chevron-down"></i></a></li>

                                    <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
    </header>
</div>

<script>
    function myFunction() {
        var element = document.body;
        var topBar = document.querySelector('.top_bar');
        var _nav = document.getElementById('_nav');
        var _footer = document.querySelector('footer');

    }
</script>
</body>
</html>