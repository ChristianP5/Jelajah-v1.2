<?php
include('./partials/header.php');
?>



    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Workshops</h1>
      <?php
      if(isset($_SESSION['view-workshop'])){
        echo $_SESSION['view-workshop'];
        unset($_SESSION['view-workshop']);
      }
      ?>

      <a href="./add-workshop.php" class="button-green add-user-btn">Add</a>
      <section class="table-sect o-x">
      <table style="width:200%">
        <tr class="row-m">
          <th>No.</th>
          <th>Name</th>
          <th>Image</th>
          <th>Address</th>
          <th>Duration</th>
          <th>Date</th>
          <th>Time</th>
          <th>Description 1</th>
          <th>Description 2</th>
          <th>Price</th>
          <th>Type</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>
        <?php
            // Get Workshops Data
                $get_w_data_sql = "SELECT * FROM tb_workshop";
                $get_w_data_res = mysqli_query($conn, $get_w_data_sql);
                if($get_w_data_res == TRUE){
                    $get_w_data_count = mysqli_num_rows($get_w_data_res);
                    if($get_w_data_count > 0){
                        while($get_w_data_rows = mysqli_fetch_assoc($get_w_data_res)){
                            // Get Workshop Row Data
                            $get_w_data_id = $get_w_data_rows['workshop_id'];
                            $get_w_data_name = $get_w_data_rows['workshop_name'];
                            $get_w_data_addr = $get_w_data_rows['workshop_addr'];
                            $get_w_data_duration = $get_w_data_rows['workshop_duration'];
                            $get_w_data_date = $get_w_data_rows['workshop_date'];
                            $get_w_data_time = $get_w_data_rows['workshop_time'];
                            $get_w_data_desc_l = $get_w_data_rows['workshop_desc_l'];
                            $get_w_data_desc_g = $get_w_data_rows['workshop_desc_g'];
                            $get_w_data_price = $get_w_data_rows['workshop_price'];
                            $get_w_data_isActive = $get_w_data_rows['workshop_isActive'];
                            $get_w_data_type = $get_w_data_rows['workshop_type'];

                            // Display Data
                            ?>
                            <!-- ITEM DESIGN START -->
                            <tr class="row-m text-center">
                            <td><?php echo $get_w_data_id;?></td>
                            <td><?php echo $get_w_data_name;?></td>
                            <td><a class="button-green" href="view-workshop-images.php?workshop_id=<?php echo $get_w_data_id;?>">Workshop Images</a></td>
                            <td><?php echo $get_w_data_addr;?></td>
                            <td><?php echo $get_w_data_duration;?></td>
                            <td><?php echo $get_w_data_date;?></td>
                            <td><?php echo $get_w_data_time;?></td>
                            <td class="o-x" width="200"><div style="height: 100px" width="2000"><?php echo $get_w_data_desc_l;?></div></td>
                            <td class="o-x" width="200"><div style="height: 100px" width="2000"><?php echo $get_w_data_desc_g;?></div></td>
                            <td><?php echo $get_w_data_price;?></td>
                            <td><?php echo $get_w_data_type;?></td>
                            <td><?php echo $get_w_data_isActive;?></td>
                            <td><a href="" class="button-green" width="100px">Edit</a> <a href="" class="button-red">Delete</a></td>

                            </tr>
                            <!-- ITEM DESIGN END -->
                            <?php
                        }
                    }else{

                        // Display Placeholder
                        ?>
                        <!-- ITEM DESIGN START -->
                        <tr class="row-m text-center">
                        <td>1</td>
                        <td>Workshop Name</td>
                        <td><a class="button-green" href="">Workshop Images</a></td>
                        <td>ADDRESS</td>
                        <td>DURATION</td>
                        <td>DATE</td>
                        <td>TIME</td>
                        <td>DESC 1</td>
                        <td>DESC 2</td>
                        <td>PRICE</td>
                        <td>TYPE</td>
                        <td>ACTIVE</td>
                        <td><a href="" class="button-green" width="100px">Edit</a> <a href="" class="button-red">Delete</a></td>

                        </tr>
                        <!-- ITEM DESIGN END -->
                        <?php
                    }
                }
        ?>
             
       
      </table>
      </section>
    </main>
    <!-- Main Content End -->

<?php
include('./partials/footer.php');
?>
