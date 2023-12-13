
<?php
session_start();
$hc_admin_username = "JelajahAdmin";
$hc_admin_pass = "111";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css" />
  </head>
  <body>
    <main>
      <h1>Login to Admin Panel</h1>
      <?php
        if(isset($_SESSION['forms-message'])){
          echo $_SESSION['forms-message'];
          unset($_SESSION['forms-message']);
        }
      ?>
      <form action="" method="post">
        <table>
          <tr>
            <td>
              <label for="admin_username">Username:</label>
            </td>
            <td>
              <input type="text" name="admin_username" id="admin_username" placeholder="<?php echo $hc_admin_username?>"/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="admin_pass">Password:</label>
            </td>
            <td>
              <input type="password" name="admin_pass" id="admin_pass" />
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" value="Log In" name="submit" />
            </td>
          </tr>
        </table>
      </form>
    </main>
  </body>

  <?php
  if(isset($_POST['submit'])){
    // Button is Clicked
    
    // Get Forms Data
    $admin_username = $_POST['admin_username'];
    $admin_pass = $_POST['admin_pass'];

    // Check if Correct Password
    if($admin_pass != $hc_admin_pass){
      $_SESSION['forms-message'] = "<p style='color: red; font-weight:bold;'>Incorrect Username/Password.</p>";
      echo "<script type='text/javascript'>window.location.href='login.php';</script>";
      die();
    }

    // Check if Correct Username
    if($admin_username != $hc_admin_username){
      $_SESSION['forms-message'] = "<p style='color: red; font-weight:bold;'>Incorrect Username/Password.</p>";
      echo "<script type='text/javascript'>window.location.href='login.php';</script>";
      die();
    }else{
      $_SESSION['logged_in'] = "logged_in";
      echo "<script type='text/javascript'>window.location.href='dashboard.php';</script>";
    }

    
  }
  ?>

</html>
