// Preview The Profile Image When User Upload
const img_input = document.querySelector("#image");
var upload_img = "";

img_input.addEventListener("change", function () {
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        upload_img = reader.result;
        $("#display-img").fadeIn(900);
        document.querySelector(
            "#display-img"
        ).style.backgroundImage = `url(${upload_img})`;
    });
    reader.readAsDataURL(this.files[0]);
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function () {
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
};

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-image-modal")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
};

(function(){
    $(document).on('keyup ', function(e){
        if (e.key == "Escape") {
            modal.style.display = "none";
        }
    }); 

    $('#myModal').on("click", function(){
        modal.style.display = "none";
    });
}());
