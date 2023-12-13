<?php
    include('partials/header-visitor.php');


    
?>    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Workshop Page</title>
        <link rel="stylesheet" href="../views/css/workshop-page-style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        
    </head>

    
        
    <body> 

    <script src = "../views/js/workshop-page.js" defer></script>
        <!--Header starts-->
        <div class="header">
            <h1>Join a Workshop</h1>
            <p>Find and Book the Workshop you wanted from your chosen city to<br>experience the culture</p>
        </div>
        <!--Header ends-->

        <!-- searchbar starts -->

        <!-- <div class="search-overlay">
            <div class="search-container">
                
                <input type="text" id="where" placeholder=" ">
                <button class="search" type="submit">
                    <img class="search-button" src="img/search-button.png" alt="Search">
                </button>
            </div>
        </div> -->

        <!-- searchbar ends -->

        <!-- filter category -->

        <div>
            <div class = "dropdowns">
                <p><a href="#where">Where&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
                <p><a href="#when">When&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
                <p><a href="#guest">&nbsp;How many Guest&nbsp;&nbsp;&nbsp;&nbsp;</a></p>

                <button class="search" type="submit">
                    <img class="search-button" src="../views/img/workshops-page/search-button2.png" alt="Search">
                </button>
            </div>

            <div class = "lines">
                <div class = "line1"></div>
                <div class = "line2"></div>

            </div>

            
        
        </div>

        

        <div class="container">

            <!-- crafting arrows -->
            <div>
                <button class = "left-arrow-crafting"  type = "button" data-carousel-button = "prev">
                    <img id = "leftCrafting" src="../views/img/workshops-page/left-arrow-2.png" alt="left-arrow">
                </button>
            </div>
            <div>
                <button class = "right-arrow-crafting" type = "button" data-carousel-button = "next">
                    <img id = "rightCrafting" src="../views/img/workshops-page/right-arrow.png" alt="right-arrow">
                </button>
            </div>

            <!-- cooking arrows -->
            <div>
                <button class = "left-arrow-cooking" type = "button" data-carousel-button = "prev">
                    <img id = "leftCooking" src="../views/img/workshops-page/left-arrow-2.png" alt="left-arrow">
                </button>
            </div>
            <div>
                <button class = "right-arrow-cooking" type = "button" data-carousel-button = "next">
                    <img id = "rightCooking" src="../views/img/workshops-page/right-arrow.png" alt="right-arrow">
                </button>
            </div>

            <div class = crafting-title>
                <h1>Crafting</h1>
            </div>

        <!--Crafting workshops starts-->
            <!-- first section -->
            <div class = "batch">
                <div class="craft">
                    <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True' AND workshop_type = 'Crafting'
                        LIMIT 6";
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
                            <!-- ITEM DESIGN START -->
                            <div class="craft-item">
                                <a href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                <div class="button-craft" >
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
                                                    <span class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                    <span class="right-content"><br>Jogja</span>
                                                </p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <!-- ITEM DESIGN END -->
                            <?php
                        }
                    ?>
                    
                    
                    
                </div>
            


                <!-- second section -->
                <div class="craft">
                    
                <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True' AND workshop_type = 'Crafting'
                        LIMIT 6 OFFSET 6";
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
                            <!-- ITEM DESIGN START -->
                            <div class="craft-item">
                                <a href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                <div class="button-craft" >
                                <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img style="width: 100%;" alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img style="width: 100%;" alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    <div class= "label" > 
                                        <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                            <div class="desc">
                                                <p>
                                                    <span class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                    <span class="right-content"><br>Jogja</span>
                                                </p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <!-- ITEM DESIGN END -->
                            <?php
                        }
                    ?>
                    
            
                </div>
            </div>
        </div>
    </div>

        <!--Crafting workshops ends-->

        <!--Cooking workshops starts-->
        <div class="container">
            
            <div class = "cooking-title">
                <h1>Cooking</h1>
            </div>

            
                <div class = batchCook>
                    <div class="cook">

                    <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True' AND workshop_type = 'Cooking'
                        LIMIT 6";
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
                            <!-- ITEM DESIGN START -->
                            <div class="craft-item">
                                <a href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                <div class="button-craft" >
                                <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img style="width: 100%;" alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img style="width: 100%;" alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    
                                    <div class= "label" > 
                                        <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                            <div class="desc">
                                                <p>
                                                    <span class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                    <span class="right-content"><br>Jogja</span>
                                                </p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <!-- ITEM DESIGN END -->
                            <?php
                        }
                    ?>
                        
                    </div>

                    <!-- Second Section -->
                    <?php
                    // Get All Workshop Data
                        $get_all_workshops_sql = "SELECT * FROM tb_workshop 
                        WHERE workshop_isActive = 'True' AND workshop_type = 'Cooking'
                        LIMIT 6 OFFSET 6";
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
                            
                            ?>
                            <!-- ITEM DESIGN START -->
                            <div class="craft-item">
                                <a href="workshop.php?workshop_id=<?php echo $get_all_workshops_workshop_id;?>">
                                <div class="button-craft" >
                                <div class="workshop-img" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                                    <?php
                                        if($get_all_workshops_workshop_image_workshop_image != ""){
                                            ?>
                                            <img style="width: 100%;" alt = "pottery-workshop" src="../admin/img/workshop/<?php echo $get_all_workshops_workshop_image_workshop_image; ?>" >
                                            <?php
                                        }else{
                                            ?>
                                            <img style="width: 100%;" alt = "pottery-workshop" src="../views/img/workshops-page/pottery_new.png" >
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    
                                    <div class= "label" > 
                                        <div class = "label-pottery">
                                            <h1><?php echo $get_all_workshops_workshop_name;?></h1>
                                            <div class="desc">
                                                <p>
                                                    <span class="left-content"><?php echo $get_all_workshops_workshop_date;?><br>Rp <?php echo $get_all_workshops_workshop_price;?></span>
                                                    <span class="right-content"><br>Jogja</span>
                                                </p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <!-- ITEM DESIGN END -->
                            <?php
                        }
                    ?>

                    
                    </div>
                </div>
            </div>
                <!--Cooking workshops ends-->


            <div class = "container">
                <div class = "review-title">
                    <h1> Workshop Reviews</h1>
                </div>
                
                <!-- review arrows -->
                <div>
                    <button class = "left-arrow-review"  type = "button" data-carousel-button = "prev">
                        <img id = "leftReview" src="../views/img/workshops-page/left-arrow-2.png" alt="left-arrow">
                    </button>
                </div>
                <div>
                    <button class = "right-arrow-review" type = "button" data-carousel-button = "next">
                        <img id = "rightReview" src="../views/img/workshops-page/right-arrow.png" alt="right-arrow">
                    </button>
                </div>

            <!-- Review section starts here -->

                <div class="batchReview">
                    <div class="reviews">
                        <!-- Review Item Start -->
                        <div class="review-item">
                            <button class="button-review" type="button">
                                <div class="img-box">
                                    <img id = "batik-review" alt = "batik-review" src="../admin/img/workshop/default-image.jpg">
                                </div>
                                <div class= "label-review" > 
                                        <div class="desc">
                                        <h1 class="review-title">Batik</h1>
                                            <div class = "rating">
                                                <img class = "star" src = "../views/img/workshops-page/star.png" >
                                                <p > 4.2 (16 rating)</p>
                                            </div>
                                                <p class="review-desc">“Bener bener berasa lagi terapi, pemandangan hijau hutan yang bikin adem <br> sambil buat keramik yang seru banget, puas bgt ikut workshop ini!”</p>
                                        </div>     
                                </div>
                            </button>
                        </div>
                        <!-- Review Item End -->

                        <!-- Review Item Start -->
                        <div class="review-item">
                            <button class="button-review" type="button">
                                <div class="img-box">
                                    <img id = "batik-review" alt = "batik-review" src="../admin/img/workshop/default-image.jpg">
                                </div>
                                <div class= "label-review" > 
                                        <div class="desc">
                                        <h1 class="review-title">Batik</h1>
                                            <div class = "rating">
                                                <img class = "star" src = "../views/img/workshops-page/star.png" >
                                                <p > 4.2 (16 rating)</p>
                                            </div>
                                                <p class="review-desc">“Bener bener berasa lagi terapi, pemandangan hijau hutan yang bikin adem <br> sambil buat keramik yang seru banget, puas bgt ikut workshop ini!”</p>
                                        </div>     
                                </div>
                            </button>
                        </div>
                        <!-- Review Item End -->

                        <!-- Review Item Start -->
                        <div class="review-item">
                            <button class="button-review" type="button">
                                <div class="img-box">
                                    <img id = "batik-review" alt = "batik-review" src="../admin/img/workshop/default-image.jpg">
                                </div>
                                <div class= "label-review" > 
                                        <div class="desc">
                                        <h1 class="review-title">Batik</h1>
                                            <div class = "rating">
                                                <img class = "star" src = "../views/img/workshops-page/star.png" >
                                                <p > 4.2 (16 rating)</p>
                                            </div>
                                                <p class="review-desc">“Bener bener berasa lagi terapi, pemandangan hijau hutan yang bikin adem <br> sambil buat keramik yang seru banget, puas bgt ikut workshop ini!”</p>
                                        </div>     
                                </div>
                            </button>
                        </div>
                        <!-- Review Item End -->
                        
                    </div>
                </div>

        </div>
        <!-- Review section ends -->

    </div>


<?php

include('partials/footer.php');

?>