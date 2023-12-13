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
    <link rel="stylesheet" href="css/p-inf-style.css" />
  </head>
  <body>
    <main>
      <div class="left-half">
        <!-- Breadcrumbs Start -->
        <section class="breadcrumbs">
          <a href="acc-management.php">
            <p>Account</p>
          </a>
          <img src="img/acc-m-assets/breadcrumbs-arrow.png" alt="" />
          <p>Personal Info</p>
          
        </section>
        <!-- Breadcrumbs End -->

        <!--  Header Start -->
        <section class="acc-header">
          <h1>Personal Info</h1>
        </section>
        <?php
        if(isset($_SESSION['acc-p-info'])){
          echo $_SESSION['acc-p-info'];
          unset($_SESSION['acc-p-info']);
        }
          // if(isset($_SESSION['edit-user-profile'])){
          //   echo $_SESSION['edit-user-profile'];
          //   unset($_SESSION['edit-user-profile']);
          // }
          ?>
        <!--  Header End -->

        <!-- Table Start -->
        <form action="" method="post" id="user-p-forms" enctype="multipart/form-data">
          <table>
            <tr>
              <td class="first-column">
                <div class="name-col">
                  <label for="name-input">Name</label>
                  <input type="text" name="name" id="name-input" value="<?php echo $get_user_info_user_name?>" 
                  style="
                    margin: 10px 0 0 0;
                    font-size: 1.5rem;
                    padding: 5px 0 5px 0;
                    border: none;
                    background: none;
                  "/>
                </div>
              </td>
              <td>
                <button id="edit-name-btn">Edit</button>
              </td>
            </tr>
            <tr>
              <td class="first-column">
                <div class="gender-col">
                  <label for="gender-input">Gender</label>
                  <select name="gender" id="gender-input"
                  style="
                    margin: 10px 0 0 0;
                    font-size: 1.5rem;
                    padding: 5px 0 5px 0;
                    border: none;
                    background: none;
                  ">
                    <option value="Male" <?php if($get_user_info_user_gender == "Male"){ echo "selected"; };?>>Male</option>
                    <option value="Female" <?php if($get_user_info_user_gender == "Female"){ echo "selected"; };?>>Female</option>
                  </select>
                </div>
              </td>
              <td>
                <button id="edit-gender-btn">Add</button>
              </td>
            </tr>
            <tr>
              <td class="first-column">
                <div class="dob-col">
                  <label for="dob-input">Date of birth</label>
                  <input type="date" name="dob" id="dob-input" value="<?php echo $get_user_info_user_dob?>"
                  style="
                    margin: 10px 0 0 0;
                    font-size: 1.5rem;
                    padding: 5px 0 5px 0;
                    border: none;
                    background: none;
                  "/>
                </div>
              </td>
              <td>
                <button id="edit-dob-btn">Add</button>
              </td>
            </tr>
            <tr>
              <td class="first-column">
                <div class="email-col">
                  <label for="email-input">Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email-input"
                    value="<?php echo $get_user_info_user_email?>"
                    style="
                    margin: 10px 0 0 0;
                    font-size: 1.5rem;
                    padding: 5px 0 5px 0;
                    border: none;
                    background: none;
                  "
                  />
                </div>
              </td>
              <td>
                <button id="edit-email-btn">Edit</button>
              </td>
            </tr>
            <tr>
              <td class="first-column">
                <div class="phone-col">
                  <label for="phone-input">Phone Number</label>
                  <input
                    type="tel"
                    name="phone"
                    id="phone-input"
                    value="<?php echo $get_user_info_user_phone?>"
                    style="
                    margin: 10px 0 0 0;
                    font-size: 1.5rem;
                    padding: 5px 0 5px 0;
                    border: none;
                    background: none;
                  "
                  />
                </div>
              </td>
              <td>
                <button id="edit-phone-btn">Add</button>
              </td>
            </tr>
            <tr>
              <td class="first-column">
                <div class="addr-col">
                  <label for="addr-input">Address</label>
                  <input
                    type="text"
                    name="address"
                    id="addr-input"
                    value="<?php echo $get_user_info_user_addr?>"
                    style="
                    margin: 10px 0 0 0;
                    font-size: 1.5rem;
                    padding: 5px 0 5px 0;
                    border: none;
                    background: none;
                  "
                  />
                </div>
              </td>
              <td>
                <button id="edit-addr-btn">Add</button>
              </td>
            </tr>
          </table>
        
        <!-- Table End -->
      </div>
      <div class="right-half">
        <!-- Image -->
        <div class="image-box">
          <input type="hidden" name="user_c_image" value="<?php echo $get_user_info_user_image?>">
          <?php
          if($get_user_info_user_image == ""){
            ?>
            <img
            src="../admin/img/user/default-avatar.jpg"
            
            class="preview-image"
            id="imagePreview"
            width="auto"
          />
            <?php
          }else{
            ?>
            <img
            src="../admin/img/user/<?php echo $get_user_info_user_image?>"
            
            class="preview-image"
            id="imagePreview"
            width="auto"
          />
            <?php
          }
          ?>
          
          <img
            src="img/acc-m-assets/change-avatar.png"
            class="hover-image"
            id="hoverPreview"
          />
          <input type="file" id="fileInput" name="user_n_image"/>
        </div>
        </form>

        <h1><?php echo $get_user_info_user_name; ?></h1>
        <h2>Jelajah Level 1</h2>

        <?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
          // Get Forms Data
        $user_name = $_POST['name'];
        $user_gender = $_POST['gender'];
        $user_dob = $_POST['dob'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_addr = $_POST['address'];
        $user_c_image = $_POST['user_c_image'];
        $user_n_image = $_FILES['user_n_image']['name'];

        // Check if there is update Email Input
        if($user_email != $get_user_info_user_email){
          // Make sure if input email exists or not
          $check_new_email_sql = "SELECT user_email FROM tb_user WHERE user_email = '$user_email';";
          $check_new_email_res = mysqli_query($conn, $check_new_email_sql);
          $check_new_email_count = mysqli_num_rows($check_new_email_res);

          if($check_new_email_count != 0){
            $_SESSION['acc-p-info'] = "<p style='color: red;'>New Email already exists. Try another.</p>";
            echo "<script type='text/javascript'>window.location.href='acc-personal-info.php';</script>";
            die();
          }

          // Validate email using regular expression
          $email_pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

          if (!preg_match($email_pattern, $user_email)) {
              $_SESSION['acc-p-info'] = "<p style='color: red;'>Invalid email format. Please enter a valid email address.</p>";
              echo "<script type='text/javascript'>window.location.href='acc-personal-info.php';</script>";
            die();
          }
        }

        


        // Replace Old Image with New
        if($user_n_image != ""){
          // There is New Image

          // Is there Old Image?
          if($user_c_image != ""){
            // There is Old Image

            // Remove Old Image
            $delete_path = "../admin/img/user/".$user_c_image;
            $remove = unlink($delete_path);
            if($remove == FALSE){
              $_SESSION['edit-user-profile'] = "<div style='color:red'>Failed to Delete Old Image.</div>";
              echo "<script type='text/javascript'>window.location.href='acc-personal-info.php';</script>";
              die();
            }
          }
          
          // Upload Image
            $ext = pathinfo($user_n_image, PATHINFO_EXTENSION);
            $user_image = "Profile-Picture-".rand(00000, 99999).'.'.$ext;

            $source_path = $_FILES['user_n_image']['tmp_name'];
            $dest_path = "../admin/img/user/".$user_image;
            $upload = move_uploaded_file($source_path, $dest_path);

            if($upload==FALSE){
              $_SESSION['edit-user-profile'] = "<div style='color:red'>Failed to add image file. Try Again</div>";
              echo "<script type='text/javascript'>window.location.href='acc-personal-info.php';</script>";
              die();
            }

        }else{
          $user_image = $user_c_image;
        }

        // SQL

        $sql = "UPDATE tb_user SET
        user_name = '$user_name',
        user_gender = '$user_gender',
        user_dob = '$user_dob',
        user_email = '$user_email',
        user_phone = '$user_phone',
        user_addr = '$user_addr',
        user_image = '$user_image'
        WHERE user_id = '$get_user_info_user_id'
        ;";

        $res = mysqli_query($conn, $sql);
        if($res == FALSE){
          $_SESSION['edit-user-profile'] = "<div style='color:red'>Failed to execute query. Try Again</div>";
          echo "<script type='text/javascript'>window.location.href='acc-personal-info.php';</script>";
            die();
        }else{
          $_SESSION['active-user'] = $user_email;
          $_SESSION['edit-user-profile'] = "<div style='color:green'>Successfully updated User.</div>";
          echo "<script type='text/javascript'>window.location.href='acc-personal-info.php';</script>";
        }
    }
    ?>
      </div>
      
    </main>

    <script src="js/personal-info.js"></script>

  </body>
</html>
