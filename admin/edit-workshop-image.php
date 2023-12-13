<?php
include('./partials/header.php');

// Get Workshop Image Data
include('./partials/get-workshop-image-data.php');
?>

    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Edit Workshop Image</h1>
      <?php
      if(isset($_SESSION['edit-workshop-image'])){
        echo $_SESSION['edit-workshop-image'];
        unset($_SESSION['edit-workshop-image']);
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
            <?php
            if($get_workshop_image_info_workshop_image != ""){
                ?>
                <img src="./img/workshop/<?php echo $get_workshop_image_info_workshop_image;?>" alt="" width="200" id="preview_workshop_image">
                <?php
            }else{
                ?>
                <img src="./img/workshop/default-image.jpg" alt="" width="200" id="preview_workshop_image">
                <?php
            }
            ?>
            
          </td>
        </tr>
        
      </table>
      <div class="flex-center">
        <input type="hidden" name="w_current_image" value="<?php echo $get_workshop_image_info_workshop_image;?>">
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
  $workshop_id = $get_workshop_image_info_workshop_id;
  $workshop_current_image = $_POST['w_current_image'];
  $workshop_input_image = $_FILES['w_input_image']['name'];

  // Handle Nulls
  if($workshop_input_image == "" ){
    // There is null
    echo "<script type='text/javascript'>window.location.href='view-workshop-images.php?workshop_id=".$get_workshop_image_info_workshop_id."';</script>";
    die();
  }

  // Data is Valid -------------------------------------------------------------------------------

  // Remove Old Image
  $remove_path = "../admin/img/workshop/".$workshop_current_image;
  $remove = unlink($remove_path);

  if($remove == FALSE){
    $_SESSION['view-workshop-images'] = "<div style='color:red'>Failed to remove image file. Try Again</div>";
    echo "<script type='text/javascript'>window.location.href='view-workshop-images.php?workshop_id=".$get_workshop_image_info_workshop_id."';</script>";
    die();
  }

  // Upload Image
  $ext = pathinfo($workshop_input_image, PATHINFO_EXTENSION);
    $workshop_image = "Profile-Picture-".rand(00000, 99999).'.'.$ext;

    $source_path = $_FILES['w_input_image']['tmp_name'];
    $dest_path = "../admin/img/workshop/".$workshop_image;
    $upload = move_uploaded_file($source_path, $dest_path);

    if($upload==FALSE){
      $_SESSION['view-workshop-images'] = "<div style='color:red'>Failed to add image file. Try Again</div>";
      echo "<script type='text/javascript'>window.location.href='view-workshop-images.php?workshop_id=".$get_workshop_image_info_workshop_id."';</script>";
      die();
    }

  // INITIATE SQL QUERRY
  $sql = "UPDATE tb_workshop_images SET
  workshop_image = '$workshop_image'
  WHERE workshop_image_id = '$get_workshop_image_info_workshop_image_id'
  ;";

  $res = mysqli_query($conn, $sql);
  if($res == TRUE){
    // Querry Success
    $_SESSION['view-workshop-images'] = "<div style='color:green'>Successfully added new Workshop Image.</div>";
    echo "<script type='text/javascript'>window.location.href='view-workshop-images.php?workshop_id=".$get_workshop_image_info_workshop_id."';</script>";
  }else{
    // Querry Failed
    $_SESSION['add-workshop-image'] = "<div style='color:red'>Query Failed.</div>";
    echo "<script type='text/javascript'>window.location.href='add-workshop-image.php?workshop_image_id=".$get_workshop_image_info_workshop_image_id."';</script>";
    die();
  }

}

?>