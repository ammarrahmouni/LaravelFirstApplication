(function(){
    if ('{{ app()->getLocale() }}' == 'en') {
        $('.dropdown-item:first-of-type').css('opacity', '.5').end().siblings().css('opacity', '1');
    } else if ('{{ app()->getLocale() }}' == 'tr') {
        $('.dropdown-item:nth-of-type(2)').css('opacity', '.5').end().siblings().css('opacity', '1');
    } else if ('{{ app()->getLocale() }}' == 'ar') {
        $('.dropdown-item:nth-of-type(3)').css('opacity', '.5').end().siblings().css('opacity', '1');
    }
}())


