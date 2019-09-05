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


var sortFlag=true;

$(function(){
    /*鼠标悬浮上面时动画*/
    $('.photo').mouseenter(function(){
       $($(this).find('img')[0]).removeClass('book-cover-anim-out-new').addClass('book-cover-anim-in-new');
    });
    $('.photo').mouseleave(function(){
        $($(this).find('img')[0]).removeClass('book-cover-anim-in-new').addClass('book-cover-anim-out-new');
    });
    /*首页幻灯片轮播*/
    $("#carousel-generic").owlCarousel({
    loop:true,
    autoPlay: true,
    responsiveClass:true,
    itemElement:'div',
    items:1,
    responsive:{
        768:{
            items:1,
            nav:false
        },
        800:{
            items:1,
            nav:false
        }
    }
});
    /*首页幻灯片轮播*/
    $("#manga-hot-updates").owlCarousel({
    loop:true,//循环
    autoPlay: true,//自动播放
    margin:10,//边距
    responsiveClass:true,
    animateOut:true,
    animateOut:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        360:{
            items:2,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        900:{
            items:5,
            nav:false
        },
        1000:{
            items:6,
            nav:false
        }
    }
});
/*章节排序*/
$('.detail-sort-new').click(function() {
        if (sortFlag) {
            //flex-flow: wrap-reverse;flex-direction: row-reverse;
            $('.chapters').css({
                'flex-flow': 'wrap-reverse',
                'flex-direction':'row-reverse',
            })
            $('.detail-sort-new').text('反序');
            sortFlag=false;
        }else{
            $('.chapters').css({
                'flex-flow': 'wrap',
                'flex-direction':'row',
            })
            $('.detail-sort-new').text('正序');
            sortFlag=true;
        }

    })

})


