<?php
include('partials/header-visitor.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/checkout-style.css" />
  </head>
  <body>

    <!-- CHECKOUT BANNER START -->
    <div class="checkout-banner">
      <?php
          include('partials/get-user-data.php');
        ?>
      <h2 style="font-weight: bold;">CHECKOUT</h2>
    </div>
    <!-- CHECKOUT BANNER END -->

    <main>
      <!-- BREADCRUMBS START -->
      <section class="breadcrumbs">
        <a href=""
          ><img
            src="img/checkout-page/breadcrumbs-home-icon.png"
            alt=""
            class="breadcrumbs-home-icon"
        /></a>

        <a href="">Home</a>
        <img
          src="img/checkout-page/breadcrumbs-arrow.png"
          alt=""
          class="breadcrumbs-arrow"
        />
        <p>Checkout</p>
      </section>
      <!-- BREADCRUMBS END -->

      <!-- FORM START -->
      <form action="" method="post">
        <!-- ITEM LIST START -->
        <section class="items-list">
          <ul>
          <?php
          // Get all Workshops with same User ID
          $get_cart_workshop_sql = "SELECT * FROM tb_user_cart WHERE user_id = '$get_user_info_user_id';";
          $get_cart_workshop_res = mysqli_query($conn, $get_cart_workshop_sql);
          $get_cart_workshop_count = mysqli_num_rows($get_cart_workshop_res);
          // Get Cart and "Workshops inside the Cart" Information
          while($get_cart_workshop_row = mysqli_fetch_assoc($get_cart_workshop_res)){
            // Get Cart Information
            $cart_workshop_info_cart_id = $get_cart_workshop_row['user_cart_id'];
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

            <!-- Item Box Design Start -->
            <li class="item-box">
              <div class="checkbox-container">
                <input type="checkbox" name="item-1-check" id="" />
              </div>
              <div class="image-container">
                <div class="image-container-inner">
                  <?php if($cart_workshop_info_workshop_image == ""){
                    ?>
                    <img src="img/checkout-page/item-1.jpg" alt="" />
                    <?php
                  }else{
                    ?>
                    <img src="../admin/img/workshop/<?php echo $cart_workshop_info_workshop_image;?>" alt="" />
                    <?php
                  }
                    ?>
                  
                </div>
              </div>

              <div class="item-desc">
                <p class="item-price-hidden" style="display: none;"><?php echo $cart_workshop_info_workshop_price;?></p>
                <div class="item-desc-left">
                  <h1 class="item-title"><?php echo $cart_workshop_info_workshop_name;?></h1>
                  <p class="item-pick-date">Pick your date</p>
                  <div class="item-amm-box">
                    <button class="reduce-amm" type="button">-</button>
                    <p class="item-amm"><?php echo (int)$cart_workshop_info_cart_guests; ?></p>
                    <button class="add-amm" type="button">+</button>
                  </div>
                </div>
                <div class="item-desc-right">
                  <p class="item-date"><?php echo $cart_workshop_info_cart_date;?></p>
                  <div class="item-price">
                    <div>Rp.</div>
                    <div class="item-price-num"><?php
                  
                  $total_item_price = $cart_workshop_info_cart_guests*$cart_workshop_info_workshop_price;
                  echo $total_item_price;

                  ?></div>
                  </div>
                </div>
              </div>
              <a class="item-remove" href="actions/remove-cart-item.php?cart_id=<?php echo $cart_workshop_info_cart_id;?>">
              </a>
            </li>
          <!-- Item Box Design End -->
            <?php
          }
        ?>

            
            
          </ul>
        </section>
        <!-- ITEM LIST END -->

        <!-- BILLING INFO START -->
        <section class="billing-addr">
          <h2>Billing Address</h2>
          <div class="billing-name">
            <label for="firstname">Firstname</label>
            <input
              class="billing-firstname"
              type="text"
              name="firstname"
              id="firstname"
            />
            <label for="lastname">Lastname</label>
            <input
              class="billing-lastname"
              type="text"
              name="lastname"
              id="lastname"
            />
          </div>

          <div class="billing-email-container">
            <label for="emailaddr">Email Address</label>
            <input type="email" name="emailaddr" id="emailaddr" />
          </div>
          <div class="billing-addr1-container">
            <label for="straddr-1">Street Address</label>
            <input type="text" name="straddr-1" id="straddr-1" />
          </div>
          <div class="billing-addr2-container">
            <input type="text" name="straddr-2" id="" />
          </div>
          <div class="state-city">
            <label for="state">State</label>
            <input class="billing-state" type="text" name="state" id="state" />
            <label for="city">City</label>
            <input class="billing-city" type="text" name="city" id="city" />
          </div>
          <div class="zip-phone">
            <label for="zip">Zip/Postal Code</label>
            <input class="billing-zip" type="text" name="zip" id="zip" />
            <label for="phone">Phone</label>
            <input class="billing-phone" type="tel" name="phone" id="phone" />
          </div>

          <ul>
            <li>
              <input type="checkbox" name="" id="same-addr-check" />
              <p class="billing-text">
                My billing and shipping address are the same
              </p>
            </li>
            <li>
              <input type="checkbox" name="" id="create-acc" />
              <p class="billing-text">Create an account for later use</p>
            </li>
          </ul>
        </section>
        <!-- BILLING INFO END -->

        <!-- PAYMENT METHOD START -->
        <section class="payment-method">
          <label for="payment-select">Payment Method</label>
          <select name="payment-select" id="payment-select">
            <option value="0">Paymment Method 1</option>
            <option value="1">Paymment Method 2</option>
            <option value="2">Paymment Method 3</option>
          </select>
        </section>
        <!-- PAYMENT METHOD END -->

        <!-- PAYMENT SUMMARY START -->
        <section class="payment-summ">
          <h1>Billing Summary</h1>
          <table class="payment-count">
            <colgroup>
              <col style="width: 70%" />
              <col style="width: 30%" />
            </colgroup>
            <tr>
              <td class="payment-subtotal">Subtotal</td>
              <td class="payment-subtotal-val">Rp 300,000</td>
            </tr>
            <tr>
              <td class="payment-discount">Discount</td>
              <td class="payment-discount-val">0</td>
            </tr>
            <tr>
              <td class="payment-shipping">Shipping</td>
              <td class="payment-shipping-val">Rp. 25,000</td>
            </tr>
            <tr>
              <td class="payment-tax">Tax</td>
              <td class="payment-tax-val">Rp. 5,000</td>
            </tr>
          </table>
          <div class="line"></div>
          <table class="grand-total">
            <colgroup>
              <col style="width: 70%" />
              <col style="width: 30%" />
            </colgroup>
            <tr>
              <td class="grand-total-label">Grand Total</td>
              <td class="grand-total-val">Rp.330,000</td>
            </tr>
          </table>
          <div class="payment-notes-container">
            <label for="payment-notes">Payment Notes</label>
            <textarea
              class="payment-notes"
              name="payment-notes"
              id="payment-notes"
              cols="30"
              rows="10"
            ></textarea>
          </div>

          <ul class="privacy-terms">
            <input
              type="checkbox"
              name="privacy-terms-check"
              id="privacy-terms-check"
            />
            <p class="privacy-terms-text">
              Please check to acknowledge our Privay & Terms Policy
            </p>
          </ul>
        </section>
        <!-- PAYMENT SUMMARY END -->

        <!-- SUBMIT FORMS BUTTON START -->
        <div class="submit-container">
          <input type="submit" value="CHECKOUT" />
        </div>
        <!-- SUBMIT FORMS BUTTON END -->
      </form>
      <!-- FORM END -->
    </main>

    <script src="js/checkout-js.js"></script>
<?php
  include('partials/footer.php');
?>
