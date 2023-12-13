<?php

include('partials/header-visitor.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home-page.css">


    <link rel="stylesheet" href="css/workshop-page-style-for-home-page.css">
    <script id="site-header" src="loginHeader.js" defer></script>

    <script src = "js/home-page.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    

</head>

<body class="font-sans relative">

    <br>
    <div class="mt-16 relative bg-gray-200 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
        <img src="img/page 1.png" alt="Page 1" class="object-cover w-full" style="height: 700px;">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center z-20 w-full mx-auto" >
            <h2 class="header-text mb-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl">Experience Indonesia for a Cause</h2>
            <p class="sub-text leading-relaxed text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl mb-4">At Jelajah, we offer a variety of crafting and cooking courses <br> throughout Indonesia. All our workshop classes are native to the <br>region you will be traveling to, providing you with an opportunity to<br> explore Indonesia's beauty while gaining hands-on experience with its <br>culture.</p>
            <p class="sub-text leading-relaxed text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl">Through these workshops, you not only support local artisans but also <br>charitable organizations, as a percentage of your purchase directly <br> contributes to selected charities in Indonesia.</p>
        </div>
    </div>
    
    
    
    
    

    <div class="relative bg-gray-200 overflow-hidden flex justify-center items-center" style="height: 500px;">
        <img src="img/page 2.png" alt="Second Image" class="object-cover w-full" style="height: 500px;">
        <div class="absolute text-center z-20" >
            <div class="mx-auto my-auto">
                <h2 class="header-text mb-4">Explore destinations in Indonesia</h2>
            </div>
        
        </div>
    </div>
    

    <div class="relative overflow-hidden flex justify-center items-center" style="height: 500px;">
        <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center z-20 w-3/4" style="margin-top: 50px;">
            <h2 class="header-text mb-4" >Which workshop would you like to attend?</h2>
        </div>
        <img src="img/home-page/NewWorkshop.png" alt="Third Image" class="object-cover w-full h-full">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30 flex items-center w-full sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3" style="margin-top: 50px;">
            <div class="w-full h-14 bg-white flex items-center rounded-lg shadow-lg">
                <input type="text" class="w-3/4 h-full px-6 outline-none rounded-l-lg" placeholder="Search for Destinations...">
                <div class="flex items-center justify-end w-1/4 h-full rounded-r-lg">
                    <img src="img/home-page/search_icon.png" class="h-full p-3 cursor-pointer" alt="Search Icon">
                </div>
            </div>
        </div>
        
        
    </div>

    <div class="relative bg-white-200 overflow-hidden flex justify-center items-center" style="height: 700px;" >
        <div class="absolute top-32 left-1/4 text-center z-20 w-1/2">
            <h2 class="header-text blackheader-text mb-4">Workshops</h2>
            
        </div>
            <!--Crafting workshops starts-->
            <!-- first section -->
            <div class="container" style="margin: 0;">

               <div style="position: relative; top: 200px;">
                <div>
                    <button class = "ml-40 left-arrow-crafting"  type = "button" data-carousel-button = "prev">
                        <img id = "leftCrafting" src="img/home-page/left-arrow-2.png" alt="left-arrow">
                    </button>
                </div>
                <div>
                    <button class = "mr-40 right-arrow-crafting" type = "button" data-carousel-button = "next">
                        <img id = "rightCrafting" src="img/home-page/right-arrow.png" alt="right-arrow">
                    </button>
                </div>
               </div>
                
    
               
    
            <!--Crafting workshops starts-->
                <!-- first section -->
            <div class = "batchCraft mt-72" style="
            display: flex;
            gap: 120px;">

            <!-- First Part Start -->
                <div class="craft" style="margin-left: 50px; margin-right: 50px; padding: 20px;">
                <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True'
                        LIMIT 3";
                        $get_all_workshops_res = mysqli_query($conn, $get_all_workshops_sql);
                        while($get_all_workshops_rows = mysqli_fetch_assoc($get_all_workshops_res)){
                            // Get the Workshop Data
                            $get_all_workshops_workshop_id = $get_all_workshops_rows['workshop_id'];
                            $get_all_workshops_workshop_name = $get_all_workshops_rows['workshop_name'];
                            $get_all_workshops_workshop_addr = $get_all_workshops_rows['workshop_addr'];
                            $get_all_workshops_workshop_duration = $get_all_workshops_rows['workshop_duration'];
                            $get_all_workshops_workshop_date = $get_all_workshops_rows['workshop_date'];
                            $get_all_workshops_workshop_time = $get_all_workshops_rows['workshop_time'];
                            $get_all_workshops_workshop_price = $get_all_workshops_rows['workshop_price'];
                            
                            // Get the Workshop Image Data
                            $get_all_workshops_workshop_image_sql = "SELECT * FROM tb_workshop_images WHERE workshop_id = '$get_all_workshops_workshop_id' LIMIT 1";
                            $get_all_workshops_workshop_image_res = mysqli_query($conn, $get_all_workshops_workshop_image_sql);
                            $get_all_workshops_workshop_image_count = mysqli_num_rows($get_all_workshops_workshop_image_res);
                            if($get_all_workshops_workshop_image_count > 0){
                                $get_all_workshops_workshop_image_row = mysqli_fetch_assoc($get_all_workshops_workshop_image_res);

                                $get_all_workshops_workshop_image_workshop_image = $get_all_workshops_workshop_image_row['workshop_image'];
                            }else{
                                $get_all_workshops_workshop_image_workshop_image = "";
                            }

                            ?>
                            <!-- Craft Item Design Start -->
                                <div class="craft-item">
                                    <a class="button-craft" type="button" href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                    <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                        <div class= "label" > 
                                            <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                                <div class="desc">
                                                    <p>
                                                        <span style="margin-top: 20px;" class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                        <span class="right-content"><br>Jogja</span>
                                                    </p>
                                                </div>  
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Craft Item Design End -->
                                <?php
                        }
                                ?>
                    
                    
                </div>
                <!-- First Part End -->

                <!-- Second Part Start -->
                <div class="craft" style="margin-left: 1px; margin-right: 30px; padding: 20px;">

                <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True'
                        LIMIT 3 OFFSET 3";
                        $get_all_workshops_res = mysqli_query($conn, $get_all_workshops_sql);
                        while($get_all_workshops_rows = mysqli_fetch_assoc($get_all_workshops_res)){
                            // Get the Workshop Data
                            $get_all_workshops_workshop_id = $get_all_workshops_rows['workshop_id'];
                            $get_all_workshops_workshop_name = $get_all_workshops_rows['workshop_name'];
                            $get_all_workshops_workshop_addr = $get_all_workshops_rows['workshop_addr'];
                            $get_all_workshops_workshop_duration = $get_all_workshops_rows['workshop_duration'];
                            $get_all_workshops_workshop_date = $get_all_workshops_rows['workshop_date'];
                            $get_all_workshops_workshop_time = $get_all_workshops_rows['workshop_time'];
                            $get_all_workshops_workshop_price = $get_all_workshops_rows['workshop_price'];
                            
                            // Get the Workshop Image Data
                            $get_all_workshops_workshop_image_sql = "SELECT * FROM tb_workshop_images WHERE workshop_id = '$get_all_workshops_workshop_id' LIMIT 1";
                            $get_all_workshops_workshop_image_res = mysqli_query($conn, $get_all_workshops_workshop_image_sql);
                            $get_all_workshops_workshop_image_count = mysqli_num_rows($get_all_workshops_workshop_image_res);
                            if($get_all_workshops_workshop_image_count > 0){
                                $get_all_workshops_workshop_image_row = mysqli_fetch_assoc($get_all_workshops_workshop_image_res);

                                $get_all_workshops_workshop_image_workshop_image = $get_all_workshops_workshop_image_row['workshop_image'];
                            }else{
                                $get_all_workshops_workshop_image_workshop_image = "";
                            }

                            ?>
                            <!-- Craft Item Design Start -->
                                <div class="craft-item">
                                    <a class="button-craft" type="button" href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                    <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                        <div class= "label" > 
                                            <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                                <div class="desc">
                                                    <p>
                                                        <span style="margin-top: 20px;" class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                        <span class="right-content"><br>Jogja</span>
                                                    </p>
                                                </div>  
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Craft Item Design End -->
                                <?php
                        }
                                ?>

                </div>
            <!-- Second Part Emd -->


                <!-- second section -->
                <div class="craft" style="margin-left: 10px; margin-right: 10px; padding: 20px;">
                <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True'
                        LIMIT 3 OFFSET 6";
                        $get_all_workshops_res = mysqli_query($conn, $get_all_workshops_sql);
                        while($get_all_workshops_rows = mysqli_fetch_assoc($get_all_workshops_res)){
                            // Get the Workshop Data
                            $get_all_workshops_workshop_id = $get_all_workshops_rows['workshop_id'];
                            $get_all_workshops_workshop_name = $get_all_workshops_rows['workshop_name'];
                            $get_all_workshops_workshop_addr = $get_all_workshops_rows['workshop_addr'];
                            $get_all_workshops_workshop_duration = $get_all_workshops_rows['workshop_duration'];
                            $get_all_workshops_workshop_date = $get_all_workshops_rows['workshop_date'];
                            $get_all_workshops_workshop_time = $get_all_workshops_rows['workshop_time'];
                            $get_all_workshops_workshop_price = $get_all_workshops_rows['workshop_price'];
                            
                            // Get the Workshop Image Data
                            $get_all_workshops_workshop_image_sql = "SELECT * FROM tb_workshop_images WHERE workshop_id = '$get_all_workshops_workshop_id' LIMIT 1";
                            $get_all_workshops_workshop_image_res = mysqli_query($conn, $get_all_workshops_workshop_image_sql);
                            $get_all_workshops_workshop_image_count = mysqli_num_rows($get_all_workshops_workshop_image_res);
                            if($get_all_workshops_workshop_image_count > 0){
                                $get_all_workshops_workshop_image_row = mysqli_fetch_assoc($get_all_workshops_workshop_image_res);

                                $get_all_workshops_workshop_image_workshop_image = $get_all_workshops_workshop_image_row['workshop_image'];
                            }else{
                                $get_all_workshops_workshop_image_workshop_image = "";
                            }

                            ?>
                            <!-- Craft Item Design Start -->
                                <div class="craft-item">
                                    <a class="button-craft" type="button" href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                    <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                        <div class= "label" > 
                                            <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                                <div class="desc">
                                                    <p>
                                                        <span style="margin-top: 20px;" class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                        <span class="right-content"><br>Jogja</span>
                                                    </p>
                                                </div>  
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Craft Item Design End -->
                                <?php
                        }
                                ?>
                    
            
                </div>
                <div class="craft" style="margin-left: 10px; margin-right: 10px; padding: 20px;">
                <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True'
                        LIMIT 3 OFFSET 9";
                        $get_all_workshops_res = mysqli_query($conn, $get_all_workshops_sql);
                        while($get_all_workshops_rows = mysqli_fetch_assoc($get_all_workshops_res)){
                            // Get the Workshop Data
                            $get_all_workshops_workshop_id = $get_all_workshops_rows['workshop_id'];
                            $get_all_workshops_workshop_name = $get_all_workshops_rows['workshop_name'];
                            $get_all_workshops_workshop_addr = $get_all_workshops_rows['workshop_addr'];
                            $get_all_workshops_workshop_duration = $get_all_workshops_rows['workshop_duration'];
                            $get_all_workshops_workshop_date = $get_all_workshops_rows['workshop_date'];
                            $get_all_workshops_workshop_time = $get_all_workshops_rows['workshop_time'];
                            $get_all_workshops_workshop_price = $get_all_workshops_rows['workshop_price'];
                            
                            // Get the Workshop Image Data
                            $get_all_workshops_workshop_image_sql = "SELECT * FROM tb_workshop_images WHERE workshop_id = '$get_all_workshops_workshop_id' LIMIT 1";
                            $get_all_workshops_workshop_image_res = mysqli_query($conn, $get_all_workshops_workshop_image_sql);
                            $get_all_workshops_workshop_image_count = mysqli_num_rows($get_all_workshops_workshop_image_res);
                            if($get_all_workshops_workshop_image_count > 0){
                                $get_all_workshops_workshop_image_row = mysqli_fetch_assoc($get_all_workshops_workshop_image_res);

                                $get_all_workshops_workshop_image_workshop_image = $get_all_workshops_workshop_image_row['workshop_image'];
                            }else{
                                $get_all_workshops_workshop_image_workshop_image = "";
                            }

                            ?>
                            <!-- Craft Item Design Start -->
                                <div class="craft-item">
                                    <a class="button-craft" type="button" href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                    <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                        <div class= "label" > 
                                            <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                                <div class="desc">
                                                    <p>
                                                        <span style="margin-top: 20px;" class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                        <span class="right-content"><br>Jogja</span>
                                                    </p>
                                                </div>  
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Craft Item Design End -->
                                <?php
                        }
                                ?>
                    
                    
                </div>
                
            </div>
        </div>
        
    </div>
    <div class="flex justify-center items-center">
        <a href="workshops.php  " class="mt-20 bg-white hover:bg-gray-100 text-green-700 font-semibold py-2 px-4 border border-green-800 border-opacity-100 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
          Explore More
                    </a>
      </div>
      
        <!--Crafting workshops ends-->
    </div>
    
<div class="relative bg-white-200 overflow-hidden flex justify-center items-center" style="height: 700px;">
  <div class="absolute top-32 left-1/4 text-center z-20 w-1/2">
    <h2 class="header-text blackheader-text mb-4">Why Us</h2>
  </div>
  <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2" style="width: 80%; max-width: 1440px;">
    <img
      src="img/home-page/whyUsImg.png"
      alt="Why Us Image"
      class="w-full h-auto object-cover z-10"
      style="max-width: 1440px; max-height: 1024px; transform-origin: center; transform: scale(1);"
    />
  </div>
</div>

    
<div class="relative bg-white-200 overflow-hidden flex justify-center items-center" style="height: 700px;">
    <div class="absolute top-32 left-1/2 transform -translate-x-1/2 text-center z-20 ">
        <h2 class="header-text blackheader-text mb-4">Our Commitment</h2>
        <h2 class="header-text blackheader-text mb-4 font-roboto font-medium whitespace-nowrap text-center" style="color: var(--Light-Green, #697B51); font-size: 220%;">
            Experience Indonesia for a Cause
        </h2>
        <h2 class="mt-8 header-text blackheader-text mb-4 font-roboto font-medium whitespace-nowrap text-center" style="color: var(--Light-Green, #000000); font-size: 120%;">
            JELAJAH is not only committed to give you an experience travelling in Indonesia like no<br>other, but is also committed to be impactful for locals all across Indonesia through our<br>programs that are directly intergrated with your workshop purchases        </h2>
            <div class="flex justify-between mt-8 w-full">
                <svg style="margin-left:90px;" xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                    <path d="M10.5 31.5L42 7L73.5 31.5V70C73.5 71.8565 72.7625 73.637 71.4497 74.9497C70.137 76.2625 68.3565 77 66.5 77H17.5C15.6435 77 13.863 76.2625 12.5503 74.9497C11.2375 73.637 10.5 71.8565 10.5 70V31.5Z" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M31.5 77V42H52.5V77" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                    <path d="M56 14H63C64.8565 14 66.637 14.7375 67.9497 16.0503C69.2625 17.363 70 19.1435 70 21V70C70 71.8565 69.2625 73.637 67.9497 74.9497C66.637 76.2625 64.8565 77 63 77H21C19.1435 77 17.363 76.2625 16.0503 74.9497C14.7375 73.637 14 71.8565 14 70V21C14 19.1435 14.7375 17.363 16.0503 16.0503C17.363 14.7375 19.1435 14 21 14H28" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M52.5 7H31.5C29.567 7 28 8.567 28 10.5V17.5C28 19.433 29.567 21 31.5 21H52.5C54.433 21 56 19.433 56 17.5V10.5C56 8.567 54.433 7 52.5 7Z" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
    
                <svg style="margin-right:90px"  xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                    <path d="M42 28C59.397 28 73.5 23.299 73.5 17.5C73.5 11.701 59.397 7 42 7C24.603 7 10.5 11.701 10.5 17.5C10.5 23.299 24.603 28 42 28Z" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M73.5 42C73.5 47.81 59.5 52.5 42 52.5C24.5 52.5 10.5 47.81 10.5 42" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.5 17.5V66.5C10.5 72.31 24.5 77 42 77C59.5 77 73.5 72.31 73.5 66.5V17.5" stroke="#972D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="mt-8 header-text blackheader-text mb-4 font-roboto font-medium whitespace-nowrap text-center" style="color: var(--Light-Green, #000000); font-size: 100%; margin-right: 800px;">
                Our workshops are done in local areas<br>including local workshops where locals<br>live and carry out their day-to-day life    </div>
                <h2 class=" mr-40 header-text blackheader-text mb-4 font-roboto font-medium whitespace-nowrap text-center" style="color: var(--Light-Green, #000000); font-size: 100%; margin-top: 520px;margin-left: 650px;">
                    We are committed to give you hands<br>on experience and make your time<br>with our instructors the best time of<br>your life
                
                    <h2 class="header-text blackheader-text mb-30 font-roboto font-medium whitespace-nowrap text-center" style="color: var(--Light-Green, #000000); font-size: 100%; margin-right:240px; margin-top: 505px;">
                        Every time you join our workshops, a<br>percentage of what you are paying<br>directly goes to charity we support<br>across Indonesia                </div>


                        
                        
                        
                        
                        
                        
                        





    <script>
        function showAlert(menuItem) {
            alert("You clicked on: " + menuItem);
        }
    </script>
<script>
document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowLeft') {
        showWorkshop('prev');
    } else if (event.key === 'ArrowRight') {
        showWorkshop('next');
    }
});

let currentIndex = 1;
const totalWorkshops = 4;

function showWorkshop(direction) {
    const currentWorkshop = document.getElementById(`workshop-item-${currentIndex}`);
    currentWorkshop.classList.add('hidden');

    if (direction === 'next') {
        currentIndex = (currentIndex % totalWorkshops) + 1;
    } else if (direction === 'prev') {
        currentIndex = currentIndex - 1 <= 0 ? totalWorkshops : currentIndex - 1;
    }

    const nextWorkshop = document.getElementById(`workshop-item-${currentIndex}`);
    nextWorkshop.classList.remove('hidden');
    nextWorkshop.classList.add(direction === 'next' ? 'slide-in-right' : 'slide-in-left');

    setTimeout(() => {
        currentWorkshop.classList.remove('slide-in-left', 'slide-in-right');
    }, 500); // Animation duration is 0.5s (500ms)
}

function redirectToCart() {
    // Implement your logic to redirect to the cart page
    alert("Redirect to cart page");
}


</script>
<?php

include('partials/footer.php');

?>
