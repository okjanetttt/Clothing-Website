<?php
session_start()
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Article - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/article5.css">
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
            <li><a href="homeware.php" class="active">Homeware</a></li>
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

<!------------------------------ Article Header -------------------------->
<header>
    <h1 class="heading-1">Urban Majesty</h1>
    <!-- <hr> -->
    <div class="sub-heading">
        <p>Friday, <span>Aug 22, 2023</span></p>
        <p class="important">Tania Durand</p>
    </div>
</header>

<main class="main">
    <section class="interview-container">
        <div class="interview">
            <h1>Orapeleng Modutle: A Fashion Journey of Creativity and Luxury</h1>
            <img src="my-imgs/ora.jpg" alt="Orapeleng Modutle" style="max-width: 100%; height: 600px;">
            <p> In the world of fashion, there are designers, and then there are visionaries. Orapeleng Modutle falls into the latter category. Known for his creative genius and his extraordinary designs, he has become a prominent figure in the fashion industry. In an exclusive interview, we had the chance to get a glimpse into the mind and motivation of this talented designer.</p>

            <p> <strong>The Path to Fashion</strong><br> Orapeleng Modutle, known simply as "OM," describes himself as humble, creative, and an extraordinaire. His journey into fashion began with a pivotal moment during a high school career exhibition. There, he had the privilege of meeting the legendary David Tlale, a figure he had admired for years. It was this encounter that ignited the spark of passion for fashion within him.</p>

            <p> When asked about the support he received from family and friends, OM shares, "My mom was very supportive. My brother was a bit skeptical, but once I had proven to him that one can build a solid career through fashion, he held my hand and made sure that I was equipped to start my own fashion business."</p>

            <p> <strong>Education and Expertise</strong><br> To hone his skills, OM pursued a formal education in fashion design at the Tshwane University of Technology. This foundation provided him with the technical knowledge needed to bring his creative visions to life.</p>

            <div class="image-container">
                <img src="my-imgs/oraa.jpg" alt="Orapeleng Modutle dress">
                <img src="my-imgs/boity.jpg" alt="Boity wearing Orapeleng Modutle dress">
            </div>

            <p> <strong>Inspiration and Design Philosophy</strong><br> OM's designs are a testament to his love for enhancing the beauty of the female form. He draws inspiration from the women in his life, particularly his mother and grandmother, who always emphasized the importance of a well-defined waist. His designs are a celebration of the African woman's body, with a focus on waist definition and body shape enhancement.</p>

            <p> Intricate and time-consuming, OM's creations are the result of both his creative prowess and the collaborative efforts with his clients. He emphasizes that getting to know the client is an essential part of the design process, with their personality playing a crucial role in shaping the final product.</p>

            <p> <strong>Aspirations and Challenges</strong><br> Orapeleng Modutle has always aimed high. His goal was to create red carpet-worthy dresses from the beginning. He envisions the "OM woman" as someone who exudes opulence and luxury. However, this journey has not been without its challenges. Starting a business in the fashion industry is far from easy, and even as his career has grown, OM acknowledges the hurdles he has encountered along the way.</p>

            <p> <strong>The Ultimate Dream</strong><br> When asked about a dream he's yet to fulfill, OM's eyes light up. "Yes, I do," he says, "and it has to be Kim Kardashian." He envisions one of his creations gracing the iconic curves of the global celebrity on a red carpet.</p>

            <p> <strong>A Changing Landscape</strong><br> The African fashion landscape is evolving rapidly, and OM is excited to be a part of it. He acknowledges the significant growth in the development of fashion in Africa and the rising influence of young designers on the global stage.</p>

            <p> In a world of ever-changing fashion trends and styles, Orapeleng Modutle's designs stand out for their timeless elegance and African-inspired luxury. His journey from a high school encounter with a fashion legend to becoming a sought-after designer is a testament to his creativity, dedication, and the ability to define the beauty of the African woman. As his career continues to flourish, we eagerly await the day when one of his creations graces the red carpet, fulfilling a dream shared by fashion enthusiasts worldwide.</p>

            <div class="image-container">
                <img src="my-imgs/oraa.jpg" alt="Orapeleng Modutle dress">
                <img src="my-imgs/boity.jpg" alt="Boity wearing Orapeleng Modutle dress">
            </div>
        </div>
    </section>
</main>
<hr>

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