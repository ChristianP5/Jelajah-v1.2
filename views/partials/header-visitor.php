<?php
include('./dbconn/connection.php');
?>

<?php
if(isset($_SESSION['active-user'])){
    // Get User's Information
    $get_active_user_email = $_SESSION['active-user'];

    $get_user_info_sql = "SELECT tb_user.user_name, tb_user.user_image FROM tb_user WHERE user_email = ?;";
    $get_user_info_stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($get_user_info_stmt, $get_user_info_sql)){
        // Statement Failed
        $_SESSION['user-login'] = "<p style='color: red;'>Something Went Wrong.</p>";
        $_SESSION['active-user'] = "";
        unset($_SESSION['active-user']);
        include('logout.php');
        echo "<script type='text/javascript'>window.location.href='login.php';</script>";
        die();
    }else{
        // Statement Success
        mysqli_stmt_bind_param($get_user_info_stmt, "s", $get_active_user_email);
        mysqli_stmt_execute($get_user_info_stmt);

        $get_user_info_res = mysqli_stmt_get_result($get_user_info_stmt);
        $get_user_info_row = mysqli_fetch_assoc($get_user_info_res);

        // Get Username
        $get_user_info_user_name = $get_user_info_row['user_name'];
        $get_user_info_user_image = $get_user_info_row['user_image'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/workshop-page-style.css">
</head>



<body class="font-sans relative">
    <?php if(isset($_SESSION['active-user']))
    {
        ?>
        <!-- User Header Old
        <header class="bg-white text-black py-8 flex justify-between items-center px-10 mb-8">
            <h1 class="text-red-900 font-inter font-semibold text-3xl md:text-4xl lg:text-5xl xl:text-6xl ml-10 mt-3 " style="text-shadow: -0.5px 0 black, 0 0.5px black, 0.5px 0 black, 0 -0.5px black;">JELAJAH</h1>
            <nav class="ml-4 mr-10 mt-4">
                <ul class="flex space-x-6">
                    <li><a href="#" class="text-xl hover:text-gray-400"><?php echo $get_user_info_user_name;?></a></li>
                    <li><a href="acc-management.php" class="text-xl hover:text-gray-400">Accounts</a></li>
                    <li><a href="#" class="text-xl hover:text-gray-400">Workshops</a></li>
                    <li><a href="#" class="text-xl hover:text-gray-400">Cart</a></li>
                </ul>
            </nav>
        </header> -->

        <!-- User Header New -->
        <header id="site-header" style="box-shadow: 0 2px 5px gray;" class="fixed top-0 left-0 right-0 bg-white text-black py-8 flex justify-between items-center px-10 mb-8 z-50">
            <a href="./home.php"><div><h1 class="text-red-900 font-inter font-semibold text-3xl md:text-4xl lg:text-5xl xl:text-6xl mt-3" >JELAJAH</h1></div></a>
            
            <nav class="ml-4 mr-10 mt-4 flex items-center">
                <ul class="flex space-x-6 items-center">
                    <li class="relative mt-2" id="acc-management-nav">
                        <p class="accounts-btn-navbar text-base md:text-lg hover:text-gray-400">Accounts</p>
                        <ul id="account-dropdown" class="hidden absolute top-full left-0 bg-white shadow-md py-2 mt-2 w-56 md:w-60 h-auto lg:h-63 border-2 border-gray-300 rounded-lg">
                            <li >  
                            <a href="acc-management.php" class="block px-3 md:px-4 py-2 md:py-3 hover:bg-gray-100 text-sm md:text-base">
                            
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline ml-1">
                            <g id="Group">
                                <path id="Vector" d="M1 18.5C1 17.1739 1.52678 15.9021 2.46447 14.9645C3.40215 14.0268 4.67392 13.5 6 13.5H16C17.3261 13.5 18.5979 14.0268 19.5355 14.9645C20.4732 15.9021 21 17.1739 21 18.5C21 19.163 20.7366 19.7989 20.2678 20.2678C19.7989 20.7366 19.163 21 18.5 21H3.5C2.83696 21 2.20107 20.7366 1.73223 20.2678C1.26339 19.7989 1 19.163 1 18.5Z" stroke="black" stroke-width="2" stroke-linejoin="round"/>
                                <path id="Vector_2" d="M11 8.5C13.0711 8.5 14.75 6.82107 14.75 4.75C14.75 2.67893 13.0711 1 11 1C8.92893 1 7.25 2.67893 7.25 4.75C7.25 6.82107 8.92893 8.5 11 8.5Z" stroke="black" stroke-width="2"/>
                            </g>
                        </svg>
                        &nbsp;Manage Account</a></li>
                            <li>
                            <a href="#" class="block px-3 md:px-4 py-2 md:py-3 hover:bg-gray-100 text-sm md:text-base">
                            
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mr-1">
                            <rect width="24" height="24" fill="url(#pattern0)"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_801_575" transform="scale(0.0078125)"/>
                            </pattern>
                            <image id="image0_801_575" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                            </defs>                        </svg>
                            
                            &nbsp;Reservation</a></li>
                            <li><a href="acc-history.php" class="block px-3 md:px-4 py-2 md:py-3 hover:bg-gray-100 text-sm md:text-base">
                            
                            
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mr-1">
                            <g clip-path="url(#clip0_801_571)">
                            <path d="M17.1429 11.1433L12 19.7147M22.2858 19.7147C22.9913 18.0214 23.2679 16.1801 23.0909 14.3542C22.914 12.5283 22.289 10.7744 21.2715 9.24805C20.2539 7.72171 18.8753 6.4702 17.2579 5.60462C15.6405 4.73903 13.8345 4.28613 12 4.28613C10.1656 4.28613 8.35956 4.73903 6.74219 5.60462C5.12483 6.4702 3.74618 7.72171 2.72862 9.24805C1.71106 10.7744 1.08608 12.5283 0.909136 14.3542C0.732196 16.1801 1.00878 18.0214 1.71432 19.7147H22.2858Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_801_571">
                            <rect width="24" height="24" fill="white"/>
                            </clipPath>
                            </defs>                            </svg>

                            
                            &nbsp;History</a></li>
                            <li><a href="acc-wishlist.php" class="block px-3 md:px-4 py-2 md:py-3 hover:bg-gray-100 text-sm md:text-base">
                            
                            <svg width="24" height="24" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mr-1">
                            <rect width="30" height="30" fill="url(#pattern1)"/>
                            <defs>
                            <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_2086_2803" transform="scale(0.0078125)"/>
                            </pattern>
                            <image id="image0_2086_2803" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                            </defs>                      
                            </svg>

                            Wishlist</a></li>
                            <li><a href="logout.php" class="block px-3 md:px-4 py-2 md:py-3 hover:bg-gray-100 text-sm md:text-base">
                            
                            <svg width="26" height="26" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mr-1">
<path d="M15.7375 16.2501L12.8625 19.1126C12.7453 19.2288 12.6523 19.3671 12.5889 19.5194C12.5254 19.6717 12.4928 19.8351 12.4928 20.0001C12.4928 20.1651 12.5254 20.3285 12.5889 20.4808C12.6523 20.6332 12.7453 20.7714 12.8625 20.8876C12.9787 21.0048 13.117 21.0978 13.2693 21.1612C13.4216 21.2247 13.585 21.2574 13.75 21.2574C13.915 21.2574 14.0784 21.2247 14.2307 21.1612C14.383 21.0978 14.5213 21.0048 14.6375 20.8876L19.6375 15.8876C19.7513 15.7687 19.8405 15.6286 19.9 15.4751C20.025 15.1708 20.025 14.8295 19.9 14.5251C19.8405 14.3717 19.7513 14.2315 19.6375 14.1126L14.6375 9.11262C14.521 8.99608 14.3826 8.90363 14.2303 8.84055C14.078 8.77747 13.9148 8.74501 13.75 8.74501C13.5852 8.74501 13.422 8.77747 13.2697 8.84055C13.1174 8.90363 12.979 8.99608 12.8625 9.11262C12.746 9.22917 12.6535 9.36754 12.5904 9.51981C12.5273 9.67209 12.4949 9.8353 12.4949 10.0001C12.4949 10.1649 12.5273 10.3282 12.5904 10.4804C12.6535 10.6327 12.746 10.7711 12.8625 10.8876L15.7375 13.7501H3.75C3.41848 13.7501 3.10054 13.8818 2.86612 14.1162C2.6317 14.3507 2.5 14.6686 2.5 15.0001C2.5 15.3316 2.6317 15.6496 2.86612 15.884C3.10054 16.1184 3.41848 16.2501 3.75 16.2501H15.7375ZM15 2.50012C12.6639 2.48969 10.3716 3.13414 8.38309 4.36036C6.39461 5.58659 4.78957 7.34551 3.75 9.43762C3.60082 9.73599 3.57627 10.0814 3.68176 10.3979C3.78725 10.7143 4.01413 10.9759 4.3125 11.1251C4.61087 11.2743 4.95628 11.2989 5.27275 11.1934C5.58921 11.0879 5.85082 10.861 6 10.5626C6.79024 8.96678 7.99229 7.6109 9.48194 6.63511C10.9716 5.65932 12.6948 5.09902 14.4734 5.01211C16.2521 4.92521 18.0217 5.31485 19.5994 6.14076C21.1771 6.96668 22.5056 8.19891 23.4476 9.71012C24.3897 11.2213 24.9111 12.9567 24.958 14.7369C25.0049 16.517 24.5756 18.2774 23.7144 19.8361C22.8532 21.3948 21.5914 22.6953 20.0594 23.6032C18.5274 24.511 16.7808 24.9933 15 25.0001C13.1361 25.0082 11.3077 24.4906 9.72461 23.5067C8.14154 22.5228 6.86794 21.1125 6.05 19.4376C5.90082 19.1393 5.63922 18.9124 5.32275 18.8069C5.00628 18.7014 4.66087 18.7259 4.3625 18.8751C4.06413 19.0243 3.83725 19.2859 3.73176 19.6024C3.62627 19.9188 3.65082 20.2643 3.8 20.5626C4.79103 22.557 6.2969 24.2504 8.16184 25.4677C10.0268 26.6849 12.1831 27.3819 14.4077 27.4864C16.6322 27.5908 18.8444 27.0991 20.8152 26.062C22.786 25.0249 24.444 23.4801 25.6176 21.5874C26.7912 19.6947 27.4378 17.5228 27.4906 15.2964C27.5434 13.07 27.0004 10.8699 25.9178 8.92366C24.8352 6.97746 23.2523 5.35583 21.3328 4.22651C19.4134 3.09718 17.227 2.50117 15 2.50012Z" fill="black"/>
                        </svg>
                            
                            Sign Out</a></li>
                        </ul>
                    </li>
                    <li class="mt-2">
                    <a href="workshops.php" class="text-base md:text-lg hover:text-gray-400">Workshops</a></li>
                    <li class="mt-2"><a href="../views/cart.php" class="text-base md:text-lg hover:text-gray-400">Cart</a></li>
                    <li class="flex items-center">
                        <?php
                        if($get_user_info_user_image == ""){
                            ?>
                            <img src="../admin/img/user/default-avatar.jpg" alt="Profile Picture" class="mt-2 w-12 h-12 rounded-full mr-2">
                            <?php
                        }else{
                            ?>
                            <img src="../admin/img/user/<?php echo $get_user_info_user_image;?>" alt="Profile Picture" class="mt-2 w-12 h-12 rounded-full mr-2">
                            <?php
                        }
                        ?>
                        
                        <a href="acc-personal-info.php" class="text-base md:text-lg hover:text-gray-400">
                            <div>
                            <?php echo $get_user_info_user_name;?>
                                <br>
                                <p style="color: #972d20; font-weight: bold;">Penjelajah Level 1</p>
                                
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <script src="./js/header.js"></script>
        <?php
    }else{
        ?>
        
        

        <!-- Visitor Header  -->
        <header class="fixed top-0 left-0 right-0 bg-white text-black py-8 flex justify-between items-center px-10 mb-8" style="box-shadow: 0 2px 5px gray; z-index:50;">
            <a href="../views/home.php"><h1 class="text-red-900 font-inter font-semibold text-3xl md:text-4xl lg:text-5xl xl:text-6xl ml-10 mt-3 " style="text-shadow: -0.5px 0 black, 0 0.5px black, 0.5px 0 black, 0 -0.5px black;">JELAJAH</h1></a>
            <nav class="ml-4 mr-10 mt-4">
                <ul class="flex space-x-6">
                    <li><a href="login.php" class="text-xl hover:text-gray-400">Login</a></li>
                    <li><a href="login.php" class="text-xl hover:text-gray-400">Accounts</a></li>
                    <li><a href="workshops.php" class="text-xl hover:text-gray-400">Workshops</a></li>
                    <li><a href="login.php" class="text-xl hover:text-gray-400">Cart</a></li>
                </ul>
            </nav>
        </header>

        <?php
    }
    ?>
    

    