const imagePreview = document.getElementById('preview_user_image');
const fileInput = document.getElementById('user_image');

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