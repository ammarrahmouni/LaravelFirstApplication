(function(){

    var direction = $('html').attr('dir');
    if(direction == 'rtl'){
        // $('.form-group label').css('margin-left', '80%');
        // $('#display-img').css('margin-right', '25%');
        $('.saved-post ').css({
            'right': '50%',
            'margin-right': '-250px'
        })

     
    }
    else if(direction == 'ltr'){
        // $('.form-group label').css('margin-left', '0');
        // $('#display-img').css('margin-right', '0');
        $('.saved-post ').css({
            'left': '50%',
            'margin-left': '-250px'
        })
       


    }

    
    $postLength = $('.post-description').val.length;

    $('.post-description textarea').on('keyup', function(e){

        var textlength = $(this).val().length;
        var maxlength = $(this).attr("maxlength");

        $(this).next().find('span').text(maxlength - textlength);

    });

    $('.nav-tabs .nav-item').on('click', function(){
        $(this).parent().find('a').removeClass('active');
        $(this).find('a').addClass('active');
    });

    if(window.location.href.includes('/ar') && $('.nav-tabs .nav-item:nth-of-type(2) a').hasClass('active')){
        $('.form-english').hide();
        $('.form-turkish').hide();
        
    }
    else if(window.location.href.includes('/tr') && $('.nav-tabs .nav-item:nth-of-type(3) a').hasClass('active')){
        $('.form-english').hide();
        $('.form-arabic').hide();

    }
    else{
        $('.form-arabic').hide();
        $('.form-turkish').hide();

    }

    $('.nav-tabs .nav-item:first-of-type').on('click', function(){
        $('.form-english').show();
        $('.form-arabic').hide();
        $('.form-turkish').hide();

    });
    $('.nav-tabs .nav-item:nth-of-type(2)').on('click', function(){
        $('.form-arabic').show();
        $('.form-english').hide();
        $('.form-turkish').hide();

    });
    $('.nav-tabs .nav-item:last-of-type').on('click', function(){
        $('.form-turkish').show();
        $('.form-arabic').hide();
        $('.form-english').hide();

    })
    
}());

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

var profilePic = document.getElementById('image'); /* finds the input */

function changeLabelText() {
    var profilePicValue = profilePic.value; /* gets the filepath and filename from the input */
    var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
    profilePicValue = profilePicValue.substr(fileNameStart + 1); /* isolates the filename */
    var profilePicLabelText = document.querySelector('label[for="inputGroupFile01"]'); /* finds the label text */
    if (profilePicValue !== '') {
        profilePicLabelText.textContent = profilePicValue; /* changes the label text */
    }
}

profilePic.addEventListener('change',changeLabelText,false); /* runs the function whenever the filename in the input is changed */