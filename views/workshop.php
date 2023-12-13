<?php
include('partials/header-visitor.php');
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pottery Workshop</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/workshop-details-styles">
</head>

<body class="font-sans ">
<form action="" method="post">
    <header style="padding-top: 150px;" class="flex items-center justify-start p-4">
    <?php
    include('partials/get-user-data.php');
    include('partials/get-workshop-data.php');
    ?>
        <a href="workshops.php">
            <div class="text-4xl text-custom-color">&lt;&nbsp;</div>
        </a>
        <h1 class="text-4xl text-custom-color ml-4"><?php echo $get_workshop_data_workshop_name;?></h1>
    </header>
    
        <div class="flex items-center mt-1 ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0.490234L13.09 6.75023L20 7.76023L15 12.6302L16.18 19.5102L10 16.2602L3.82 19.5102L5 12.6302L0 7.76023L6.91 6.75023L10 0.490234Z" fill="#FFE768"/>
            </svg>
            <span class="ml-1 text-gray-700">&nbsp;4 (20 ratings)</span>
        </div>
        
        <div class="mt-0 ml-7"> <!-- Adjusted margin top -->
            <div class="flex justify-between items-start"> <!-- Adjusted vertical alignment -->
                <div class="text-left mt-2 ml-8"> <!-- Adjusted margin top and added ml-4 for margin-left -->
                <?php
                // Determine if Wishlist Exists for This User
                $is_wishlisht_sql = "SELECT * FROM tb_user_wishlist
                WHERE user_id='$get_user_info_user_id'
                AND workshop_id='$get_workshop_data_workshop_id'
                ;";

                $is_wishlisht_res = mysqli_query($conn, $is_wishlisht_sql);
                $is_wishlisht_count = mysqli_num_rows($is_wishlisht_res);
                if($is_wishlisht_count == 1){
                    ?>
                        <!-- Wishlist Section Start -->
                        <a href="actions\remove-wishlist-item.php?workshop_id=<?php echo $get_workshop_data_workshop_id;?>" class="text-black flex items-center hover:text-gray-600">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 19">
                                            <path d="M1 16.9415V1.50211C1 0.949821 1.44772 0.5 2 0.5H8H13.5C14.0523 0.5 14.5 0.947716 14.5 1.5V16.8439C14.5 17.6953 13.504 18.1572 12.8541 17.6073L8.62253 14.0268C8.26012 13.7201 7.73206 13.7105 7.35877 14.0038L2.61782 17.7289C1.96169 18.2444 1 17.7759 1 16.9415Z" stroke="#697B51"/>
                                        </svg>
                                    </span>
                                    <span class="ml-1">&nbsp;Remove from Wishlist</span>
                            </a>
                        <!-- Wishlist Section End -->
                    <?php
                }else{
                    ?>
                        <!-- Wishlist Section Start -->
                        <a href="actions\add-wishlist-item.php?workshop_id=<?php echo $get_workshop_data_workshop_id;?>" class="text-black flex items-center hover:text-gray-600">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 19" fill="none">
                                        <path d="M1 16.9415V1.50211C1 0.949821 1.44772 0.5 2 0.5H8H13.5C14.0523 0.5 14.5 0.947716 14.5 1.5V16.8439C14.5 17.6953 13.504 18.1572 12.8541 17.6073L8.62253 14.0268C8.26012 13.7201 7.73206 13.7105 7.35877 14.0038L2.61782 17.7289C1.96169 18.2444 1 17.7759 1 16.9415Z" stroke="#697B51"/>
                                    </svg>
                                </span>
                                <span class="ml-1">&nbsp;Add to Wishlist</span>
                        </a>
                        <!-- Wishlist Section End -->
                    <?php
                }
                ?>
                
                </div>
                <div class="text-right mt-2 mr-4"> <!-- Adjusted margin top and added mr-4 for margin-right -->
                    <div class="mr-10"> <!-- Apply Tailwind's margin-right utility class -->
                        <p class="text-gray-500">Price starts from</p>
                        <p class="text-custom-color font-bold text-2xl">Rp <?php echo $get_workshop_data_workshop_price;?></p>
                        <!-- Adding font-bold for bold text and text-2xl for larger font size -->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-between items-start p-8 mr-4 text-gray-500 ml-6">
            <div class="flex flex-col">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="22" viewBox="0 0 19 22" fill="none">
                        <path d="M18.7324 7.20016C17.6085 2.2548 13.2947 0.0283203 9.50537 0.0283203C9.50537 0.0283203 9.50537 0.0283203 9.49466 0.0283203C5.71604 0.0283203 1.39153 2.2441 0.267582 7.18945C-0.984813 12.7128 2.39773 17.3906 5.45914 20.3343C6.59378 21.4261 8.04959 21.972 9.50537 21.972C10.9611 21.972 12.4169 21.4261 13.5409 20.3343C16.6023 17.3906 19.9848 12.7235 18.7324 7.20016ZM9.50537 12.563C7.64283 12.563 6.1335 11.0537 6.1335 9.19114C6.1335 7.32861 7.64283 5.81931 9.50537 5.81931C11.3679 5.81931 12.8772 7.32861 12.8772 9.19114C12.8772 11.0537 11.3679 12.563 9.50537 12.563Z" fill="#676262"/>
                    </svg>
                    <span>&nbsp;&nbsp;<?php echo $get_workshop_data_workshop_addr?></span>
                </div>
                <div class="flex items-center mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g opacity="0.5">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 6V12L16 14" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </svg>
                    <span>&nbsp;Duration <?php echo $get_workshop_data_workshop_duration?> Minutes</span>
                </div>
             <!-- English or Indonesian -->
             <div class="flex items-center mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path opacity="0.5" d="M19 13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H5L1 19V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>&nbsp;English or Indonesian</span>
            </div>
        

        <!-- What you will learn -->
        <h2 class="font-roboto text-black text-2xl font-medium mt-6">What you will learn</h2>
        <div class="max-w-xl mx-auto">
            <p class="text-black font-inter text-base font-normal leading-8 mt-4">
                <?php echo $get_workshop_data_workshop_desc_l;?>
            </p>
        </div>

        <h2 class="font-roboto text-black text-2xl font-medium mt-6">
            What will you get</h2>
            <ul class="list-disc pl-6 mt-4">
            <?php echo $get_workshop_data_workshop_desc_g;?>
            <!--
                <li class="text-black font-inter text-base font-normal leading-8">Clay (1kg)</li>
                <li class="text-black font-inter text-base font-normal leading-8">Tools & equipments
                <li class="text-black font-inter text-base font-normal leading-8">Supplies</li>
                <li class="text-black font-inter text-base font-normal leading-8">Firing services</li>
                </li>
            -->
            </ul>
    </div>



    
            <div class="bg-gray-300 h-120 px-4 pb-6 border  rounded-lg ">
                <p class="text-gray-600 font-bold text-xl mt-7 text-center">Reserve</p>
                <?php
                if(isset($_SESSION['workshop-message'])){
                    echo $_SESSION['workshop-message'];
                    unset($_SESSION['workshop-message']);
                }
                ?>
                <div class="flex justify-start items-start flex-col">
                    <p class="text-gray-600 mt-6">Number of Guests</p>
                    <select name="input_guests" class="w-60 p-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <!-- Dropdown field with options for numbers 1 to 8 -->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                  
                    <label for="date" class="mt-5">Date:</label>
                    <input type="date" id="date" name="input_date" required class="w-full p-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"> 
                    <p class="text-gray-600 mt-6">Time</p>
                    <input type="time" name="input_time" id="timeSelect" class="w-full p-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    <button class="reserve-button mt-6" onclick="openPopup()" style="
                    display: block;
                    margin: 20px auto 0; /* Set top margin to 20px and auto for left and right margins */
                    width: 70%;
                    padding: 10px 20px;
                    background-color: #697B51; /* Set the background color */
                    color: white; /* Set the text color */
                    border-radius: 7px; /* Add rounded corners */
                    cursor: pointer; /* Add cursor pointer on hover */
                    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Add smooth transitions */
                    text-align: center; /* Center text */
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.324); /* Add box-shadow */
                    " type="button">Reserve Now</button>
                </div>
            </div>
            
        <!-- Popup -->
        <div id="popup" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 z-50 hidden">
            <div class="w-96 h-120 bg-white rounded-lg p-8 relative" style="width: 633px; height: 491px;">
                <!-- Close button as "X" logo -->
                <button onclick="closePopup()" class="absolute top-3 right-3 w-8 h-8 flex justify-center items-center rounded-full bg-gray-400 text-white hover:bg-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <div class="text-black font-roboto font-semibold text-2xl" style="color: #000; text-align: center; font-size: 28px; font-weight: 600; line-height: normal; position: absolute; top: 20px; left: 28px;">
                    Reservation Request
                </div>
                <br>
                <p class="text-black font-roboto text-xl mt-8 text-left">Pottery Workshop at Ubud, Bali</p>
                <div class="flex">
                <img src="img/PotteryRev.jpg" alt="Bottom Image" style="width: 195px; height: 195px; margin-top: 20px; margin-right: 80px;">
                <div class="ml-4 ">
                    <br>
                    <p class="text-gray-600">Date</p>
                    <p id="selectedDate" class="font-semibold text-black"></p>
                    <p class="text-gray-600 mt-2">Time</p>
                    <p id="selectedTime" class="font-semibold text-black"></p>
                    <p class="text-gray-600 mt-2">Number of Guests</p>
                    <p id="selectedGuests" class="font-semibold text-black"></p>
                    <div class="flex justify-end mt-6 mr-10">
                        <input type="submit" name="submit" class="reserve-button ml-auto" style="
                        width: 195px;
                        display: block;
                        margin: 20px auto 0; /* Set top margin to 20px and auto for left and right margins */
                        padding: 10px 20px;
                        background-color: #697B51; /* Set the background color */
                        color: white; /* Set the text color */
                        border-radius: 7px; /* Add rounded corners */
                        cursor: pointer; /* Add cursor pointer on hover */
                        transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Add smooth transitions */
                        text-align: center; /* Center text */
                        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.324); /* Add box-shadow */
                        " value="Add to Cart"></input>
                    </div>
                </div>

                
                        
            </div>
                    
        </div>
    
   

