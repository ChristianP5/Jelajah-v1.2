const form = document.getElementById('user-p-forms');

// For Image
const fileInput = document.getElementById('fileInput');
const clickableImage = document.getElementById('hoverPreview');
const previewImage = document.getElementById('imagePreview');

clickableImage.addEventListener("click", ()=>{
    fileInput.click();
});

fileInput.addEventListener("change", (event)=>{
    if(event.target.files && event.target.files[0]){
        const reader = new FileReader();

        reader.onload = (e) => {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(event.target.files[0]);
        form.submit();
    }
})

// ======================================================

// For onFocus Submit
const formInputs = document.querySelectorAll('input');
const formSelects = document.querySelectorAll('select');

formInputs.forEach((input)=>{
    input.addEventListener('focusout', ()=>{
        form.submit();
        
    })
})

formSelects.forEach((input)=>{
    input.addEventListener('focusout', ()=>{
        form.submit();
    })
})