let scrollContainer = document.querySelector(".batchCraft");
let scrollContainerCook = document.querySelector(".batchCook");
let scrollContainerReview = document.querySelector(".batchReview");

let leftCrafting = document.getElementById("leftCrafting");
let rightCrafting = document.getElementById("rightCrafting");

let leftCooking = document.getElementById("leftCooking");
let rightCooking = document.getElementById("rightCooking");

let leftReview = document.getElementById("leftReview");
let rightReview = document.getElementById("rightReview");


//Event Listener to scroll crafting carousel 3000 to the left
leftCrafting.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft -= 1470;
});

//Event Listener to scroll crafting carousel 3000 to the right 
rightCrafting.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft += 1470;
    
});

//Event Listener to scroll carousel 3000 to the left
leftCooking.addEventListener("click", () => {
    scrollContainerCook.style.scrollBehavior = "smooth";
    scrollContainerCook.scrollLeft -= 3000;
});

//Event Listener to scroll carousel 3000 to the right
rightCooking.addEventListener("click", () => {
    scrollContainerCook.style.scrollBehavior = "smooth";
    scrollContainerCook.scrollLeft += 3000;
    
});

leftReview.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft -= 1000;
});

rightReview.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft += 1000;
    
});



// function toggleDropdown() {
//     var dropdownContent = document.getElementById('dropdownContent');
//     dropdownContent.classList.toggle('active');
// }

// function toggleDropdown3() {
//     var dropdownContent = document.getElementById('dropdownContent3');
//     dropdownContent.classList.toggle('active');
// }


document.addEventListener('DOMContentLoaded', function () {
    var dropdownContent = document.getElementById('dropdownContent');
    var dropdownContent2 = document.getElementById('dropdownContent2');
    var dropdownContent3 = document.getElementById('dropdownContent3');

    // Function to toggle the dropdown content visibility
    function toggleDropdown() {
        dropdownContent.classList.toggle('active');
    }

    function toggleDropdown2() {
        dropdownContent2.classList.toggle('active');
    }

    function toggleDropdown3() {
        dropdownContent3.classList.toggle('active');
    }


    // Add click event listener for the "Where" dropdown
    document.querySelector('.dropdown-trigger').addEventListener('click', function (event) {
        event.stopPropagation(); // Prevents the click from reaching the document
        toggleDropdown();
    });

    document.querySelector('.dropdown-trigger2').addEventListener('click', function (event) {
        event.stopPropagation(); 
        toggleDropdown2();
    });

    document.querySelector('.dropdown-trigger3').addEventListener('click', function (event) {
        event.stopPropagation(); 
        toggleDropdown3();
    });


    // Add click event listener to close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!dropdownContent.contains(event.target)) {
            dropdownContent.classList.remove('active');
        }
    });

    document.addEventListener('click', function (event) {
        if (!dropdownContent2.contains(event.target)) {
            dropdownContent2.classList.remove('active');
        }
    });

    document.addEventListener('click', function (event) {
        if (!dropdownContent3.contains(event.target)) {
            dropdownContent3.classList.remove('active');
        }
    });
});



// var flatpickrInstance = flatpickr(calendarDropdown, {
//         inline: true,
//         onChange: function (selectedDates, dateStr) {
//             // Handle date selection if needed
//             console.log(dateStr);
//         }
//     });

