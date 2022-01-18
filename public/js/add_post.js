(function(){

    // Show Remamingn Character To The User When Typing In Textarea Field
    var postDescriptionMax = $('.post-description textarea').attr('maxlength');
    $('.post-description textarea').next().find('span').text(postDescriptionMax);

    var postTitleMax = $('.post-title').attr('maxlength');
    $('.post-title').next().find('span').text(postTitleMax);


    $('.nav-tabs .nav-item').on('click', function(){
        $(this).parent().find('a').removeClass('active');
        $(this).find('a').addClass('active');
    });

    //  Hide And Show Title And Description Tables
    if(window.location.href.includes('/ar') && $('.nav-tabs .nav-item:nth-of-type(3) a').hasClass('active')){
        $('.form-english').hide();
        $('.form-turkish').hide();
        
    }
    else if(window.location.href.includes('/tr') && $('.nav-tabs .nav-item:nth-of-type(2) a').hasClass('active')){
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
        $('.form-turkish').show();
        $('.form-arabic').hide();
        $('.form-english').hide();

    });
    $('.nav-tabs .nav-item:last-of-type').on('click', function(){
        $('.form-arabic').show();
        $('.form-english').hide();
        $('.form-turkish').hide();
    })


    
}());
