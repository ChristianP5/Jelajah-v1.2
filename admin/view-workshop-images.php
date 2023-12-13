<?php
include('./partials/header.php');
include('./partials/get-workshop-data.php')


?>



    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Workshops Images for <?php echo $get_workshop_info_workshop_name;?></h1>
      <?php
      if(isset($_SESSION['view-workshop-images'])){
        echo $_SESSION['view-workshop-images'];
        unset($_SESSION['view-workshop-images']);
      }
      ?>

      <a href="./add-workshop-image.php?workshop_id=<?php echo $get_workshop_info_workshop_id;?>" class="button-green add-user-btn">Add</a>
      <table style="width:100%">
        <tr class="row-m">
          <th>Image</th>
          <th>Actions</th>
        </tr>
        <?php
        $get_w_images_data_sql = "SELECT * FROM tb_workshop_images WHERE workshop_id = ".$get_workshop_info_workshop_id.";";
        $get_w_images_data_res = mysqli_query($conn, $get_w_images_data_sql);
        if($get_w_images_data_res == TRUE){
          $get_w_images_data_count = mysqli_num_rows($get_w_images_data_res);
          if($get_w_images_data_count > 0){
            while($get_w_images_data_row = mysqli_fetch_assoc($get_w_images_data_res)){
              // Get the Image Data
              $get_w_images_data_workshop_image_id = $get_w_images_data_row['workshop_image_id'];
              $get_w_images_data_workshop_image = $get_w_images_data_row['workshop_image'];
              ?>

              <!-- ITEM DESIGN START -->
              <tr class="row-m text-center">
                  <td><img src="./img/workshop/<?php echo $get_w_images_data_workshop_image;?>" alt="" width="100"></td>
                  <td><a href="edit-workshop-image.php?workshop_image_id=<?php echo $get_w_images_data_workshop_image_id;?>" class="button-green" width="100px">Edit</a> <a href="" class="button-red">Delete</a></td>

                  </tr>
              <!-- ITEM DESIGN END --> 

              <?php
            }
          }else{
            ?>
            <!-- ITEM DESIGN START -->
            <tr class="row-m text-center">
                <td><img src="./img/workshop/default-image.jpg" alt="" width="100"></td>
                <td><a href="" class="button-green" width="100px">Edit</a> <a href="" class="button-red">Delete</a></td>

                </tr>
            <!-- ITEM DESIGN END -->  
            <?php
          }
        }
        ?>
                        
      </table>
    </main>
    <!-- Main Content End -->

<?php
include('./partials/footer.php');
?>
