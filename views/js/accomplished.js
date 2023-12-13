// Get the HTML Components

  // Pre Popup
  const accSkillsBtns = document.querySelectorAll('.acc-s-btn');

  // Post Popup
  const popupCloseBtns = document.querySelectorAll('.popup-close-btn');
  const popupSpace= document.getElementById('popup-space');
  const popupWindows =  document.querySelectorAll('.popup');

// Setup

accSkillsBtns.forEach(accSkillBtn => {
    accSkillBtn.addEventListener('click', (event) => {
      const pressedSkillBtn = event.target;
        // Display Popup Content based on which button is pressed
        const pressedItem = pressedSkillBtn.parentNode.parentNode;
        const popup = pressedItem.querySelector('.popup');
        popup.style.display = "flex";
        popupSpace.style.display = "block";
        
    });
  });

popupCloseBtns.forEach(popupCloseBtn =>{
  popupCloseBtn.addEventListener('click', ()=>{
    closePopup();
  })
})



// Function Declaration

const closePopup = ()=>{
  popupWindows.forEach(popupWindow =>{
    popupWindow.style.display = "none"
  });
    popupSpace.style.display = "none";
}


// Initialize UI
closePopup();
