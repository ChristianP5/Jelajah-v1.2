<?php
include('./partials/header.php');
?>

    <!-- Main Content Start -->
    <main class="bm-100">
      <h1 class="flex-center m-20">Add Workshop</h1>
      <?php
      if(isset($_SESSION['add-workshop'])){
        echo $_SESSION['add-workshop'];
        unset($_SESSION['add-workshop']);
      }
      ?>
      <section class="table-sect flex-center">
        <form action="" method="post" enctype="multipart/form-data">
      <table>
        <tr class="row-m">
          <td>
            <label for="w_name">Name: </label>
          </td>
          <td>
            <input type="text" name="w_name" id="w_name">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_addr">Address: </label>
          </td>
          <td>
            <input type="text" name="w_addr" id="w_addr">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_duration">Duration (minutes): </label>
          </td>
          <td>
            <input type="number" name="w_duration" id="w_duration">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_date">Date: </label>
          </td>
          <td>
            <input type="date" name="w_date" id="w_date">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_time">Time: </label>
          </td>
          <td>
            <input type="time" name="w_time" id="w_time">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_desc_l">Desc (What will you Learn): </label>
          </td>
          <td>
            <textarea name="w_desc_l" id="w_desc_l" cols="30" rows="10"></textarea>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_desc_g">Desc (What will you Get): </label>
          </td>
          <td>
            <textarea name="w_desc_g" id="w_desc_g" cols="30" rows="10"></textarea>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_price">Price: </label>
          </td>
          <td>
            <input type="number" name="w_price" id="w_price">
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_type">Type: </label>
          </td>
          <td>
            <select name="w_type" id="w_type">
              <option value="Crafting">Crafting</option>
              <option value="Cooking">Cooking</option>
            </select>
          </td>
        </tr>
        <tr class="row-m">
          <td>
            <label for="w_isActive">is Active: </label>
          </td>
          <td>
            <select name="w_isActive" id="w_isActive">
              <option value="True">True</option>
              <option value="False">False</option>
            </select>
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
  $workshop_name = $_POST['w_name'];
  $workshop_addr = $_POST['w_addr'];
  $workshop_duration = $_POST['w_duration'];
  $workshop_date = $_POST['w_date'];
  $workshop_time = $_POST['w_time'];
  $workshop_desc_l = $_POST['w_desc_l'];
  $workshop_desc_g = $_POST['w_desc_g'];
  $workshop_price = $_POST['w_price'];
  $workshop_type = $_POST['w_type'];
  $workshop_isActive = $_POST['w_isActive'];

  // Handle Nulls
  if($workshop_name == "" || $workshop_addr == "" || $workshop_duration == "" || 
  $workshop_date == "" || $workshop_time == "" || $workshop_desc_l == "" || $workshop_desc_g == "" || $workshop_price == "" || $workshop_isActive == ""){
    // There is null
    $_SESSION['add-workshop'] = "<div style='color:red'>Invalid Inputs.</div>";
    echo "<script type='text/javascript'>window.location.href='add-workshop.php';</script>";
    die();
  }

  if($workshop_isActive == ""){
    $workshop_isActive = "False";
  }

  if($workshop_type == ""){
    $workshop_type = "Crafting";
  }

  // Data is Valid -------------------------------------------------------------------------------


  // INITIATE SQL QUERRY
  $sql = "INSERT INTO tb_workshop SET
  workshop_name = '$workshop_name',
  workshop_addr = '$workshop_addr',
  workshop_duration = $workshop_duration,
  workshop_date = '$workshop_date',
  workshop_time = '$workshop_time',
  workshop_desc_l = '$workshop_desc_l',
  workshop_desc_g = '$workshop_desc_g',
  workshop_price = $workshop_price,
  workshop_isActive = '$workshop_isActive',
  workshop_type = '$workshop_type'
  ;";

  $res = mysqli_query($conn, $sql);
  if($res == TRUE){
    // Querry Success
    $_SESSION['view-workshop'] = "<div style='color:green'>Successfully added new Workshop.</div>";
    echo "<script type='text/javascript'>window.location.href='view-workshop.php';</script>";
  }else{
    // Querry Failed
    $_SESSION['add-workshop'] = "<div style='color:red'>Query Failed.</div>";
    echo "<script type='text/javascript'>window.location.href='add- .php';</script>";
    die();
  }

}

?>