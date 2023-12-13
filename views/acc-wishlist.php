<?php
include('dbconn/connection.php');
include('partials/get-user-data.php');

$get_user_wishlist_sql = "SELECT * FROM tb_user_wishlist WHERE user_id = '$get_user_info_user_id';";
$get_user_wishlist_res = mysqli_query($conn, $get_user_wishlist_sql);
$get_user_wishlist_count = mysqli_num_rows($get_user_wishlist_res);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/acc-w.css" />
    <title>Document</title>
  </head>
  <body>
    <section class="upper">
      <!-- Breadcrumbs Start -->
      <section class="breadcrumbs">
        <a href="acc-management.php">
          <p>Account</p>
        </a>
        <img src="img/acc-m-assets/breadcrumbs-arrow.png" alt="" />
        <p>Wishlist</p>
      </section>
      <!-- Breadcrumbs End -->

      <!--  Header Start -->
      <section class="acc-header">
        <h1>Wishlist</h1>
      </section>
      <!--  Header End -->
    </section>
    <!-- Wihslist Banner Start -->
    <section class="w-banner">
      <h1>Workshop Wishlist</h1>
    </section>
    <!-- Wihslist Banner End -->

    <main class="">
      <!-- Wihslist Counter Start -->
      <section class="w-counter">
        <p>Hi <?php echo $get_user_info_user_name;?>, you saved <?php echo $get_user_wishlist_count;?> workshops from Jelajah!</p>
      </section>
      <!-- Wihslist Counter End -->

      <form action="" method="post">
      <!-- Wihslist List Start -->
      <section class="w-list">
        <ul>
          <?php
          while($get_user_wishlist_row = mysqli_fetch_assoc($get_user_wishlist_res)){
            $user_wishlist_wishlist_id = $get_user_wishlist_row['wishlist_id'];
            $user_wishlist_workshop_id = $get_user_wishlist_row['workshop_id'];

            // Get Workshop Information
            $get_wishlist_workshop_workhop_info_sql = "SELECT * FROM tb_workshop 
            WHERE workshop_id = '$user_wishlist_workshop_id'
            AND workshop_isActive = 'True'
            ;";

            $get_wishlist_workshop_workhop_info_res = mysqli_query($conn, $get_wishlist_workshop_workhop_info_sql);
            $get_wishlist_workshop_workhop_info_row = mysqli_fetch_assoc($get_wishlist_workshop_workhop_info_res);

            $wishlist_workshop_info_workshop_name = $get_wishlist_workshop_workhop_info_row['workshop_name'];
            $wishlist_workshop_info_workshop_addr = $get_wishlist_workshop_workhop_info_row['workshop_addr'];
            $wishlist_workshop_info_workshop_price = $get_wishlist_workshop_workhop_info_row['workshop_price'];

            // Get Workshop Image
            $get_wishlist_workshop_workhop_info_workshop_image_sql = "SELECT * FROM tb_workshop_images 
            WHERE workshop_id = '$user_wishlist_workshop_id'
            LIMIT 1;";
            
            $get_wishlist_workshop_workhop_info_workshop_image_res = mysqli_query($conn, $get_wishlist_workshop_workhop_info_workshop_image_sql);
            $get_wishlist_workshop_workhop_info_workshop_image_row = mysqli_fetch_assoc($get_wishlist_workshop_workhop_info_workshop_image_res);
            $wishlist_workshop_info_workshop_image = $get_wishlist_workshop_workhop_info_workshop_image_row['workshop_image'];
            ?>

            <!-- Wishlist Item Design Start -->
            <li class="w-item-box">
              <p class="w-item-price-hidden" style="display: none;"><?php echo $wishlist_workshop_info_workshop_price;?></p>
              <a href="actions\remove-wishlist-item.php?workshop_id=<?php echo $user_wishlist_workshop_id;?>">
                <button class="popup-close-btn" id="popup-btn" type="button"></button>
              </a>
              <div class="w-item-icon">
                <input type="checkbox" name="wishlist_id[]" id="" value="<?php echo $user_wishlist_wishlist_id;?>">
                <!-- <img src="./img/acc-m-assets/wishlist-list.png" alt="" /> -->
              </div>
              <div class="w-item-img">
                <div class="w-item-img-box">
                  <?php
                  if($wishlist_workshop_info_workshop_image == ""){
                    ?>
                    <img src="./img/acc-m-assets/default-avatar.jpg" alt="" />
                    <?php
                  }else{
                    ?>
                    <img src="../admin/img/workshop/<?php echo $wishlist_workshop_info_workshop_image;?>" alt="" />
                    <?php
                  }
                  ?>
                  

                </div>
              </div>
              <div class="w-item-desc">
                <h1><?php echo $wishlist_workshop_info_workshop_name;?></h1>
                <h2><?php echo $wishlist_workshop_info_workshop_addr;?></h2>
                <div class="w-item-counter">
                  <button class="reduce-amm" type="button">-</button>
                  <!-- <p class="item-amm">1</p> -->
                    <input class="item-amm" name="cart_guests[]" type="number" name="" id="" value="1" readonly>
                  <button class="add-amm" type="button">+</button>
                </div>
              </div>
              <div class="w-item-price">
                <div>Rp.</div>
                <div class="item-price-num">
                  <?php echo $wishlist_workshop_info_workshop_price;?>
                </div>
              </div>
            </li>
            <!-- Wishlist Item Design End -->

            <?php
          }
          ?>
        </ul>
      </section>
      <!-- Wihslist List End -->
      

      <!-- Reserve Now Button -->
      <section class="reserve-now-btn-sect">
        <button class="reserve-now-btn">Reserve Now</button>
      </section>
      </form>
    </main>
    <script src="js/wishlist.js"></script>

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted and 'wishlist_id' and 'cart_guests' are set
    if (isset($_POST['wishlist_id']) && isset($_POST['cart_guests'])) {
        // Get the selected items' wishlist_id and cart_guests values
        $selectedWishlistIds = $_POST['wishlist_id'];
        $selectedCartGuests = $_POST['cart_guests'];

        // Loop through the selected items and process the data
        for ($i = 0; $i < count($selectedWishlistIds); $i++) {
            $wishlistId = $selectedWishlistIds[$i];
            $cartGuests = (int)$selectedCartGuests[$i];

            // Get Workshop ID of the Wishlist Item's Workshop
            $get_wishlist_workshop_id_sql = "SELECT workshop_id FROM tb_user_wishlist WHERE wishlist_id = $wishlistId;";
            $get_wishlist_workshop_id_res = mysqli_query($conn, $get_wishlist_workshop_id_sql);
            $get_wishlist_workshop_id_row = mysqli_fetch_assoc($get_wishlist_workshop_id_res);

            $add_wishlist_to_cart_workshop_id = $get_wishlist_workshop_id_row['workshop_id'];

            // Add Selected Items to the Cart
            $add_wishlist_to_cart_sql = "INSERT INTO tb_user_cart SET
            workshop_id = '$add_wishlist_to_cart_workshop_id',
            user_id = '$get_user_info_user_id',
            cart_guests = $cartGuests
            ;";

            $add_wishlist_to_cart_res = mysqli_query($conn, $add_wishlist_to_cart_sql);

            // Remove Selected Items from Wishlist
            $remove_wishlist_sql = "DELETE FROM tb_user_wishlist WHERE wishlist_id = '$wishlistId';";
            $remove_wishlist_res = mysqli_query($conn, $remove_wishlist_sql);

            if(!$add_wishlist_to_cart_res || !$remove_wishlist_res){
              die();
            }
        }

        if($add_wishlist_to_cart_res && $remove_wishlist_res){
          echo "<script type='text/javascript'>window.location.href='cart.php';</script>";
          die();
        }

    } else {
        echo "No items selected.";
    }
}
?>

  </body>
</html>
