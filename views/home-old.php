<?php
include('./partials/header-visitor.php');
?>

    <div style="margin-top: 100px;" class="relative bg-gray-200 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
        <img src="img/page 1.png" alt="Page 1" class="object-cover w-full" style="height: 700px;">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center z-20 w-11/12 sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-5/12 mx-auto">
            <h2 class="header-text mb-4 text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl">Experience Indonesia for a Cause</h2>
            <p class="sub-text leading-relaxed text-base sm:text-lg md:text-xl lg:text-2xl xl:text-3xl mb-4">At Jelajah, we offer a variety of crafting and cooking courses throughout Indonesia. All our workshop classes are native to the region you will be traveling to, providing you with an opportunity to explore Indonesia's beauty while gaining hands-on experience with its culture.</p>
            <p class="sub-text leading-relaxed text-base sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">Through these workshops, you not only support local artisans but also charitable organizations, as a percentage of your purchase directly contributes to selected charities in Indonesia.</p>
        </div>
    </div>
    
    

    <div class="relative bg-gray-200 overflow-hidden">
        <img src="img/page 2.png" alt="Second Image" class="object-cover w-full" style="height: 500px;">
        <div class="absolute top-1/4 left-1/4 text-center z-20 w-1/2">
            <br><br><br>
            <h2 class="header-text mb-4">Explore destinations in Indonesia</h2>
        </div>
    </div>

    <div class="relative  overflow-hidden flex justify-center items-center" style="height: 500px;" >
        <div class="absolute top-20 left-1/4 text-center z-20 w-1/2">
            <h2 class="header-text mb-4">Where are you traveling to?</h2>
        </div>
        <img src="img/page 3.png" alt="Third Image" class="object-cover w-full h-full">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30 flex items-center w-full sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">
            <div class="w-full h-14 bg-white flex items-center rounded-lg shadow-lg">
                <input style="background-color: white; border: none; outline: none;" type="text" class="w-3/4 h-full px-6 outline-none rounded-l-lg" placeholder="Search for Destinations...">
                <div class="flex items-center justify-end w-1/4 h-full rounded-r-lg">
                    <img src="img/search_icon.png" class="h-full p-3 cursor-pointer" alt="Search Icon">
                </div>
            </div>
        </div>
        
        
    </div>

    <div class="relative bg-white-200 overflow-hidden flex justify-center items-center" style="height: 1000px;" >
        <div class="absolute top-32 left-1/4 text-center z-20 w-1/2">
            <h2 class="header-text blackheader-text mb-4">Workshops</h2>
        </div>
        
        </div>
    </div>
    
    <script>
        function showAlert(menuItem) {
            alert("You clicked on: " + menuItem);
        }
    </script>
    

<?php
include('partials/footer.php');
?>  