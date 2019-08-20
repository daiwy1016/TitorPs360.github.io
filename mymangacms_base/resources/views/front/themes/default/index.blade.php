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
<script src="packages/escapeboy/jraty/raty/lib/jquery.raty.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#item-rating').raty({
        'score': function () {
            return $(this).attr('data-score');
        },
        'number': 5,
        'click': function (score, evt) {
            $.post('save/item_rating', {
                item_id: $('[data-item]').attr('data-item'),
                score: score
            });
        },
        'path': 'packages/escapeboy/jraty/raty/lib/img'
    });
});
</script>
<?php
/*include __DIR__.'/../../../vendor/escapeboy/jraty/src/Escapeboy/Jraty/Jraty.php';

echo Jraty::js();

echo Jraty::js_init(array(
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

@include('front.themes.'.$theme.'.blocs.menu')
@include('front.themes.'.$theme.'.blocs.hot_manga')
@include('front.themes.'.$theme.'.blocs.content')
@include('front.themes.'.$theme.'.blocs.sidebar')
