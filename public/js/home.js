(function () {

    changeNavbarDirection();

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

   
    for(var i = 1; i < $('.list-group a').length; i++){

        if(window.location.href.includes('category_id=' + i)){
            $('.list-group a').eq(i).addClass('list-active-background');
           
        }
    }

    if($(window).width() < 768){
        $('.card-mobile').removeClass('container');
    }else{
        $('.card-mobile').addClass('container');
    }

    
   
}());



