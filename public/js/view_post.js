(function(){

    var direction = $('html').attr('dir');
    if(direction == 'rtl'){
        $('.post-table table tr td').css('text-align', 'right');
        $('.page-item:first-child .page-link').css({
            'border-top-right-radius': '0.35rem',
            'border-bottom-right-radius': '0.35rem',
            'border-top-left-radius': '0',
            'border-bottom-left-radius': '0'
        });

        $('.page-item:last-child .page-link').css({
            'border-top-left-radius': '0.35rem',
            'border-bottom-left-radius': '0.35rem',
            'border-top-right-radius': '0',
            'border-bottom-right-radius': '0'
        })
     
    }
    else if(direction == 'ltr'){
        $('.post-table table tr td').css('text-align', 'left');

    }
   
}());