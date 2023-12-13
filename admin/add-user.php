<?php
include('./partials/header.php');
?>

    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Add User</h1>
      <?php
      if(isset($_SESSION['add-user'])){
        echo $_SESSION['add-user'];
        unset($_SESSION['add-user']);
      }
      ?>
      <section class="table-sect flex-center">
        <form action="" method="post" enctype="multipart/form-data">
      <table>
        <tr class="row-m">
          <td>
            <label for="user_username">Username: </label>
          </td>
          <td>
            <input type="text" name="user_username" id="user_username">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_pass">Password: </label>
          </td>
          <td>
            <input type="password" name="user_pass" id="user_pass">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_pass_c">Confirm Password: </label>
          </td>
          <td>
            <input type="password" name="user_pass_c" id="user_pass_c">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_gender">Gender: </label>
          </td>
          <td>
            <select name="user_gender" id="user_gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_dob">Date of Birth: </label>
          </td>
          <td>
            <input type="date" name="user_dob" id="user_dob">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_email">Email: </label>
          </td>
          <td>
            <input type="email" name="user_email" id="user_email">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_phone">Phone: </label>
          </td>
          <td>
            <input type="tel" name="user_phone" id="user_phone">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_addr">Address: </label>
          </td>
          <td>
            <textarea name="user_addr" id="user_addr" cols="30" rows="5"></textarea>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_addr">is Active: </label>
          </td>
          <td>
            <select name="user_isActive" id="user_isActive">
              <option value="True">True</option>
              <option value="False">False</option>
            </select>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_image">Image: </label>
          </td>
          <td>
            <input type="file" name="user_image" id="user_image">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_image">Image Preview: </label>
          </td>
          <td>
            <img src="./img/user/default-avatar.jpg" alt="" width="100px" id="preview_user_image">
          </td>
        </tr>
      </table>
      <div class="flex-center">
      <input type="submit" value="Submit" name="submit" class="button-green">
      </div>
      
      </form>
      </section>
    </main>
    <script src="./js/user-img.js"></script>
    <!-- Main Content End -->

<?php
include('./partials/footer.php');
?>

<?php

if(isset($_POST['submit'])){
  // Button Clicked

  // Retrieve Data
  $user_username = $_POST['user_username'];
  $user_pass = $_POST['user_pass'];
  $user_pass_md5 = md5($user_pass);
  $user_pass_c = $_POST['user_pass_c'];
  $user_gender = $_POST['user_gender'];
  $user_dob = $_POST['user_dob'];
  $user_email = $_POST['user_email'];
  $user_phone = $_POST['user_phone'];
  $user_addr = $_POST['user_addr'];
  $user_isActive = $_POST['user_isActive'];

  // Handle Nulls
  if($user_username == "" || $user_pass == "" || $user_gender == "" || 
  $user_dob == "" || $user_email == "" || $user_phone == "" || $user_addr == ""){
    // There is null
    $_SESSION['add-user'] = "<div style='color:red'>Invalid Inputs.</div>";
    echo "<script type='text/javascript'>window.location.href='add-user.php';</script>";
    die();
  }

  if($user_isActive == ""){
    $user_isActive = "False";
  }

  // Check if Confirmation Password is Correct
  if($user_pass !== $user_pass_c){
    $_SESSION['add-user'] = "<div style='color:red'>Confirmation Password does not Match.</div>";
    echo "<script type='text/javascript'>window.location.href='add-user.php';</script>";
    die();
  }

  // Data is Valid -------------------------------------------------------------------------------

  // Upload Image
  $image_name = $_FILES['user_image']['name'];
  if($image_name != ""){
      // Image Exists
      // Rename Image Name
      $ext = pathinfo($image_name, PATHINFO_EXTENSION);

      $image_name = "Profile-Picture-".rand(00000, 99999).'.'.$ext;

      // Upload Image
      $source_path = $_FILES['user_image']['tmp_name'];
      $dest_path = './img/user/'.$image_name;
      $upload = move_uploaded_file($source_path, $dest_path);

      if($upload==FALSE){
          $_SESSION['add-user'] = "<div style='color:red'>Failed to upload image.</div>";
          echo "<script type='text/javascript'>window.location.href='add-user.php';</script>";
          die();
      }
  }


  // INITIATE SQL QUERRY
  $sql = "INSERT INTO tb_user SET
  user_name = '$user_username',
  user_pass = '$user_pass_md5',
  user_gender = '$user_gender',
  user_dob = '$user_dob',
  user_email = '$user_email',
  user_phone = '$user_phone',
  user_addr = '$user_addr',
  user_image = '$image_name',
  user_isActive = '$user_isActive'
  ";

  $res = mysqli_query($conn, $sql);
  if($res == TRUE){
    // Querry Success
    $_SESSION['view-user'] = "<div style='color:green'>Successfully added new User.</div>";
    echo "<script type='text/javascript'>window.location.href='view-user.php';</script>";
  }else{
    // Querry Failed
    $_SESSION['add-user'] = "<div style='color:red'>Query Failed.</div>";
    echo "<script type='text/javascript'>window.location.href='add-user.php';</script>";
    die();
  }


}

?>