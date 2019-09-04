@extends('front.layouts.default')

@section('title')
{{ Lang::get('messages.front.home.title', array('sitename' => $settings['seo.title'])) }}
@stop

@section('description')
{{$settings['seo.description']}}
@stop

@section('keywords')
{{$settings['seo.keywords']}}
@stop

@section('header')
{!!(new \Escapeboy\Jraty\Jraty)->js()!!}

{!!(new \Escapeboy\Jraty\Jraty)->js_init(array(
'score' => 'function() { return $(this).attr(\'data-score\'); }',
'number' => 5,
'click' => 'function(score, evt) {
$.post("'.URL::to('/').'/save/item_rating",{
item_id: $(\'[data-item]\').attr(\'data-item\'),
score: score
});
}',
'path' => "'".asset('/packages/escapeboy/jraty/raty/lib/img')."'"
)) !!}
<?php
/*
echo (new \Escapeboy\Jraty\Jraty)->js();

echo (new \Escapeboy\Jraty\Jraty)->js_init(array(
    'score' => 'function() { return $(this).attr(\'data-score\'); }',
    'number' => 5,
    'click' => 'function(score, evt) {
                $.post(\'save/item_rating\',{
                    item_id: $(this).attr(\'data-item\'),
                    score: score
                });
              }',
    'path' => '\'packages/escapeboy/jraty/raty/lib/img\''
));*/
?>
@stop

@section('manga-slides-ads')
<!-- 轮播图1-->
 <!-- row -->
<div class="row header-section-new">
    <div class="col-xs-12 col-sm-6 banner-new">
        <!--manga slides   -->
        <div id="carousel-generic-wrap">
            <div  id="carousel-generic" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="#" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
                     <img src="https://img.mina360.com/2bea1fb63d13103ed21278f9e4f049cd" alt="Image">
                    </a>
                    <a href="#" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
                </div>
                <div class="item">
                    <a href="#" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
                     <img src="https://img.mina360.com/2bea1fb63d13103ed21278f9e4f049cd" alt="Image">
                    </a>
                    <a href="#" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
                </div>
            <!-- Controls -->
              <!-- <a class="left carousel-control" >
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" >
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a> -->
            </div>
        </div>
        <!--/manga slides  -->
    </div>
     <div class="col-xs-12 col-sm-6 section-new">
       <!-- mangasads -->
<div id="carousel-generic-wrap">
    <div class="cate-new">
        <div class="cate-item-new">
            <a href="#" class="cate-item-new-link" target="_self">
                <img class="img-placeholder cate-img-new" src="https://static.mina360.com/images/update_home.jpg" alt="今日更新">
            </a>
        </div>
        <div class="cate-item-new">
            <a href="#" class="cate-item-new-link" target="_self">
                <img class="img-placeholder cate-img-new" src="https://static.mina360.com/images/activity_home.jpg" alt="活动福利">
            </a>
        </div>
        <div class="cate-item-new">
            <a href="#" class="cate-item-new-link" target="_self">
                <img class="img-placeholder cate-img-new" src="https://static.mina360.com/images/appdown_home.jpg" alt="app下载">
            </a>
        </div>
        <div class="cate-item-new">
            <a href="#" class="cate-item-new-link" target="_self">
                <img class="img-placeholder cate-img-new" src="https://static.mina360.com/images/spread_home.jpg" alt="推广">
            </a>
        </div>
    </div>
 </div>
       <!-- /mangasads -->
    </div>
</div>
<!--/ row -->
@stop


@section('mangaupdatesslides')
 <!-- 轮播图2 -->
<!-- row -->
<div class="row updates-slider">
    <div class="col-xs-12">
    <h2 class="hotmanga-header"><i class="fa fa-star"></i>热门漫画最新更新</h2>
</div>
<div class="col-xs-12">
    <div class="owl-carousel owl-theme" id="manga-hot-updates">
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
        <div class="item">
            <a href="http://manga.ma/" alt="我的病毒女友 第2话" title="我的病毒女友 第2话">
             <img src="http://manga.ma/uploads/manga/wodebingdunvyou/cover/cover_250x350.jpg" alt="Image">
            </a>
            <a href="http://manga.ma/" class="caption" title="我的病毒女友 第2话">我的病毒女友 第2话</a>
        </div>
    </div>
</div>
</div>
<!--/ row -->
@stop


@include('front.themes.'.$theme.'.blocs.menu')
@include('front.themes.'.$theme.'.blocs.hot_manga')
@include('front.themes.'.$theme.'.blocs.content')
@include('front.themes.'.$theme.'.blocs.sidebar')
