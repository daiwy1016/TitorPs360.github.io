function alphabetFilter() {
    $('div.tab-header').each(function () {
        letterSelector = $.trim($(this).find('b').text());
        if (letterSelector === '#')
            letterSelector = 'unknown';
        $('span.alphabetic[class*="' + letterSelector + '"]').removeClass('disabled');
    });
    $('span.alphabetic').off().on('click',
            function (e) {
                letterSelector = $(e.currentTarget).text();
                if (letterSelector === '#')
                    letterSelector = 'unknown';
                if ($('div.' + letterSelector).length)
                    $('html, body').animate({scrollTop: $('div.' + letterSelector).offset().top});
            });
}



$(function(){
    $('a.thumbnail>img').mouseenter(function(){
        $(this).removeClass('book-cover-anim-out-new').addClass('book-cover-anim-in-new');
    })
    $('a.thumbnail>img').mouseleave(function(){
        $(this).removeClass('book-cover-anim-in-new').addClass('book-cover-anim-out-new');
    })
})
