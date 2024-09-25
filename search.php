<?php

$servername = "localhost:3315";
$username = "root";
$password = "";
$dbname = "ciel_ecommerce";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';


$sql = "SELECT * FROM product_db WHERE product_name LIKE '%$query%'";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/search.css" />

    <title>My search -CIEL</title>
    </head>
  <body>
   
    <header class="header">
      <div class="header__top">
        <div class="header__container container">
          <div class="header__contact">
            <span>(+94) - 77 - 1234 - 5678</span>

            <span> Contact Us</span>
          </div>

          <p class="header__alert-news">
            Flash Sale - Enter using coupons
          </p>

          <a href="loginN.php" class="header__top-action">
            Sign In / Sign Up
          </a>
        </div>
      </div>

      <nav class="nav container">
        <a href="index.html" class="nav__logo">
          <img src="assets/img/ciel-removebg.png" alt="" class="nav__logo-img" />
        </a>

        <div class="nav__menu" id="nav-menu">
          <div class="nav__menu-top">
            <a href="index.html" class="nav__menu-logo">
              <img src="assets/img/ciel-removebg.png" alt="" />
            </a>

            <div class="nav__close" id="nav-close">
              <i class="fi fi-rs-cross-small"></i>
            </div>
          </div>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.html" class="nav__link active-link">Home</a>
            </li>

            <li class="nav__item">
              <a href="shop.html" class="nav__link">Shop</a>
            </li>

            <li class="nav__item">
              <a href="accounts.php" class="nav__link">My Account</a>
            </li>

            <li class="nav__item">
              <a href="compare.html" class="nav__link">Compare</a>
            </li>

            <li class="nav__item">
              <!-- <a href="login-register.html" class="nav__link">Login</a>-->
               <a href="loginN.php" class="nav__link">Login</a>   
            </li>
          </ul>

          <div class="header__search">
            <form action="search.php" method="GET">
            <input
              type="text"
              name="query"
              placeholder="Search for items..."
              class="form__input"
              autocomplete="on"
            />

            <button class="search__btn">
              <img src="assets/img/search.png" alt="" />
            </button>
            </form>
          </div>
        </div>

        <div class="header__user-actions">
          <a href="wishlist.php" class="header__action-btn">
            <img src="assets/img/heart icon.png" alt="" />
            <span class="count">1</span>
          </a>

          <a href="cart.php" class="header__action-btn">
            <img src="assets/img/cart-icon.png" alt="" />
            <span class="count">2</span>
          </a>

          <div class="header__action-btn nav__toggle" id="nav-toggle">
            <img src="#" alt="">
          </div>
        </div>
      </nav>
    </header>

<body>
<div class="container">
        <div class="search-results">
            <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
            <div class="items">
                <?php
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='item'>";
                        echo "<a href='details.php?id=" . htmlspecialchars($row["id"]) . "'>";
                        echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["product_name"]) . "' />";
                        echo "<h2>" . htmlspecialchars($row["product_name"]) . "</h2>";
                        echo "<p class='price'>Price: Rs." . htmlspecialchars($row["price"]) . "</p>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found</p>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
          
    <section class="newsletter section home__newsletter">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
            <img
              src="assets/img/icon-email.svg"
              alt=""
              class="newsletter__icon"
            />
            Sign up to Newsletter
          </h3>

          <p class="newsletter__description">
            ...and receive Rs.1000 coupon for first shopping.
          </p>

          <form action="" class="newsletter__form">
            <input
              type="text"
              placeholder="Enter your email"
              class="newsletter__input"
            />
            <button type="submit" class="newsletter__btn">Subscribe</button>
          </form>
        </div>
      </section>
    </main>

   
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.html" class="footer__logo">
            <img src="assets/img/ciel-removebg.png" alt="" class="footer__logo-img" />
          </a>

          <h4 class="footer__subtitle">Contact</h4>

          <p class="footer__description">
            <span>Address:</span> 1079-1081 Maradana Road, Colombo
          </p>

          <p class="footer__description">
            <span>Phone:</span> (+94) 112 345 678 / 0112 345 987
          </p>

          <p class="footer__description">
            <span>Hours:</span> 09:00 - 19:00, Mon - Sat
          </p>

          <div class="footer__social">
            <h4 class="footer__subtitle">Follow Me</h4>

            <div class="footer__social-links flex">
              <a href="">
                <img
                  src="assets/img/icon-facebook.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>

              <a href="">
                <img
                  src="assets/img/icon-twitter.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>

              <a href="">
                <img
                  src="assets/img/icon-instagram.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>

              <a href="">
                <img
                  src="assets/img/icon-pinterest.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>

              <a href="">
                <img
                  src="assets/img/icon-youtube.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
            </div>
          </div>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Address</h3>

          <ul class="footer__links">
            <li><a href="aboutus.html" class="footer__link">About Us</a></li>
            <li><a href="delInfo.html" class="footer__link">Delivery Information</a></li>
            <li><a href="privacypolicy.html" class="footer__link">Privacy Policy</a></li>
            <li><a href="terms.html" class="footer__link">Terms & Conditions</a></li>
            <li><a href="contact.html"class="footer__link">Contact Us</a></li>
          </ul>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">My Account</h3>

          <ul class="footer__links">
            <li><a href="login.php" class="footer__link">Sign In</a></li>
            <li><a href="cart.php" class="footer__link">View Cart</a></li>
            <li><a href="wishlist.php" class="footer__link">My Wishlist</a></li>
            <li><a href="accounts.html" class="footer__link">Track My Order</a></li>
            <li><a href="helpcenter.html" class="footer__link">Help</a></li>
          </ul>
        </div>

        <div class="footer__content">
          <h3 class="footer__title">Secured Payment Gateways</h3>

          <img
            src="assets/img/payment-method.png"
            alt=""
            class="payment__img"
          />
        </div>
      </div>

      <div class="footer__bottom">
        <p class="copyright">&copy; 2024 CIEL. All rights reserved</p>
        <span class="designer">Designed by Group 30</span>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

   
    <script src="assets/js/script.js"></script>
    <script src="assets/js/search.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
    const searchQuery = "<?php echo htmlspecialchars($query); ?>";
    if (searchQuery) {
        const items = document.querySelectorAll('.item h2');
        items.forEach(item => {
            item.innerHTML = item.innerHTML.replace(new RegExp(searchQuery, 'gi'), match => {
                return `<span class="highlight">${match}</span>`;
            });
        });
    }
});

    </script>
</body>
</html>