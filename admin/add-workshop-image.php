<?php
include('./partials/header.php');
include('./partials/get-workshop-data.php');
?>

    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Add Workshop Image for <?php echo $get_workshop_info_workshop_name;?></h1>
      <?php
      if(isset($_SESSION['add-workshop-image'])){
        echo $_SESSION['add-workshop-image'];
        unset($_SESSION['add-workshop-image']);
      }
      ?>
      <section class="table-sect flex-center">
        <form action="" method="post" enctype="multipart/form-data">
      <table>
        <tr class="row-m">
          <td>
            <label for="w_input_image">Input Image: </label>
          </td>
          <td>
            <input type="file" name="w_input_image" id="workshop_image">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_image_preview">Preview Image: </label>
          </td>
          <td>
            <img src="./img/workshop/default-image.jpg" alt="" width="200" id="preview_workshop_image">
          </td>
        </tr>
        
      </table>
      <div class="flex-center">
      <input type="submit" value="Submit" name="submit" class="button-green">
      </div>
      
      </form>
      </section>
    </main>
    <script src="./js/workshop-img.js"></script>
    <!-- Main Content End -->

<?php
include('./partials/footer.php');
?>

<?php

if(isset($_POST['submit'])){
  // Button Clicked

  // Retrieve Data
  $workshop_id = $get_workshop_info_workshop_id;
  $workshop_input_image = $_FILES['w_input_image']['name'];

  // Handle Nulls
  if($workshop_input_image == "" ){
    // There is null
    $_SESSION['add-workshop-image'] = "<div style='color:red'>Invalid Inputs.</div>";
    echo "<script type='text/javascript'>window.location.href='add-workshop-image.php?workshop_id=".$get_workshop_info_workshop_id."';</script>";
    die();
  }

  // Data is Valid -------------------------------------------------------------------------------

  // Upload Image
  $ext = pathinfo($workshop_input_image, PATHINFO_EXTENSION);
    $workshop_image = "Profile-Picture-".rand(00000, 99999).'.'.$ext;

    $source_path = $_FILES['w_input_image']['tmp_name'];
    $dest_path = "../admin/img/workshop/".$workshop_image;
    $upload = move_uploaded_file($source_path, $dest_path);

    if($upload==FALSE){
      $_SESSION['view-workshop-images'] = "<div style='color:red'>Failed to add image file. Try Again</div>";
      echo "<script type='text/javascript'>window.location.href='view-workshop-images.php?workshop_id=".$get_workshop_info_workshop_id."';</script>";
      die();
    }

  // INITIATE SQL QUERRY
  $sql = "INSERT INTO tb_workshop_images SET
  workshop_id = '$workshop_id',
  workshop_image = '$workshop_image'
  ;";

  $res = mysqli_query($conn, $sql);
  if($res == TRUE){
    // Querry Success
    $_SESSION['view-workshop-images'] = "<div style='color:green'>Successfully added new Workshop Image.</div>";
    echo "<script type='text/javascript'>window.location.href='view-workshop-images.php?workshop_id=".$get_workshop_info_workshop_id."';</script>";
  }else{
    // Querry Failed
    $_SESSION['add-workshop-image'] = "<div style='color:red'>Query Failed.</div>";
    echo "<script type='text/javascript'>window.location.href='add-workshop-image.php?workshop_id=".$get_workshop_info_workshop_id."';</script>";
    die();
  }

}

?>