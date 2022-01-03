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

    // Show Remamingn Character To The User When Typing In Textarea Field
    $postTitleLength = $('.post-title').val.length;

    $('.post-description textarea').on('keyup', function(e){

        var textlength = $(this).val().length;
        var maxlength = $(this).attr("maxlength");

        $(this).next().find('span').text(maxlength - textlength);

    });

    $('.post-title').on('keyup', function(){
        var textlength = $(this).val().length;
        var maxlength = $(this).attr("maxlength");
        $(this).next().find('span').text(maxlength - textlength);

    });

    $('.nav-tabs .nav-item').on('click', function(){
        $(this).parent().find('a').removeClass('active');
        $(this).find('a').addClass('active');
    });

    //  Hide And Show Title And Description Tables
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


    // Display Image And Change Label Text When The User Choose Image In Input File 
    $('#image').on("change", function(){
       
        $('label[for="inputGroupFile01"]').text($(this).val().split('\\').pop());
        $('#display-img').fadeIn(500);
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('display-img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    



    
}());

// const img_input = document.querySelector('#image');
// var upload_img = "";

// img_input.addEventListener('change', function(){
//     const reader = new FileReader();
//     reader.addEventListener('load', () => {
//        upload_img = reader.result;
//        $('#display-img').fadeIn(900);
//        document.querySelector('#display-img').style.backgroundImage = `url(${upload_img})`;
//     });
//     reader.readAsDataURL(this.files[0]);
// })