</div>
</div>
</div>
<div class="flex justify-start ml-14 mt-5 mb-10">
    <?php
        // Get Workshop Image
        $get_workshop_image_sql = "SELECT workshop_image FROM tb_workshop_images 
        WHERE workshop_id = '$get_workshop_data_workshop_id' 
        LIMIT 3;";

        $get_workshop_image_res = mysqli_query($conn, $get_workshop_image_sql);
        $counter = 1;
        while($get_workshop_image_row = mysqli_fetch_assoc($get_workshop_image_res)){
            $get_workshop_image_workshop_image = $get_workshop_image_row['workshop_image'];
            ?>
            <img src="../admin/img/workshop/<?php echo $get_workshop_image_workshop_image;?>" alt="Image <?php echo $counter;?>" class="w-64 mr-4">
            <?php
            $counter += 1;
        }
    ?>
</div>
</form>
    <script>
        function openPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        function openPopup() {
        const selectedDate = document.getElementById('date').value;
        const selectedTime = document.getElementById('timeSelect').value;
        const selectedGuests = document.querySelector('select').value;

        document.getElementById('selectedDate').textContent = selectedDate;
        document.getElementById('selectedTime').textContent = selectedTime;
        document.getElementById('selectedGuests').textContent = selectedGuests;

        document.getElementById('popup').classList.remove('hidden');
    }
        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
        document.addEventListener('DOMContentLoaded', function () {
            const timeSelect = document.getElementById('timeSelect');

            // Generate time options at 30-minute intervals
            for (let hour = 0; hour < 24; hour++) {
                for (let minute = 0; minute < 60; minute += 30) {
                    const hourFormatted = String(hour).padStart(2, '0');
                    const minuteFormatted = String(minute).padStart(2, '0');
                    const timeOption = document.createElement('option');
                    timeOption.value = `${hourFormatted}:${minuteFormatted}`;
                    timeOption.textContent = `${hourFormatted}:${minuteFormatted} ${hour < 12 ? 'AM' : 'PM'}`;
                    timeSelect.appendChild(timeOption);
                }
            }
        });
    </script>
<?php

function valid_redirect_add_to_cart(): void{
    echo "<script type='text/javascript'>window.location.href='cart.php';</script>";
}

function invalid_redirect_add_to_cart(): void{
    echo "<script type='text/javascript'>window.location.href='workshop.php?=".$get_workshop_data_workshop_id."';</script>";
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    // Button is Pressed
    $cart_guests = (int)$_POST['input_guests'];
    $cart_date = $_POST['input_date'];
    $cart_time = $_POST['input_time'];

    $add_to_cart_sql = "INSERT INTO tb_user_cart SET
    user_id = '$get_user_info_user_id',
    workshop_id = '$get_workshop_data_workshop_id',
    cart_guests = $cart_guests,
    cart_date = '$cart_date',
    cart_time = '$cart_time'
    ;";

    $add_to_cart_res = mysqli_query($conn, $add_to_cart_sql);
    if($add_to_cart_res == FALSE){
        $_SESSION['workshop-message'] = "<p style='color: red;'>Query Failed</p>";
        invalid_redirect_add_to_cart();
    }else{
        valid_redirect_add_to_cart();
    }


}
include('partials/footer.php');
?>
