@if(isset($seo->reader->description->global) && $seo->reader->description->global == '1')
<?php $description = $settings['seo.description'] ?>
@else
<?php $description = App::make("HelperController")->advSeoReaderPage($seo->reader->description->value, $current, is_null($page)?1:$page) ?>
@endif

@if(isset($seo->reader->keywords->global) && $seo->reader->keywords->global == '1')
<?php $keywords = $settings['seo.keywords'] ?>
@else
<?php $keywords = App::make("HelperController")->advSeoReaderPage($seo->info->keywords->value, $current, is_null($page)?1:$page) ?>
@endif

<!doctype html>
<!--[if lt IE 8 ]><html lang="{{ App::getLocale() }}" class="ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="{{ App::getLocale() }}" class="ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="{{ App::getLocale() }}" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="{{ App::getLocale() }}"> <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>
            @if(isset($seo->reader->title->global) && $seo->reader->title->global == '1')
            {{$settings['seo.title']}} | {{$current->manga_name}} {{' #'.$current->chapter_number.': '. $current->chapter_name}} @if (!is_null($page)) - {{Lang::get('messages.front.reader.page')}} @endif
            @else
            {{ App::make("HelperController")->advSeoReaderPage($seo->reader->title->value, $current, is_null($page)?1:$page) }}
            @endif
        </title>
        <meta name="description" content="<?php echo $description ?>"/>
        <meta name="keywords" content="<?php echo $keywords ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        @if(!is_null($settings['seo.google.webmaster']) || "" !== $settings['seo.google.webmaster'])
        <meta name="google-site-verification" content="{{$settings['seo.google.webmaster']}}" />
        @endif

        @if(!is_null($settings['site.theme.options']) || "" !== $settings['site.theme.options'])
        @php $themeOpts=json_decode($settings['site.theme.options']) @endphp
        @if(!is_null($themeOpts->icon))
        <link rel="shortcut icon" href="{{$themeOpts->icon}}">
        @endif
        @endif

        <link rel="stylesheet" href="{{asset('css/bootswatch/'.$readerTheme.'/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/reader.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

        <script src="{{asset('js/vendor/jquery-1.11.0.min.js')}}"></script>
        <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/vendor/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('js/vendor/jquery.unveil.js')}}"></script>
        <script src="{{asset('js/vendor/jquery.plugins.js')}}"></script>

        @if(config('settings.orientation') === 'rtl')
        <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/rtl.css')}}">
        @endif

        <!--[if lt IE 9]>
        <script src="{{asset('js/vendor/html5shiv.js')}}"></script>
        <script src="{{asset('js/vendor/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body class="@if(isset($themeOpts->boxed) && $themeOpts->boxed == 1) layout-boxed @endif">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php $comment = json_decode($settings['site.comment']) ?>

        @if(isset($comment->page->reader) && $comment->page->reader == '1')
        @if(isset($comment->fb) && $comment->fb == '1')
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        @endif
        @endif

        @if(!is_null($settings['seo.google.analytics']) || "" !== $settings['seo.google.analytics'])
        @include('front.analyticstracking')
        @endif

         <header>
            <div class="container-fluid">
                <div class="row">
                    <!-- Website Menu -->
                    <nav class="navbar navbar-default navbar-static-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <h2 class="@if(!is_null($themeOpts) && !is_null($themeOpts->logo))navbar-brand-logo @endif" style="margin:0;">
                                    <a class="navbar-brand" href="{{route('front.index')}}">
                                        @if(!is_null($themeOpts) && !is_null($themeOpts->logo))
                                        <img alt="{{$settings['site.name']}}" src="{{$themeOpts->logo}}" style="max-height: 50px"/>
                                        <span style="display: none">{{$settings['site.name']}}</span>
                                        @else
                                        {{$settings['site.name']}}
                                        @endif
                                    </a>
                                </h2>
                            </div>
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav @if(config('settings.orientation') === 'rtl') navbar-left @else navbar-right @endif">
                                    @if(env('ALLOW_SUBSCRIBE', false))
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu profil-menu">
                                            @if(!Sentinel::check())
                                            <li>
                                                <a href="{{ route('register') }}">
                                                    <i class="fa fa-pencil-square-o"></i> {{Lang::get('messages.front.home.subscribe')}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('login') }}">
                                                    <i class="fa fa-sign-in"></i> {{Lang::get('messages.front.home.login')}}
                                                </a>
                                            </li>
                                            @else
                                            <li class="text-center" style="padding: 5px 0">
                                                Hi, {{$userCmp->username}}!
                                            </li>
                                            <?php if (is_module_enabled('MySpace')): ?>
                                            <li>
                                                <a href="{{route('user.show', $userCmp->username)}}">
                                                    <i class="fa fa-user"></i> {{Lang::get('messages.front.myprofil.my-profil')}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('bookmark.index')}}">
                                                    <i class="fa fa-heart"></i> {{Lang::get('messages.front.bookmarks.title')}}
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if (is_module_enabled('Notification')): ?>
                                                <li>
                                                    <a href="{{route('front.notification.index')}}">
                                                        <i class="fa fa-bell"></i> {{Lang::get('messages.front.myprofil.my-notifications')}}
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (is_module_enabled('Notification') || is_module_enabled('MySpace')): ?>
                                                <li role="separator" class="divider"></li>
                                            <?php endif; ?>
                                            <?php if (is_module_enabled('Manga')): ?>
                                                @if(Sentinel::hasAnyAccess(['manga.manga.create','manga.chapter.create']))
                                                <li>
                                                    <a href="{{route('admin.manga.index')}}">
                                                        <i class="fa fa-plus"></i> {{Lang::get('messages.front.myprofil.add-manga-chapter')}}
                                                    </a>
                                                </li>
                                                @endif
                                            <?php endif; ?>
                                            <?php if (is_module_enabled('Blog')): ?>
                                                @if(Sentinel::hasAccess('blog.manage_posts'))
                                                <li>
                                                    <a href="{{route('admin.posts.index')}}">
                                                        <i class="fa fa-plus"></i> {{Lang::get('messages.front.myprofil.add-post')}}
                                                    </a>
                                                </li>
                                                @endif
                                            <?php endif; ?>
                                            @if(Sentinel::hasAccess('dashboard.index'))
                                            <li>
                                                <a href="{{route('admin.index')}}">
                                                    <i class="fa fa-cogs"></i> {{Lang::get('messages.front.home.dashboard')}}
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <i class="fa fa-sign-out"></i> {{Lang::get('messages.front.home.logout')}}
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    <?php if (is_module_enabled('MySpace')): ?>
                                    @if(Sentinel::check())
                                    <li>
                                        <a href="" class="bookmark" title="{{Lang::get('messages.front.bookmarks.bookmark')}}"><i class="fa fa-heart"></i></a>
                                    </li>
                                    @endif
                                    <?php endif; ?>
                                    <!-- Notifications Menu -->
                                    <?php if (is_module_enabled('Notification')): ?>
                                        @if(Sentinel::check())
                                            <?php if (is_module_enabled('Notification')): ?>
                                                @include('notification::partials.notifications')
                                            <?php endif; ?>
                                        @endif
                                    <?php endif; ?>
                                    <li>
                                        <!-- Button report bug -->
                                        <a href="" class="btn-lg" data-toggle="modal" data-target="#myModal" title="{{Lang::get('messages.front.reader.report-broken-image')}}">
                                            <i class="fa fa-bug"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="navbar-collapse-1" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{route('front.manga.show', array($current->manga_slug))}}">{{$current->manga_name}}{{Lang::get('messages.front.reader.manga')}}</a></li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Lang::get('messages.front.reader.reading-mode')}}<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a id="modePPP" href="#"><i class="fa fa-arrows-h" style="width: 30px"></i>{{Lang::get('messages.front.reader.page-per-page')}}</a></li>
                                            <li><a id="modeALL" href="#"><i class="fa fa-arrows-v" style="width: 30px"></i>{{Lang::get('messages.front.reader.all-pages')}}</a></li>
                                        </ul>
                                    </li>

                                    <li id="chapter-list" class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Lang::get('messages.front.reader.other-chapter')}}<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            @foreach ($chapters as $chapter)
                                            <li @if ($chapter->chapter_number == $current->chapter_number) class="active" @endif><a href="{{route('front.manga.reader', array($current->manga_slug, $chapter->chapter_slug))}}">{{Lang::get('messages.front.reader.chaptre').' '.$chapter->chapter_number.': '. $chapter->chapter_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!--/ Website Menu -->
                </div>
            </div>
        </header>



        <div class="container-fluid">
            <!-- 手机端菜单 -->
            <!-- 头部 -->
            <div class="page-bar-new page-topbar-new">
            <div class="page-bar-wrap page-topbar-wrap page-topbar-wrap-padd">
                <div class="page-topbar-wrap-letf">
                    <a href="{{route('front.manga.show', array($current->manga_slug))}}" class="global-back page-topbar-wrap-letf-back">
                        <span class="fa fa-angle-left global-back-icon fa-2x"></span>
                    </a>
                </div>
                <div class="page-topbar-wrap-mid">
                    <h1>{{$chapter->chapter_number.'. '. $chapter->chapter_name}}</h1>
                </div>
                <div class="page-topbar-wrap-right">
                    <a id="readertype" class="global-back page-topbar-wrap-letf-back">
                        <span class=" fa-1x5 fa  @if($settings['reader.type'] == 'ppp') fa-text-height @else fa-text-width @endif global-back-icon"></span>
                    </a>
                    
                    <a id="bookmark" class="global-back page-topbar-wrap-letf-back">
                        <span class="fa-1x5 fa  fa-heart global-back-icon "></span>
                    </a>
                </div>
            </div>
        </div>
            <!-- /头部 -->
            <!-- 底部 -->
            <div class="page-bar-new page-bottombar-new">
            <div class="page-bar-wrap">
                <a href="/" class="page-bar-wrap-bottom-item">
                     <span class="fa fa-home global-back-icon fa-2x"></span>
                </a>

                

                    <a   @if(isset($prevChapter))onclick="return prevChap();"@else onclick="alert('这是第一章');"@endif class="page-bar-wrap-bottom-item">
                         <span class="fa fa-angle-left global-back-icon fa-2x"></span>
                    </a>



                    <a  @if(isset($nextChapter))onclick="return nextChap();"@else onclick="alert('这是最后一章');"@endif class="page-bar-wrap-bottom-item">
                         <span class="fa fa-angle-right global-back-icon fa-2x"></span>

                    </a>

                    <a onclick="toggle_episode_list(); return false;" class="page-bar-wrap-bottom-item">
                    <span class="fa fa-list-ul global-back-icon fa-2x"></span>

                </a>

            </div>
        </div>
            <!-- /底部 -->
            <!-- 作品目录 -->
            <div class="episode_list_overlay" style="display: none;"></div>
            <div class="episode_list_cont">
      <ul class="episode_list" style="background:#333;">
        <li></li>

            @foreach ($chapters as $chapter)
                <li class="episode_tr @if ($chapter->chapter_number == $current->chapter_number) on @endif"> 
            <a href="{{route('front.manga.reader', array($current->manga_slug, $chapter->chapter_slug))}}"><img src="{{HelperController::coverUrl("$current->manga_slug/cover/cover_250x350.jpg")}}" onerror="this.src='{{asset("images/no-image.png")}}'" alt='{{ $current->manga_name }}'> <span>{{Lang::get('messages.front.reader.chaptre').' '.$chapter->chapter_number.': '. $chapter->chapter_name}}</span> 
            </a></li>
             @endforeach
                

                <li style="border:none;"></li>
      </ul>
    </div>
            <!-- /作品目录 -->
            <!-- /手机端菜单 -->
            <div class="row">
                <div class="container reader-wrap" style="background: #fff;">

                    <div class="row">
                        <div class="col-xs-12">
            @if (!is_null($page))
            <div class="pager-cnt">
                <div class="row">
                    <div class="col-xs-12 no-padding">
                        @if(isset($prevChapter))
                        <ul class="pager pull-left" style="margin: 6px 0;">
                            <li class="previous">
                                <a href="#" onclick="return prevChap();">{{Lang::get('messages.front.reader.prevChap')}}</a>
                            </li>
                        </ul>
                        @endif
                        @if(isset($nextChapter))
                        <ul class="pager pull-right" style="margin: 6px 0;">
                            <li class="next">
                                <a href="#" onclick="return nextChap();">{{Lang::get('messages.front.reader.nextChap')}}</a>
                            </li>
                        </ul>
                        @endif
                        <div class="page-nav" style="margin: 0 auto;<?php if ($settings['reader.type'] != 'ppp') { ?> display: none; <?php } ?>">
                            @if(config('settings.orientation') === 'rtl')
                            <ul class="pager">
                                <li class="next">
                                    <a href="#" onclick="return nextPage();">{{Lang::get('messages.front.reader.next')}}</a>
                                </li>
                            </ul>
                            @else
                            <ul class="pager">
                                <li class="previous">
                                    <a href="#" onclick="return prevPage();">{{Lang::get('messages.front.reader.prev')}}</a>
                                </li>
                            </ul>
                            @endif
                            <select id="page-list" class="selectpicker" data-style="btn-primary" data-width="auto" data-size="20">
                                @foreach ($allPages as $pageList)
                                <option value="{{$pageList->page_slug}}" @if ($pageList->page_slug == $page->page_slug) selected @endif>{{$pageList->page_slug}}</option>
                                @endforeach
                            </select>
                            @if(config('settings.orientation') === 'rtl')
                            <ul class="pager">
                                <li class="previous">
                                    <a href="#" onclick="return prevPage();">{{Lang::get('messages.front.reader.prev')}}</a>
                                </li>
                            </ul>
                            @else
                            <ul class="pager">
                                <li class="next">
                                    <a href="#" onclick="return nextPage();">{{Lang::get('messages.front.reader.next')}}</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class='ads'>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ads-large" style="display: table; margin: 20px auto 10px;">
                            {!!isset($ads['TOP_LARGE'])?$ads['TOP_LARGE']:''!!}
                        </div>
                        <div style="display: table; margin: 20px auto 10px;">
                            <div class="pull-left ads-sqre1" style="margin-right: 50px;">
                                {!!isset($ads['TOP_SQRE_1'])?$ads['TOP_SQRE_1']:''!!}
                            </div>
                            <div class="pull-right ads-sqre2">
                                {!!isset($ads['TOP_SQRE_2'])?$ads['TOP_SQRE_2']:''!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="viewer-cnt">
                <div class="row">
                    <div class="col-sm-2 hidden-xs" style="position: relative">
                        <div style="left: 0; right: 0; margin: 0 auto; position: absolute; display: table;">
                            {!!isset($ads['LEFT_WIDE_1'])?$ads['LEFT_WIDE_1']:''!!}
                            <br/>
                            {!!isset($ads['LEFT_WIDE_2'])?$ads['LEFT_WIDE_2']:''!!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 no-padding">
                        <div id="all" style="<?php if ($settings['reader.type'] != 'all') { ?> display: none; <?php } ?>">
                            @foreach ($allPages as $onePage)
                            <img class="img-responsive" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src='@if($onePage->external == 0) {{HelperController::pageImageUrl($current->manga_slug,$current->chapter_slug,$onePage->page_image)}} @else {{$onePage->page_image}} @endif' alt='{{ $current->manga_name }}: Chapter {{$current->chapter_slug}} - Page {{$onePage->page_slug}}'/>
                            @endforeach
                        </div>
                        <div id="ppp" style="<?php if ($settings['reader.type'] != 'ppp') { ?> display: none; <?php } ?>">
                            <!-- refresh test -->
                            @if($settings['reader.mode'] == 'noreload')
                            <a href="" onclick="return nextPage();">
                                <img class="img-responsive scan-page" src='@if($page->external == 0) {{HelperController::pageImageUrl($current->manga_slug,$current->chapter_slug,$page->page_image)}} @else {{$page->page_image}} @endif' alt='{{ $current->manga_name }}: Chapter {{$current->chapter_slug}} - Page {{$page->page_slug}}'/>
                            </a>
                            @else
                            @if($page->page_slug < count($allPages) || !is_null($nextChapter))
                            <a href="@if(!is_null($nextChapter) && $page->page_slug == count($allPages)){{route('front.manga.reader', array($current->manga_slug,$nextChapter->chapter_slug))}}@else{{route('front.manga.reader', array($current->manga_slug,$current->chapter_slug,($page->page_slug)+1))}}@endif">
                                <img class="img-responsive scan-page" src='@if($page->external == 0) {{HelperController::pageImageUrl($current->manga_slug,$current->chapter_slug,$page->page_image)}} @else {{$page->page_image}} @endif' alt='{{ $current->manga_name }}: Chapter {{$current->chapter_slug}} - Page {{$page->page_slug}}'/>
                            </a>
                            @else
                            <img class="img-responsive scan-page" src='@if($page->external == 0) {{HelperController::pageImageUrl($current->manga_slug,$current->chapter_slug,$page->page_image)}} @else {{$page->page_image}} @endif' alt='{{ $current->manga_name }}: Chapter {{$current->chapter_slug}} - Page {{$page->page_slug}}'/>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-2 hidden-xs" style="position: relative">
                        <div style="left: 0; right: 0; margin: 0 auto; position: absolute; display: table;">
                            {!!isset($ads['RIGHT_WIDE_1'])?$ads['RIGHT_WIDE_1']:''!!}
                            <br/>
                            {!!isset($ads['RIGHT_WIDE_2'])?$ads['RIGHT_WIDE_2']:''!!}
                        </div>
                    </div>
                </div>
            </div>

            <div class='ads'>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ads-large" style="display: table; margin: 20px auto 10px;">
                            {!!isset($ads['BOTTOM_LARGE'])?$ads['BOTTOM_LARGE']:''!!}
                        </div>
                        <div style="display: table; margin: 20px auto 10px;">
                            <div class="pull-left ads-sqre1" style="margin-right: 50px;">
                                {!!isset($ads['BOTTOM_SQRE_1'])?$ads['BOTTOM_SQRE_1']:''!!}
                            </div>
                            <div class="pull-right ads-sqre2">
                                {!!isset($ads['BOTTOM_SQRE_2'])?$ads['BOTTOM_SQRE_2']:''!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pager-cnt">
                <div class="row">
                    <div class="col-xs-12 no-padding">
                        @if(isset($prevChapter))
                        <ul class="pager pull-left" style="margin: 6px 0;">
                            <li class="previous">
                                <a href="#" onclick="return prevChap();">{{Lang::get('messages.front.reader.prevChap')}}</a>
                            </li>
                        </ul>
                        @endif
                        @if(isset($nextChapter))
                        <ul class="pager pull-right" style="margin: 6px 0;">
                            <li class="next">
                                <a href="#" onclick="return nextChap();">{{Lang::get('messages.front.reader.nextChap')}}</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="row" id="tips-footer" style="<?php if ($settings['reader.type'] != 'ppp') { ?> display: none; <?php } ?>">
                    <div class="col-xs-12">
                        <div class="alert alert-warning tips-rtl">
                            <div class="page-header" style="margin: 0">
                                <h1><b>{{$current->manga_name}} {{' #'.$current->chapter_number.': '. $current->chapter_name}}</b></h1>@if(!is_null($page))<span class="pager-cnt" style="<?php if ($settings['reader.type'] != 'ppp') { ?> display: none; <?php } ?>"><small> - {{Lang::get('messages.front.reader.page')}} <span class="pagenumber">{{$page->page_slug}}</span></small></span>@endif
                            </div>
                            <div>
                                <strong>{{Lang::get('messages.front.reader.tips')}}</strong>
                                <p>
                                    {!!Lang::get('messages.front.reader.tips-message', array('manga' => $current->manga_name, 'chapter' => $current->chapter_number))!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (is_module_enabled('MySpace')): ?>
            <!-- comment -->
            @if(isset($comment->page->reader) && $comment->page->reader == '1')
            <div class="row" style="max-width: 890px; margin:15px auto;">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs" role="tablist">
                        @if(isset($comment->builtin) && $comment->builtin == '1')
                        <li role="presentation" class="active"><a href="#builtin" aria-controls="builtin" role="tab" data-toggle="tab">{{Lang::get('messages.front.home.comment.builtin-tab')}}</a></li>
                        @endif
                        @if(isset($comment->fb) && $comment->fb == '1')
                        <li role="presentation"><a href="#fb" aria-controls="fb" role="tab" data-toggle="tab">Facebook</a></li>
                        @endif
                        @if(isset($comment->disqus) && $comment->disqus == '1')
                        <li role="presentation"><a href="#disqus" aria-controls="disqus" role="tab" data-toggle="tab">Disqus</a></li>
                        @endif
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        @if(isset($comment->builtin) && $comment->builtin == '1')
                        <div role="tabpanel" class="tab-pane active" id="builtin">
                            <input type="hidden" id="post_id" name="post_id" value="{{$current->chapter_id}}"/>
                            <input type="hidden" id="post_type" name="post_type" value="chapter"/>

                            @include('front.themes.default.blocs.comments')
                        </div>
                        @endif
                        @if(isset($comment->fb) && $comment->fb == '1')
                        <div role="tabpanel" class="tab-pane" id="fb">
                            <div class="fb-comments" data-width="100%" data-numposts="5" data-colorscheme="dark"
                                 data-href="{{route('front.manga.reader', array($current->manga_slug,$current->chapter_slug))}}">
                            </div>
                        </div>
                        @endif
                        @if(isset($comment->disqus) && $comment->disqus == '1')
                        <div role="tabpanel" class="tab-pane <?php if (!isset($comment->fb)) echo 'active'; ?>" id="disqus">
                            <div id="disqus_thread"></div>
                            <script>
                                var disqus_config = function () {
                                    this.page.url = "{{route('front.manga.reader', array($current->manga_slug,$current->chapter_slug))}}";
                                };
                                (function () {  // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = '//<?php echo isset($comment->disqusUrl) ? $comment->disqusUrl : '' ?>/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();</script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            <?php endif; ?>

            <script>
                var title = document.title;
                var pages = {!!$allPages!!};

                var next_chapter = @if(isset($nextChapter)) "{{route('front.manga.reader', array($current->manga_slug,$nextChapter->chapter_slug))}}" @else "" @endif;
                var prev_chapter = @if(isset($prevChapter)) "{{route('front.manga.reader', array($current->manga_slug,$prevChapter->chapter_slug, $prevChapterLastPage))}}" @else "" @endif;

                var preload_next = 3;
                var preload_back = 2;
                var current_page = {{$page->page_slug}};

                var base_url = "{{route('front.manga.reader', array($current->manga_slug,$current->chapter_slug))}}";

                var initialized = false;

                jQuery(document).ready(function () {
                    $('.selectpicker').selectpicker();
                    if ($("div#all").is(":visible"))
                        $("div#all img").unveil(300);

                    // refresh test
                    @if($settings['reader.mode'] == 'noreload')
                    jQuery(window).bind('statechange', function () {
                        url = location.href.substr(base_url.length);
                        var State = History.getState();
                        if (url == "") {
                            current_page = 1;
                        } else {
                            url = parseInt(State.url.substr(State.url.lastIndexOf('/') + 1));
                        }
                        changePage(url, true, true);
                        document.title = title;
                    });

                    State = History.getState();
                    url = location.href.substr(base_url.length);
                    if (url == "") {
                        url = 1;
                    } else {
                        url = parseInt(State.url.substr(State.url.lastIndexOf('/') + 1));
                    }

                    current_page = url;
                    History.pushState(null, null, base_url + '/' + current_page);
                    changePage(current_page, true, true);
                    document.title = title;
                    update_numberPanel();
                    @else
                        preload(current_page);
                    @endif

                    /*读取用户设置*/

                    var serverReaderType='<?php echo $settings['reader.type']; ?>';
                    var readermode=window.localStorage.getItem('readertype');
                    if(!readermode){
                         window.localStorage.setItem("readertype",serverReaderType);
                    }
                    if(readermode == 'all' && serverReaderType != 'all'){
                        $('.pager-cnt .page-nav').hide();
                        $($('a#readertype').find('span')[0]).removeClass('fa-text-height').addClass('fa-text-width');

                    }
                     if(readermode == 'ppp' && serverReaderType != 'ppp'){
                        $('.pager-cnt .page-nav').show();
                        $($('a#readertype').find('span')[0]).removeClass('fa-text-height').addClass('fa-text-width');

                    }
                    if(readermode && readermode=='ppp'){
                       readerppp();
                    }
                    if(readermode && readermode=='all'){
                        readerall();
                    }
                    /*手机端，下拉模式 呼出菜单*/
                    //导航栏动画
                    $('#all').click(function() {
                         if(window.localStorage.getItem('readertype')=="all"){
                             if($(window).width()<=768){
                                $('.page-bar-new').fadeToggle("slow");
                            }
                        }
                    });
                    // 滚动时 菜单隐藏
                    setTimeout(function() {
                    $(window).scroll(function () {
                        if ($('.page-bar-new').css("display")!='none') {
                            $('.page-bar-new').fadeOut('slow');
                        }
                        if(parseInt($('.episode_list_cont').css('right')) < 0){
                            //show_episode_list();
                        }else{
                            hide_episode_list();
                        }

                    })
                }, 1500);
                });
                /*分页模式*/
                function readerppp(){
                        hide_episode_list();
                        $('.pager-cnt').show();
                        $('.pager-cnt .page-nav').show();
                        $('.page-bar-new').fadeOut("slow");
                        $('header').show();
                        $('div#ppp').show();
                        $('div#all').hide();
                        $('div#tips-footer').show();
                        $(document).off('keyup');
                        $(document).on('keyup', function (e) {
                            KeyCheck(e);
                        });
                        $($(this).find('span')[0]).removeClass('fa-text-height').addClass('fa-text-width');
                }
                /*下拉模式*/
                function readerall(){
                    if($(window).width()<=768){
                                $('.pager-cnt').hide();
                                $('.page-bar-new').fadeIn("slow");
                                $('header').hide();
                        }
                        if($(window).width()>768){
                                $('.pager-cnt').show();
                                $('.page-bar-new').fadeOut("slow");
                                $('header').show();
                        }
                        $('.pager-cnt .page-nav').hide();
                        $('div#ppp').hide();
                        $('div#all').show();
                        $('div#tips-footer').hide();
                        $(document).off('keyup');
                        $("div#all img").unveil(300);
                        $($(this).find('span')[0]).removeClass('fa-text-width').addClass('fa-text-width');
                }
                //窗口发生变化
                    window.onresize =function(){
                        if(window.localStorage.getItem('readertype')=="all"){
                        if($(window).width()<=768){
                                $('.pager-cnt').hide();
                                $('.page-bar-new').fadeIn("slow");
                                $('header').hide();
                        }
                        if($(window).width()>768){
                                $('.pager-cnt').show();
                                $('.page-bar-new').fadeOut("slow");
                                $('header').show();
                        }
                        }
                    }
                //作品目录开关
                function toggle_episode_list(){
                    if(parseInt($('.episode_list_cont').css('right')) < 0){
                        show_episode_list();
                    }else{
                        hide_episode_list();
                    }
                }
                $('.episode_list_overlay').on('click',function(){
                   
                    hide_episode_list();
                });

                //显示作品目录list
                function show_episode_list(){
                    $('.page-bar-new').fadeOut("slow");
                    $(".back-top").removeClass("show")
                    $('.episode_list_overlay').fadeIn(300);
                    $('.episode_list_cont').animate({
                    right: 0,
                    }, 300, function() {
                        $('.episode_list_cont').animate({scrollTop:($('.episode_list li.on').index())*$('.episode_list li.on').height()-64}, 100);
                });
                }
                //隐藏作品目录list
                function hide_episode_list(){
                    $('.episode_list_overlay').fadeOut(300);
                    $('.episode_list_cont').animate({
                    right: -$('.episode_list_cont').width(),
                    }, 300, function() {
                });
                }
                // refresh test
                @if($settings['reader.mode'] == 'noreload')
                function changePage(id, noscroll, nohash)
                {
                    id = parseInt(id);
                    if (initialized && id == current_page)
                        return false;
                    initialized = true;
                    if (id == pages.length) {
                        if (next_chapter == "") {
                            $('.next').hide();
                        }
                    } else if (id > pages.length) {
                        if (next_chapter == "") {
                            alert('{{Lang::get("messages.front.reader.last-page-message")}}');
                            if(window.localStorage.getItem('readertype')=="all"){
                                if($(window).width()<=768){
                                    $('.page-bar-new').fadeIn("slow");
                                }
                           }

                        } else {
                            location.href = next_chapter;
                        }

                        return false;
                    } else {
                        $('.next').show();
                    }

                    if (id == 1) {
                        if (prev_chapter == "") {
                            $('.previous').hide();
                        }
                    } else if (id <= 0) {
                        if (prev_chapter == "") {
                            alert('{{Lang::get("messages.front.reader.first-page-message")}}');
                              if(window.localStorage.getItem('readertype')=="all"){
                            if($(window).width()<=768){
                                $('.page-bar-new').fadeIn("slow");

                            }
                             }
                        } else {
                            location.href = prev_chapter;
                        }

                        return false;
                    } else {
                        $('.previous').show();
                    }

                    preload(id);
                    current_page = id;
                    next = parseInt(id + 1);
                    jQuery("html, body").stop(true, true);
                    if (!noscroll)
                        $("html, body").animate({scrollTop: $('div.pager-cnt').eq(0).offset().top});
                    if (pages[current_page - 1].external == 0) {
                        jQuery('.scan-page').attr('src', '{{HelperController::pageImageUrl($current->manga_slug,$current->chapter_slug,null)}}' + pages[current_page - 1].page_image);
                    } else {
                        jQuery('.scan-page').attr('src', pages[current_page - 1].page_image);
                    }
                    jQuery('.scan-page').parent().attr('href', "{{route('front.manga.reader', array($current->manga_slug,$current->chapter_slug))}}" + '/' + (current_page + 1));
                    jQuery('.scan-page').attr('alt', '{{ $current->manga_name }}: Chapter {{$current->chapter_slug}} - Page ' + current_page);
                    if (!nohash)
                        History.pushState(null, null, base_url + '/' + current_page);
                    document.title = title;
                    update_numberPanel();
                    return false;
                }
                @else
                function changePage(value) {
                    tab= Array();
                    tab[0]="{{route('front.manga.reader', array($current->manga_slug,$current->chapter_slug,''))}}";
                    tab[1]="/";
                    tab[2]=value;
                    location.href = tab.join("");
                }
                @endif
                /*章节阅读模式*/
                $('a#readertype').click(function() {
                    if (window.localStorage.getItem('readertype')=='all') {
                        window.localStorage.setItem("readertype","ppp");
                        readerppp();
                        return;
                    };
                    if (window.localStorage.getItem('readertype')=='ppp') {

                        window.localStorage.setItem("readertype","all");
                        readerall();
                         return;
                    }

                });

                function nextPage() {
                    // refresh test
                    @if($settings['reader.mode'] == 'noreload')
                    changePage(current_page + 1);
                    return false;
                    @else
                    nextPageVal = $('#page-list option:selected').next().val();
                    nextChapterVal = $('#chapter-list li.active').prev().val();

                    if (typeof nextPageVal != 'undefined') {
                        changePage(nextPageVal);
                    }
                    else if (typeof nextPageVal == 'undefined'
                            && typeof nextChapterVal != 'undefined') {
                        @if(!is_null($nextChapter))
                        location.href = "{{route('front.manga.reader', array($current->manga_slug,$nextChapter->chapter_slug))}}";
                        @endif
                    } else {
                        alert('{{Lang::get("messages.front.reader.last-page-message")}}');
                    }
                    @endif
                }

                function prevPage() {
                    // refresh test
                    @if($settings['reader.mode'] == 'noreload')
                    changePage(current_page - 1);
                    return false;
                    @else
                    prevPageVal = $('#page-list option:selected').prev().val();
                    prevChapterVal = $('#chapter-list li.active').next().val();

                    if (typeof prevPageVal != 'undefined') {
                        changePage(prevPageVal);
                    }
                    else if (typeof prevPageVal == 'undefined'
                            && typeof prevChapterVal != 'undefined') {
                        @if(!is_null($prevChapter))
                        location.href = "{{route('front.manga.reader', array($current->manga_slug,$prevChapter->chapter_slug,$prevChapterLastPage))}}";
                        @endif
                    } else {
                        alert('{{Lang::get("messages.front.reader.first-page-message")}}');
                    }
                    @endif
                }

                function nextChap(){
                    window.location = next_chapter;
                }

                function prevChap(){
                    window.location = @if(isset($prevChapter)) "{{route('front.manga.reader', array($current->manga_slug,$prevChapter->chapter_slug))}}" @else "" @endif;
                }

                function preload(id) {
                    var array = [];
                    var arraydata = [];
                    for (i = -preload_back; i < preload_next; i++) {
                        if (id + i >= 0 && id + i < pages.length) {
                            if (pages[(id + i)].external == 0) {
                                array.push('{{HelperController::pageImageUrl($current->manga_slug,$current->chapter_slug,null)}}' + pages[(id + i)].page_image);
                            } else {
                                array.push(pages[(id + i)].page_image);
                            }
                            arraydata.push(id + i);
                        }
                    }

                    jQuery.preload(array, {
                        threshold: 40,
                        enforceCache: true,
                        onComplete: function (data) {
                        }
                    });
                }

                function update_numberPanel() {
                    $('#page-list').selectpicker('val', current_page);
                    $('.pagenumber').text(current_page);
                }

                $('a#modePPP').click(function (e) {
                    e.preventDefault();
                    readerppp();

                    window.localStorage.setItem("readertype","ppp");
                });

                $('a#modeALL').click(function (e) {
                    e.preventDefault();
                    readerall();
                    window.localStorage.setItem("readertype","all");
                });

                $('select#page-list').on('change', function () {
                    changePage(this.value);
                });

                $(document).on('keyup', function (e) {
                    KeyCheck(e);
                });

                function KeyCheck(e) {
                    var ev = e || window.event;
                    ev.preventDefault();
                    var KeyID = ev.keyCode;
                    switch (KeyID) {
                        case 36:
                            window.location = "{{route('front.manga.show', array($current->manga_slug))}}";
                            break;
                        case 33:
                        case 37:
                            prevPage();
                            break;
                        case 34:
                        case 39:
                            nextPage();
                            break;
                    }
                }

                @if (is_module_enabled('MySpace'))
                    $('a.bookmark').click(function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "{{route('bookmark.store')}}",
                            method: 'POST',
                            data: {
                                'manga_id': '{{$current->manga_id}}',
                                'chapter_id': '{{$current->chapter_id}}',
                                'page_slug': '{{$page->page_slug}}',
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status == 'ok') {
                                    alert("{{Lang::get('messages.front.bookmarks.bookmarked')}}");
                                }
                            },
                            error: function (response) {
                                alert("{{Lang::get('messages.front.bookmarks.error')}}");
                            }
                        });
                    });
                    $('#bookmark').click(function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "{{route('bookmark.store')}}",
                            method: 'POST',
                            data: {
                                'manga_id': '{{$current->manga_id}}',
                                'chapter_id': '{{$current->chapter_id}}',
                                'page_slug': '{{$page->page_slug}}',
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status == 'ok') {
                                     $('#bookmark span').css('color','#ff1100');
                                    alert("{{Lang::get('messages.front.bookmarks.bookmarked')}}");
                                    
                                }
                            },
                            error: function (response) {
                                alert("{{Lang::get('messages.front.bookmarks.error')}}");
                                 
                            }
                        });
                    });
                @endif
            </script>
            @else
            <div style="margin: 100px auto; text-align: center; max-width: 220px;">
                <div class="alert alert-info">
                    <p>{{ Lang::get('messages.front.reader.no-page') }}</p>
                </div>
            </div>
            @endif
            </div>
            </div>
        </div>

        </div>
    </div>

    <!-- 底部 -->
    <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 manga-footer">
                        <div class="container">
                        <div class="row">
                             <!-- menu -->
                            <div class="">
                                <div class="col-lg-6">
                                    <div class="footer-copyright">
                                        &copy;&nbsp;<?php echo date("Y") ?>&nbsp;
                                        <a href="{{route('front.index')}}">{{$settings['site.name']}}</a>
                                        &nbsp;
                                        <a href="{{route('front.manga.contactUs')}}" title="{{Lang::get('messages.front.home.contact-us')}}"><i class="fa fa-envelope-square"></i></a>
                                        &nbsp;
                                        <a href="{{route('front.feed')}}" title="{{Lang::get('messages.front.home.rss-feed')}}" style="color: #FF9900"><i class="fa fa-rss-square"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                     <ul class="@if(config('settings.orientation') === 'rtl') pull-left @else pull-right @endif footer-menu">
                                    @if(!is_null($themeOpts) && !is_null($themeOpts->footer_menu))
                                    {!! HelperController::renderMenu($themeOpts->footer_menu) !!}
                                    @endif
                                </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- 底部中间返回顶部 -->
                        <div class="footer-back-top back-top show"><i class="fa fa-chevron-up"></i>top</div>
                    </div>
                </div>

                @stack('js')

                @yield('js')

                <script>
                    $(document).ready(function () {
                        /*返回顶部js功能*/
                        if ($(".back-top").length) {
                        var N = 50,
                        _ = function() {
                            var t = $(window).scrollTop();
                            t > N ? $(".back-top").addClass("show") : $(".back-top").removeClass("show")
                        };
                        _(),
                        $(window).on("scroll", function() {
                            _()
                        }),
                        $(".back-top").on("click", function(t) {
                            t.preventDefault(),
                            $("html,body").animate({
                                scrollTop: 0
                            }, 700)
                        })
                        }
                    });
                </script>
            </div>
        </footer>
        <!-- 返回顶部 -->
        <div class="back-to-top back-top show" title="Back to top"><i class="fa fa-chevron-up"></i></div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="z-index: 9999">
                <div class="modal-content">
                    {{ Form::open(array('route' => 'front.manga.reportBug', 'role' => 'form')) }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{Lang::get('messages.front.reader.report-broken-image')}}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="hidden" name="broken-image" value="{{$current->manga_name}} #{{$current->chapter_number. ' '}}@if(!is_null($page)){{Lang::get('messages.front.reader.page')}} {{$page->page_slug}}@endif">
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12">
                                <label for="email">{{ Lang::get('messages.front.reader.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label for="message">{{ Lang::get('messages.front.reader.message') }}</label>
                                <textarea rows="3" class="form-control" id="subject" name="subject"></textarea>
                            </div>
                        </div>
                        <br/>
                        @if(isset($captcha->form_report) && $captcha->form_report === '1')
                        <div class="form-group has-feedback {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            {!! $errors->first('g-recaptcha-response', '<span class="help-block">:message</span>') !!}
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('messages.front.reader.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ Lang::get('messages.front.reader.send') }}</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @if (Session::has('sentSuccess'))
        <div class="modal fade modal-success" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog" style="z-index: 9999">
                <div class="modal-content">
                    <div class="alert text-center alert-info">
                        {{ Lang::get('messages.front.reader.sentSuccess') }}
                    </div>
                </div>
            </div>
        </div>
        <script>$('.modal-success').modal('show')</script>
        @elseif ($errors->has('g-recaptcha-response'))
        <script>$('#myModal').modal('show')</script>
        @endif
    </body>
</html>
