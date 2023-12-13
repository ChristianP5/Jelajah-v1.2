let scrollContainer = document.querySelector(".batch");
let scrollContainerCook = document.querySelector(".batchCook");
let scrollContainerReview = document.querySelector(".batchReview");

let leftCrafting = document.getElementById("leftCrafting");
let rightCrafting = document.getElementById("rightCrafting");

let leftCooking = document.getElementById("leftCooking");
let rightCooking = document.getElementById("rightCooking");

let leftReview = document.getElementById("leftReview");
let rightReview = document.getElementById("rightReview");

// scrollContainer.addEventListener("wheel", (evt) => {
//     evt.preventDefault();
//     scrollContainer.scrollLeft += evt.deltaY;
//     scrollContainer.style.scrollBehavior = "auto";

// });

leftCrafting.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft -= 3000;
});

rightCrafting.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft += 3000;
    
});


// scrollContainerCook.addEventListener("wheel", (evt) => {
//     evt.preventDefault();
//     scrollContainerCook.scrollLeft += evt.deltaY;
//     scrollContainerCook.style.scrollBehavior = "auto";

// });

leftCooking.addEventListener("click", () => {
    scrollContainerCook.style.scrollBehavior = "smooth";
    scrollContainerCook.scrollLeft -= 3000;
});

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