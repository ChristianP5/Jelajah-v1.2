const imagePreview = document.getElementById('preview_workshop_image');
const fileInput = document.getElementById('workshop_image');

// Add onChange Event Listener

fileInput.addEventListener('change',(event)=>{
    if(event.target.files && event.target.files[0]){
        const reader = new FileReader();

        reader.onload = (e) => {
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(event.target.files[0]);
    }
})