const image_input = document.querySelector('#imageInput__form');
var uploaded_image = "";


image_input.addEventListener("change",function(){
    const reader = new FileReader();
    reader.addEventListener("load",()=>{
        uploaded_image = reader.result;
        document.querySelector('#image_form').style.backgroundImage=`url(${uploaded_image})`;
    });
    reader.readAsDataURL(this.files[0]);
})