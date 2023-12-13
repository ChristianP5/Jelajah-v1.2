<?php
include('./partials/header.php');
?>

<?php
// Get Database Information
$get_users_sql = "SELECT * FROM tb_user";
$get_users_res = mysqli_query($conn, $get_users_sql);

if($get_users_res == TRUE){
  $get_users_count = mysqli_num_rows($get_users_res);
}

$get_workshops_sql = "SELECT * FROM tb_workshop";
$get_workshops_res = mysqli_query($conn, $get_workshops_sql);

if($get_workshops_res == TRUE){
  $get_workshops_count = mysqli_num_rows($get_workshops_res);
}
?>

    <!-- Main Content Start -->
    <main class="">
      <section class="counter">
        <div class="user-counter">
          <h1>Users</h1>
          <h2><?php echo $get_users_count;?></h2>
        </div>
        <div class="workshops-counter">
          <h1>Workshops</h1>
          <h2><?php echo $get_workshops_count;?></h2>
        </div>
      </section>
    </main>
    <!-- Main Content End -->

<?php
include('./partials/footer.php');
?>
