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
    <link rel="stylesheet" href="css/sign-up.css">
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
                            Sign Up
                        </h1>
                        <?php
                        if(isset($_SESSION['user-sign-up'])){
                            echo $_SESSION['user-sign-up'];
                            unset($_SESSION['user-sign-up']);
                        };
                        ?>
                        <form class="space-y-4 md:space-y-6" action="#" method="post">
                            <div class="text-left">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="First_name" id="First_name" class="form-input rounded-lg focus:outline-none focus:border focus:border-brown-600 block w-full p-2.5" placeholder="Your First Name" required="" />
                            </div>
                            <div class="text-left">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="Last_name" id="Last_name" class="form-input rounded-lg focus:outline-none focus:border focus:border-brown-600 block w-full p-2.5" placeholder="Your Last Name" required="" />
                            </div>
                            <div class="text-left">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="Email" id="Email" class="form-input rounded-lg focus:outline-none focus:border focus:border-brown-600 block w-full p-2.5" placeholder="abc@gmail.com" required="" />
                            </div>
                            <div class="text-left">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="form-input rounded-lg focus:outline-none focus:border focus:border-brown-600 block w-full p-2.5" required="" />
                            </div>
                            
                            <br>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Already a member? <a href="login.php" class="font-medium text-brown-600 hover:underline dark:text-brown-500">LOG IN</a>
                            </p>
                            <input type="submit" id="login-submit-btn" name="submit" value="Sign In" class=" text-sm px-5 py-2.5 transition duration-250 ease-in text-center"></input>
                            <div class="forgot-password">
                                Forgot Password?
                            </div>
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
</body>

<?php
if(isset($_POST['submit'])){
    // Button is Pressed

    // Get Form Inputs
    $user_name = $_POST['First_name']." ".$_POST['Last_name'];
    $user_email = $_POST['Email'];
    $user_pass = $_POST['password'];

    // Escape mysqli Operators
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $user_email = mysqli_real_escape_string($conn, $user_email);
    $user_pass = mysqli_real_escape_string($conn, $user_pass);

    $user_pass_md5 = md5($user_pass);

    // Insert into Database
    $register_user_sql = "INSERT INTO tb_user SET
    user_name = ?,
    user_pass = ?,
    user_gender = '',
    user_dob = '',
    user_email = ?,
    user_phone = '',
    user_addr = '',
    user_image = '',
    user_isActive = 'True'
    ;";

    $register_user_stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($register_user_stmt, $register_user_sql)){
        // Statement Failed
        $_SESSION['user-sign-up'] = "<p style='color: red;'>Failed creating statement.</p>";
        echo "<script type='text/javascript'>window.location.href='sign-up.php';</script>";
        die();
    }else{
        // Statement Success
        mysqli_stmt_bind_param($register_user_stmt, "sss", $user_name, $user_pass_md5, $user_email);
        mysqli_stmt_execute($register_user_stmt);



        $register_user_res = mysqli_stmt_get_result($register_user_stmt);

        $_SESSION['active-user'] = $user_email;
        echo "<script type='text/javascript'>window.location.href='home.php';</script>";
       
        
    }
}
?>

</html>
