<?php
include('./partials/header.php');
include('./partials/val_id.php');
include('./partials/get-user-data.php');
?>

    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Edit User</h1>
      <?php
      if(isset($_SESSION['edit-user'])){
        echo $_SESSION['edit-user'];
        unset($_SESSION['edit-user']);
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
            <input type="text" name="user_username" id="user_username" value="<?php echo $get_user_info_user_name;?>">
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
              <option value="Male" <?php if($get_user_info_user_gender == "Male"){ echo "selected"; }; ?>>Male</option>
              <option value="Female" <?php if($get_user_info_user_gender == "Female"){ echo "selected"; }; ?>>Female</option>
            </select>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_dob">Date of Birth: </label>
          </td>
          <td>
            <input type="date" name="user_dob" id="user_dob" value="<?php echo $get_user_info_user_dob;?>">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_email">Email: </label>
          </td>
          <td>
            <input type="email" name="user_email" id="user_email" value="<?php echo $get_user_info_user_email;?>">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_phone">Phone: </label>
          </td>
          <td>
            <input type="tel" name="user_phone" id="user_phone" value="<?php echo $get_user_info_user_phone;?>">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_addr">Address: </label>
          </td>
          <td>
            <textarea name="user_addr" id="user_addr" cols="30" rows="5">
            <?php echo $get_user_info_user_addr;?>
            </textarea>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_isActive">is Active: </label>
          </td>
          <td>
            <select name="user_isActive" id="user_isActive" >
              <option value="True" <?php if($get_user_info_user_isActive == "True"){ echo "selected"; }; ?>>True</option>
              <option value="False" <?php if($get_user_info_user_isActive == "False"){ echo "selected"; }; ?>>False</option>
            </select>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_image">Image: </label>
          </td>
          <td>
            <input type="file" name="user_n_image" id="user_image">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="user_image">Image Preview: </label>
          </td>
          <td>
            <?php
            if($get_user_info_user_image != ""){
              ?>
              <input type="hidden" name="user_c_image" value="<?php echo $get_user_info_user_image;?>">
              <img src="./img/user/<?php echo $get_user_info_user_image;?>" alt="" width="100px" id="preview_user_image">
              <?php
            }else{
              ?>
              <img src="./img/user/default-avatar.jpg" alt="" width="100px" id="preview_user_image">
              <?php
            }
            ?>
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

if(isset($_POST['submit'])){
  // Button is Pressed

  // Get Data from Forms
  $user_name = $_POST['user_username'];
  $user_pass = $_POST['user_pass'];
  $user_pass_c = $_POST['user_pass_c'];
  $user_gender = $_POST['user_gender'];
  $user_dob = $_POST['user_dob'];
  $user_email = $_POST['user_email'];
  $user_phone = $_POST['user_phone'];
  $user_addr = $_POST['user_addr'];
  $user_isActive = $_POST['user_isActive'];
  $user_n_image = $_FILES['user_n_image']['name'];
  $user_c_image = $_POST['user_c_image'];

  // Check if Confirmed Password and New Password Matches
  if($user_pass == ""){
    $_SESSION['edit-user'] = "<div style='color:red'>Password cannot be empty.</div>";
    echo "<script type='text/javascript'>window.location.href='edit-user.php?user_id=".$_GET['user_id']."';</script>";
    die();
  }

  if($user_pass != $user_pass_c){
    $_SESSION['edit-user'] = "<div style='color:red'>Password and Confirm Password doesn't match.</div>";
    echo "<script type='text/javascript'>window.location.href='edit-user.php?user_id=".$_GET['user_id']."';</script>";
    die();
  }

  $user_pass_md5 = md5($user_pass);

  // Update Old Image (If there is new Image)
  if($user_n_image != ""){
   
    if($user_c_image != ""){
      // Remove Image (if there is old image)
        $delete_image_path = "../admin/img/user/".$user_c_image;
        $remove_image = unlink($delete_image_path);

        if($remove_image==FALSE){
          $_SESSION['edit-user'] = "<div style='color:red'>Failed to delete image file. Try Again</div>";
          echo "<script type='text/javascript'>window.location.href='edit-user.php?user_id=".$_GET['user_id']."';</script>";
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
      $_SESSION['edit-user'] = "<div style='color:red'>Failed to add image file. Try Again</div>";
      echo "<script type='text/javascript'>window.location.href='edit-user.php?user_id=".$get_active_user_id."';</script>";
      die();
    }

  }else{
    $user_image = $user_c_image;
  }

  // SQL

  $sql = "UPDATE tb_user SET
  user_name = '$user_name',
  user_pass = '$user_pass_md5',
  user_gender = '$user_gender',
  user_dob = '$user_dob',
  user_email = '$user_email',
  user_phone = '$user_phone',
  user_addr = '$user_addr',
  user_image = '$user_image',
  user_isActive = '$user_isActive'
  WHERE user_id = '$get_active_user_id'
  ;";

  $res = mysqli_query($conn, $sql);
  if($res == FALSE){
    $_SESSION['edit-user'] = "<div style='color:red'>Failed to execute query. Try Again</div>";
      echo "<script type='text/javascript'>window.location.href='edit-user.php?user_id=".$get_active_user_id."';</script>";
      die();
  }else{
    $_SESSION['view-user'] = "<div style='color:green'>Successfully updated User.</div>";
    echo "<script type='text/javascript'>window.location.href='view-user.php';</script>";
  }

}
?>