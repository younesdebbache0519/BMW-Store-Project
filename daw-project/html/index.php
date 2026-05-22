<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/index.css" />
    <script src="../js/validation.js" defer></script>
    <title>HOME</title>
  </head>
  <body>
    <header>
      <h1><a href="index.php">BMW STORE</a></h1>
      <nav>
        <a href="index.php">Home</a>
        <a href="login.html">Login</a>
        <a href="inscription.html">Register</a>
      </nav>
    </header>
    <main>
      <h1 class="welcome-msg">
        Hello 
        <?php
        if (isset($_SESSION["first_name"])) {
          echo $_SESSION["first_name"]; 
        } else {
          echo "Guest";
        }
        ?> ! 👋
      </h1>
      <div id="cars_list">
        <div id="car_card1">
          <img src="../images/image1.png" alt="" />
          <h2 id="car_name">BMW M2 Competition</h2>
          <p id="car_price">50,000$</p>
          <a href="../html/html-products/commande_produit1.html">Buy Now</a>
        </div>
        <div id="car_card2">
          <img src="../images/image2.png" alt="" />
          <h2 id="car_name">BMW M8 Competition</h2>
          <p id="car_price">70,000$</p>
          <a href="../html/html-products/commande_produit2.html">Buy Now</a>
        </div>
        <div id="car_card3">
          <img src="../images/image3.png" alt="" />
          <h2 id="car_name">BMW X5M</h2>
          <p id="car_price">65,000$</p>
          <a href="../html/html-products/commande_produit3.html">Buy Now</a>
        </div>
        <div id="car_card4">
          <img src="../images/image4.png" alt="" />
          <h2 id="car_name">BMW M5 CS</h2>
          <p id="car_price">85,000$</p>
          <a href="../html/html-products/commande_produit4.html">Buy Now</a>
        </div>
      </div>
    </main>
    <footer>
      Developed by Younes Debbache - Group G04 - Farhat Abbas University - Setif
    </footer>
  </body>
</html>
