<?php 
  include('./partials/header-visitor.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/cart-style.css" />
  </head>
  <body>
    <main>
      <!-- Cart Title Section Start -->
      <section class="title-sect">
        <?php
          include('partials/get-user-data.php');
        ?>
        <h1>SHOPPING CART</h1>
      </section>
      <!-- Cart Title Section End -->

      <!-- Cart List Section Start -->
      <section class="cart-list-sect">
      <ul>
        <?php
          // Get all Workshops with same User ID
          $get_cart_workshop_sql = "SELECT * FROM tb_user_cart WHERE user_id = '$get_user_info_user_id';";
          $get_cart_workshop_res = mysqli_query($conn, $get_cart_workshop_sql);
          $get_cart_workshop_count = mysqli_num_rows($get_cart_workshop_res);
          
          // Get Cart and "Workshops inside the Cart" Information
          while($get_cart_workshop_row = mysqli_fetch_assoc($get_cart_workshop_res)){
            // Get Cart Information
            $cart_workshop_info_workshop_id = $get_cart_workshop_row['workshop_id'];
            $cart_workshop_info_cart_guests = $get_cart_workshop_row['cart_guests'];
            $cart_workshop_info_cart_time = $get_cart_workshop_row['cart_time'];
            $cart_workshop_info_cart_date = $get_cart_workshop_row['cart_date'];

            // Get Workshop Information
            $get_cart_workshop_workhop_info_sql = "SELECT * FROM tb_workshop 
            WHERE workshop_id = '$cart_workshop_info_workshop_id'
            AND workshop_isActive = 'True'
            ;";
            $get_cart_workshop_workhop_info_res = mysqli_query($conn, $get_cart_workshop_workhop_info_sql);
            $get_cart_workshop_workhop_info_row = mysqli_fetch_assoc($get_cart_workshop_workhop_info_res);

            $cart_workshop_info_workshop_name = $get_cart_workshop_workhop_info_row['workshop_name'];
            $cart_workshop_info_workshop_addr = $get_cart_workshop_workhop_info_row['workshop_addr'];
            $cart_workshop_info_workshop_price = $get_cart_workshop_workhop_info_row['workshop_price'];

            // Get Workshop Image
            $get_cart_workshop_workhop_info_workshop_image_sql = "SELECT * FROM tb_workshop_images 
            WHERE workshop_id = '$cart_workshop_info_workshop_id'
            LIMIT 1;";
            
            $get_cart_workshop_workhop_info_workshop_image_res = mysqli_query($conn, $get_cart_workshop_workhop_info_workshop_image_sql);
            $get_cart_workshop_workhop_info_workshop_image_row = mysqli_fetch_assoc($get_cart_workshop_workhop_info_workshop_image_res);
            $cart_workshop_info_workshop_image = $get_cart_workshop_workhop_info_workshop_image_row['workshop_image'];

            // Put it in the HTML Item Design
            ?>
              <!-- ITEM DESIGN START -->
              <li>
                <div class="w-img-sect">
                  <div class="img-box">
                    <?php
                    if($cart_workshop_info_workshop_image == ""){
                      ?>
                      <img src="../admin//img/user/default-avatar.jpg" alt="" />
                      <?php
                    }else{
                      ?>
                      <img src="../admin/img/workshop/<?php echo $cart_workshop_info_workshop_image;?>" alt="" />
                      <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="w-desc-sect">
                  <h2><?php echo $cart_workshop_info_workshop_name; ?></h2>
                  <p class="w-location"><?php echo $cart_workshop_info_workshop_addr; ?></p>
                  <p class="w-description">
                    You have made a reservation for this workshop for <?php echo $cart_workshop_info_cart_guests; ?> guests on
                    <?php echo $cart_workshop_info_cart_date; ?>, at <?php echo $cart_workshop_info_cart_time; ?> WITA.
                  </p>
                </div>
                <div class="w-price-sect">
                  <p class="total-text">Total:</p>
                  <p class="w-price-text">Rp.
                    <?php
                      $workshop_total_price = $cart_workshop_info_workshop_price * $cart_workshop_info_cart_guests;
                      echo $workshop_total_price;
                    ?>
                  </p>
                </div>
              </li>
              <!-- ITEM DESIGN END -->
            <?php
          }
        ?>
        
          

        </ul>
      </section>
      <!-- Cart List Section End -->

      <!-- Buttons Section Start -->
      <section class="btn-sect">
        <div class="btn-wrapper">
          <a class="btn-continue-shopping" href="workshops.php">Continue Shopping</a>
          <a class="btn-checkout" href="checkout.php">Checkout</a>
        </div>
        <!-- Buttons Section End -->
      </section>
    </main>

<?php
include('partials/footer.php');
?>