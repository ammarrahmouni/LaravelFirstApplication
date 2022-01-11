

(function () {

    $(document).on('scroll', function(){
        var scrolTop = $(document).scrollTop();
        if(scrolTop != 0){
            $('.navbar').css({
                'position': 'fixed',
                'z-index': '999',
                'right' : '0',
                'left' : '0'
            });
        }

        else{
            $('.navbar').css({
                'position': 'relative',
            });
        }

    });



   

    var direction = $('html').attr('dir');

    if(direction == 'rtl'){
        $('.navbar-nav').removeClass('ml-auto').addClass('mr-auto');
      
    }

    else if(direction == 'ltr'){
        $('.navbar-nav').removeClass('mr-auto').addClass('ml-auto');


        $('#language-menu').removeClass('ms-auto').addClass('mr-auto');
        $('#login-menu').css({
            'margin-left': '0',
        });
        $('.dropdown-menu a:before').css('left', '-6px');

    }


   
    for(var i = 1; i < $('.list-group a').length; i++){
        if(window.location.href.includes('category/' + i)){
            $('.list-group a').eq(i).addClass('list-active-background');
           
        }
        else if(window.location.href.includes('category-all')){
            $('.list-group a').eq(0).addClass('list-active-background');
        }
    }

    if($(window).width() < 768){
        $('.card-mobile').removeClass('container');
    }else{
        $('.card-mobile').addClass('container');
    }



   
   
}());



