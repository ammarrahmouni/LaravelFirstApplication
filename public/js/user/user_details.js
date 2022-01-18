(function(){
    
    imageModalClick("#myModal", "#myImg", "#img01");

    changeNavbarDirection();


    // Change Flex Direction In The Small Screen
    if(( $(window).width() ) < 1300){
        $('.user-content').css({
            'flex-direction': 'column',
            'align-items': 'center'
        });

        $('.user-content .user-img-block button').css({
            'margin-bottom' : '25px'
        })
        $('.user-content div div').css({
            'flex-direction': 'column',
            'align-items' : 'center'
        }) 
        $('.user-content div div span:first-of-type').css('width', 'auto')
    }


    
}());
