<?php
include('./dbconn/connection.php');
include('./partials/get-user-data.php');
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/acc-m-style.css" />
  </head>
  <body>
    <!-- Breadcrumbs Start -->
    <section class="breadcrumbs">
      <a href="home.php">
        <p>Jelajah</p>
      </a>
      <img src="img/acc-m-assets/breadcrumbs-arrow.png" alt="" />
      <p>Account</p>
    </section>
    <!-- Breadcrumbs End -->

    <!-- Account Header Start -->
    <section class="acc-header">
      <h1>Account</h1>
    </section>
    <!-- Account Header End -->

    <!-- Buttons  Start -->
    <main>
      <a href="acc-personal-info.php">
        <div class="personal-info-box">
          <img src="img/acc-m-assets/personal-icon.png" alt="" />
          <p>Personal Info</p>
        </div>
      </a>
      <a href="acc-levels-new.php">
        <div class="points-box">
          <img
            id="points-box-icon"
            src="img/acc-m-assets/points-icon.png"
            alt=""
          />
          <p>Points</p>
        </div>
      </a>
      <a href="acc-reservation.php">
        <div class="reservation-box">
          <img src="img/acc-m-assets/reservation-icon.png" alt="" />
          <p>Reservation</p>
        </div>
      </a>
      <a href="acc-wishlist.php">
        <div class="wishtlist-box">
          <img src="img/acc-m-assets/wishlist-icon.png" alt="" />
          <p>Wishlist</p>
        </div>
      </a>
      <a href="acc-history.php">
        <div class="progress-box">
          <img src="img/acc-m-assets/progress-icon.png" alt="" />
          <p>Progress</p>
        </div>
      </a>
      <a href="acc-accomplished.php">
        <div class="skills-box">
          <img src="img/acc-m-assets/skills-icon.png" alt="" />
          <p>Accomplished Skills</p>
        </div>
      </a>
    </main>
    <!-- Buttons End -->
  </body>
</html>
