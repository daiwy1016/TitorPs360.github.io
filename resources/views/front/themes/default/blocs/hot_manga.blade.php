@section('hotmanga')
@if (count($hotMangaList)>0)
<div class="col-xs-12">
    <h2 class="hotmanga-header"><i class="fa fa-star"></i>{{ Lang::get('messages.front.home.hot-updates') }}</h2>
    <hr/>

    <ul class="hot-thumbnails">
        @foreach ($hotMangaList as $manga)
        <li class="span3">
            <div class="photo" style="position: relative;overflow: hidden;">
                <div class="manga-name">
                    <a class="label label-warning" href="{{route('front.manga.show',$manga->manga_slug)}}">{{ $manga->manga_name }}</a>
                </div>
                <a class="thumbnail books-list-item-cover" style="position: relative; z-index: 10; background: rgb(255, 255, 255) none repeat scroll 0% 0%;" href='{{ route("front.manga.reader", [$manga->manga_slug, $manga->chapter_slug]) }}'>
                    @if ($manga->manga_cover)
                    <img src='{{HelperController::coverUrl("$manga->manga_slug/cover/cover_250x350.jpg")}}' alt='{{ $manga->manga_name }}' />
                    @else
                    <img src='{{asset("images/no-image.png")}}' alt='{{ $manga->manga_name }}' />
                    @endif
                </a>
                <a href='{{ route("front.manga.reader", [$manga->manga_slug, $manga->chapter_slug]) }}' style="text-decoration: none">
                <div class="well books-list-item-info-new grad-new">
                    <h2 class="books-list-item-info-update">{{ $manga->manga_name }}</h2>
                    <div class="books-list-item-info-name ">            <span class="books-list-item-info-type">{{ $manga->chapter_name }}</span>            <span class="books-list-item-info-cps">第{{ $manga->chapter_number }}话</span>
                    </div>
                    </a>
                   <!--  <p>
                        <i class="fa fa-book"></i>
                        {{ "#".$manga->chapter_number."  ".$manga->chapter_name }}
                    </p> -->
                </div>
            </div></li>
        @endforeach
    </ul>
</div>
<div class="clear-both"></div>
@endif
@stop
