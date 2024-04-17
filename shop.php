<?php
session_start();
// Calculate the total cart count
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $total = count($cart);
} else {
    $total = 0; // Default to 0 if the cart session variable is not set
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Home - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/stylee.css">
</head>
<body>
<header>
    <div class="logo">
        <a href="shop.php"><img src="images/logo.jpg" alt="Logo"></a>
    </div>
    <div id="menu-toggle" class="menu-icon">
        <div id="menu-icon-top"></div>
        <div id="menu-icon-middle"></div>
        <div id="menu-icon-bottom"></div>
    </div>        
    <nav>
        <ul>
            <li><a href="new-arrivals.php">New Arrivals</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="homeware.php">Homeware</a></li>
            <li><a href="sneaker.php">Sneaker Laundry</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>
    <div class="search-bar">
        <input type="text" placeholder="Search...">
        <button type="submit">Search</button>
    </div>
    <div class="user-actions">
        <?php        
        if (isset($_SESSION['user_email'])) {
            $userEmail = $_SESSION['user_email'];
            echo "Welcome, $userEmail ";
            echo '<a href="profile-page.php"><i class="fa-solid fa-user"></i></a>';
            echo '<a href="cart.php"><div class="cart-icon"><i class="fas fa-shopping-cart"> ' . $total . '</i></div></a>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="cart.php"><div class="cart-icon"><i class="fas fa-shopping-cart"> ' . $total . '</i></div></a>';
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</header>

<!------------------------------------------------------ Home Page Starts -------------------------------------------->
<section class="hero">
    <div class="container">
        <h1>New Arrivals <br></h1>
        <a>Discover the entire collection</a><br>
        <a href="new-arrivals.php"><button class="shop-now">Shop Now</button></a>
    </div>
</section>

<!------------------------------------------------------------ Shoes & Here to help Section  ---------------------------------------------------->
<section class="shoes">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="women.php" class="shoe-item">
                    <img class="img-fluid" src="my-imgs/Stevie v neck oversized jumper - navy stripe paris.jpg" alt="bubbly black and White sandals" style="height: 260px; width: 270px;">
                    <p class="link-overlay">Women</p>
                </a>
            </div>
            <div class="col">
                <a href="men.php" class="shoe-item">
                    <img class="img-fluid" src="my-imgs/S-ginn-g2 - black.jpg" alt="bubbly black and White sandals" style="height: 260px; width: 280px;">
                    <p class="link-overlay">Men</p>
                </a>
            </div>
            <div class="col">
                <a href="homeware.php" class="shoe-item">
                    <img class="img-fluid" src="my-imgs/Clear Drinking Glass with Glass Straw 3.jpg" alt="bubbly black and White sandals" style="height: 260px; width: 270px;">
                    <p class="link-overlay">Homeware</p>
                </a>
            </div>
            <div class="col">
                <a href="sneaker.php" class="shoe-item">
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1561808843-7adeb9606939?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=260&q=80" alt="exclusive green sneakers" style="width: 260px;">
                    <p class="link-overlay">Sneaker Laundry</p>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <h3 class="">Here to help</h3>
                <p class="">Have a question? You may find an answer in our <a class="link" href="let.php">FAQs.</a><br>
                    But you can also contact us:
                    <a class="link" href="tel:100-400-444">Call 100-400-444</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!------------------------------------------------------------ News/Blogs Section  -------------------------------------------------------->
<section class="news">
    <div class="section__container news__container">
        <h2 class="section__title">Latest News</h2>
        <div class="news__grid">
            <div class="news__card">
                <img src="my-imgs/1bonang.jpg" alt="News Image" class="news__image" />
                <div class="news__details">
                    <p class="news__meta">FASHION | Farah Khalfe | Aug 14, 2023</p>
                    <h4 class="news__title">GLAMOUR cover star Bonang Matheba stunned on the 2023 Miss SA stage</h4>
                    <div class="news__divider"></div>
                    <p class="news__description">They don’t call her the “Hostess with the Mostess” for nothing. Over the weekend, GLAMOUR cover star, Bonang Matheba returned to her rightful place on the Miss SA stage as the MC for the evening.
                    Now in its 65th year, the 2023 Miss SA pageant took place at the Sun Bet Arena in Pretoria on Sunday.</p>
                    <?php
                    if (isset($_SESSION['user_email'])) {
                        echo '<a href="article1.php" class="news__link">Read More <i class="ri-arrow-right-line"></i></a>';
                    } else {
                        echo '<a href="login.php" class="news__link">Log in to Read More <i class="ri-arrow-right-line"></i></a>';
                    }
                    ?>
                    </div>
                </div>

            
                <div class="news__card">
                    <img src="my-imgs/ora.jpg" alt="News Image" class="news__image" style="height: 310px;" />
                    <div class="news__details">
                        <p class="news__meta">STYLE | Tania Durand | Aug 22, 2023</p>
                        <h4 class="news__title">Orapeleng Modutle Haute Couture extraordinaire</h4>
                        <div class="news__divider"></div>
                        <p class "news__description">Fashion designer Orapeleng Modutle has built a career around custom-made garments. Building a brand and reputation for creating haute couture garments for some of the most recognized people on the African continent is no small feat. We find out what inspires his journey.</p>
                        <?php
                        if (isset($_SESSION['user_email'])) {
                            echo '<a href="article-4.php" class="news__link">Read More <i class="ri-arrow-right-line"></i></a>';
                        } else {
                            echo '<a href="login.php" class="news__link">Log in to Read More <i class="ri-arrow-right-line"></i></a>';
                        }
                        ?>
                    </div>
                </div>

                <div class="news__card">
                    <img src="my-imgs/glamour.jpg" alt="News Image" class="news__image" style="height: 310px;" />
                    <div class="news__details">
                        <p class="news__meta">TRENDS | Glamour SA | Oct 5, 2022</p>
                        <h4 class="news__title">Glamour's Best Street Style at South African Menswear Week SS23</h4>
                        <div class="news__divider"></div>
                        <p class="news__description">It was a fashionable South African Menswear Week both on and off the runway. From Stefania Morland, Ruff Tung to Redbat Posse, there were lots of fashion shows to see and get inspired by.
                            Here we have a look at the best street style looks from celebrities, models, actors, influencers, stylists, and more.</p>
                        <?php
                        if (isset($_SESSION['user_email'])) {
                            echo '<a href="article-3.php" class="news__link">Read More <i class="ri-arrow-right-line"></i></a>';
                        } else {
                            echo '<a href="login.php" class="news__link">Log in to Read More <i class="ri-arrow-right-line"></i></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>  
     </div>    
</section>

<!------------------------------------------------------- Footer ------------------------------------------------------>
<hr/>
<footer class="section__container footer__container">
  <div class="footer__col">
    <h4 class="footer__heading">CONTACT INFO</h4>
    <p><i class="ri-map-pin-2-fill"></i>The Zone @ Rosebank, Shop 106</p>
    <p><i class="ri-mail-fill"></i> queensandkings@streefashion.co.za</p>
    <p><i class="ri-phone-fill"></i> (+012) 3456 789</p>
  </div>
  <div class="footer__col">
    <h4 class="footer__heading">COMPANY</h4>
    <p>Home</p>
    <p>About Us</p>
    <!-- <p>Work With Us</p> -->
    <p>Our Blog</p>
    <p>Terms & Conditions</p>
  </div>
  <div class="footer__col">
    <h4 class="footer__heading">USEFUL LINK</h4>
    <p>New Arrivals</p>
    <p>Women</p>
    <p>Men</p>
    <p>Homeware</p>
    <p>Sneaker Laundry</p>
  </div>
  <div class="footer__col">
    <h4 class="footer__heading">Social Links</h4>
    <div class="instagram__grid">
        <a><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        <a><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>
    <div class="payment_img">
        <img src="my-imgs/pay.png" alt="" style="margin-top: 8%; width: 70%;">
    </div>
  </div>
</footer>
<hr/>
<div class="section__container footer__bar">
  <div class="copyright">
    Copyright © 2023 Queens & Kings Streetfashion. All rights reserved.
  </div>
  <div class="footer__form">
    <form>
      <input type="text" placeholder="ENTER YOUR EMAIL" />
      <button class="btn" type="submit">SUBSCRIBE</button>
    </form>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-icon');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('show-menu');
        });
    });
</script>

<script src="https://kit.fontawesome.com/c7cf5c000f.js" crossorigin="anonymous"></script>
</body>
</html>
