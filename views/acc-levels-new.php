<?php
include('dbconn/connection.php');
include('partials/get-user-data.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../views/css/acc-levels-new.css" />
  </head>
  <body>
    <!-- Breadcrumbs Start -->
    <section class="breadcrumbs">
      <a href="acc-management.php">
        <p>Account</p>
      </a>
      <img src="img/acc-m-assets/breadcrumbs-arrow.png" alt="" />
      <p>Points</p>
    </section>
    <!-- Breadcrumbs End -->

    <!-- Account Header Start -->
    <section class="acc-header">
      <h1>Points</h1>
    </section>
    <!-- Account Header End -->

    <main class="">
      <!-- Levels Box Start -->
      <section class="levels-box">
        <div class="levels-box-titles-sect">
          <h1><?php echo $get_user_info_user_name; ?>, you're at Penjelajah Level 1!</h1>
          <h2>
            Complete 5 workshops to unlock Penjelajah Level 2 travel rewards.
          </h2>
        </div>
        <div class="img-sect">
          <div class="img-box">
            <img
              src="../views/img/acc-m-assets/acc-levels-assets/level1_1.png"
              alt=""
            />
          </div>
        </div>
      </section>
      <!-- Levels Box End -->

      <!-- Levels Explain Start -->
      <section class="levels-explain">
        <div class="levels-explain-title">
          <h1>Discover levels for your Workshop rewards</h1>
          <h2>
            Each workshop you join counts toward your progress in the program.
            Once unlocked, your discounts and workshop rewards are yours.
          </h2>
          <img
            src="../views/img/acc-m-assets/acc-levels-assets/Level_Info.jpg"
            alt=""
          />
        </div>
      </section>
      <!-- Levels Explain End -->
    </main>
  </body>
</html>
