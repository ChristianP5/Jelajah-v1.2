<?php
include('dbconn/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body class="overflow-hidden">
    <div class="scroll-container">
        <section data-aos="fade-up">
            <br><br>
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="home.php" class="flex items-center mb-6 text-2xl text-brown-600 font-bold">
                    <span class="pastel-brown">J</span>elajah.com
                </a>
                <div class="w-full bg-white rounded-lg shadow-xl md:mt-0 sm:max-w-md xl:p-0">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8 scroll-content">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-700 md:text-2xl">
                            Login
                        </h1>
                        <?php
                        if(isset($_SESSION['user-login'])){
                            echo $_SESSION['user-login'];
                            unset($_SESSION['user-login']);
                        }
                        ?>
                        <form class="space-y-4 md:space-y-6" action="#" method="post">
                            <div class="text-left">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="name" class="form-input rounded-lg focus:outline-none focus:border focus:border-brown-600 block w-full p-2.5" placeholder="abc@gmail.com" required="" />
                            </div>
                            <div class="text-left">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="form-input rounded-lg focus:outline-none focus:border focus:border-brown-600 block w-full p-2.5" required="" />
                            </div>
                            
                            <br>
                            <input type="submit" id="login-submit-btn" name="submit" value="Login" class=" text-sm px-5 py-2.5 transition duration-250 ease-in text-center"></input>
                            <div class="forgot-password">
                                Forgot Password?
                            </div>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Need an account? <a href="sign-up.php" class="font-medium text-brown-600 hover:underline dark:text-brown-500">SIGN UP</a>
                            </p>
                          
                            </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

<?php
if(isset($_POST['submit'])){
    // Button is Pressed
    
    // Get Login Inputs
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    // Escape Login Inputs
    $user_email = mysqli_real_escape_string($conn, $user_email);
    $user_password = mysqli_real_escape_string($conn, $user_password);

    $user_password_md5 = md5($user_password);

    // Search Database
    $login_sql = "SELECT tb_user.user_email, tb_user.user_pass FROM tb_user WHERE
    user_email = ? AND user_pass = ?;";

    $login_stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($login_stmt, $login_sql)){
        $_SESSION['user-login'] = "<p style='color: red;'>Failed creating statement.</p>";
        echo "<script type='text/javascript'>window.location.href='login.php';</script>";
        die();
    }else{
        mysqli_stmt_bind_param($login_stmt, "ss", $user_email, $user_password_md5);
        mysqli_stmt_execute($login_stmt);

        $login_res = mysqli_stmt_get_result($login_stmt);

        $login_count = mysqli_num_rows($login_res);
        if($login_count != 1){
            // Login Wrong Cresentials
            $_SESSION['user-login'] = "<p style='color: red;'>Wrong Password/Email.</p>";
            echo "<script type='text/javascript'>window.location.href='login.php';</script>";
            die();
        }else{
            // Login Success
            $_SESSION['active-user'] = $user_email;
            echo "<script type='text/javascript'>window.location.href='home.php';</script>";
        }
    }
}
?>
</body> 
</html>
