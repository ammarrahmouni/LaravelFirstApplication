const img_input = document.querySelector('#image');
var upload_img = "";

img_input.addEventListener('change', function(){
    const reader = new FileReader();
    reader.addEventListener('load', () => {
       upload_img = reader.result;
       $('#display-img').fadeIn(900);
       document.querySelector('#display-img').style.backgroundImage = `url(${upload_img})`;
    });
    reader.readAsDataURL(this.files[0]);
})
