<?php
include('./partials/header.php');
?>



    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Users</h1>
      <?php
      if(isset($_SESSION['view-user'])){
        echo $_SESSION['view-user'];
        unset($_SESSION['view-user']);
      }
      ?>

      <a href="./add-user.php" class="button-green add-user-btn">Add</a>
      <section class="table-sect o-x">
      <table style="width:200%">
        <tr class="row-m">
          <th>No.</th>
          <th>Username</th>
          <th>Image</th>
          <th>Gender</th>
          <th>DoB</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>isActive</th>
          <th>Actions</th>
        </tr>

        <?php
        // Get Users Data from Database
        $get_users_sql = "SELECT * FROM tb_user";
        $get_users_res = mysqli_query($conn, $get_users_sql);
        if($get_users_res == TRUE){
          $get_users_count = mysqli_num_rows($get_users_res);
          if($get_users_count > 0){
            while($get_users_rows = mysqli_fetch_assoc($get_users_res)){
              ?>
             <!-- ITEM DESIGN START -->
            <tr class="row-m text-center">
              <td><?php echo $get_users_rows['user_id'];?></td>
              <td><?php echo $get_users_rows['user_name'];?></td>
              <?php
              if($get_users_rows['user_image'] == ""){
                ?>
                <td><img src="./img/user/default-avatar.jpg" alt="" width="100px"></td>
                <?php
              }else{
                ?>
                <td><img src="./img/user/<?php echo $get_users_rows['user_image'];?>" alt="" width="100px"></td>
                <?php
              }
              ?>
              <td><?php echo $get_users_rows['user_gender'];?></td>
              <td><?php echo $get_users_rows['user_dob'];?></td>
              <td><?php echo $get_users_rows['user_email'];?></td>
              <td><?php echo $get_users_rows['user_phone'];?></td>
              <td><?php echo $get_users_rows['user_addr'];?></td>
              <td><?php echo $get_users_rows['user_isActive'];?></td>
             
              <td>
                <a href="./edit-user.php?user_id=<?php echo $get_users_rows['user_id'];?>" class="button-green">Edit</a>
                <a href="" class="button-red">Delete</a>
              </td>

            </tr>
            <!-- ITEM DESIGN END -->
            <?php
            }
          }else{
            ?>
             <!-- ITEM DESIGN START -->
            <tr class="row-m text-center">
              <td>1</td>
              <td>USERNAME</td>
              <td><img src="./img/user/default-avatar.jpg" alt="" width="200px"></td>
              <td>GENDER</td>
              <td>DOB</td>
              <td>EMAIL</td>
              <td>PHONE</td>
              <td>ADDRESS</td>
              <td>isActive</td>
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
