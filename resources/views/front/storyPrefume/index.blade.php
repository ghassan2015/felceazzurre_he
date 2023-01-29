{{--@extends('front.layout._layout')--}}


{{--@section('title','The story of a perfume')--}}

{{--@section('style')--}}
{{--    @if(app()->getLocale()=='ar')--}}
{{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">--}}
{{--        <style>--}}
{{--            .cerchio {--}}
{{--                text-align: end;--}}
{{--            }--}}

{{--            div,h1, h2, h3, h4, h5, h6 {--}}
{{--                font-family: 'Tajawal', sans-serif;--}}
{{--            }--}}
{{--        </style>--}}
{{--    @endif--}}
{{--@endsection--}}
{{--    @section('content')--}}
{{--    <link type="text/css" rel="stylesheet" href="//felceazzurrait.cdn-immedia.net/sites/default/files/cdn/css/https/css_CUrGIkyTQh6n68fr5b8HJhnRVgvaK5rg4_m4Yhah0EU.css" media="all" />--}}
{{--    <!-- Google Tag Manager -->--}}
{{--    <script>--}}
{{--        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
{{--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
{{--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
{{--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
{{--        })(window,document,'script','dataLayer','GTM-MRJTQ5');</script>--}}
{{--    <!-- End Google Tag Manager -->--}}

{{--<div class="apri_social">--}}
{{--    <button type="button" class="social-overlay-close">Chiudi</button>--}}
{{--    <div class="apri_social_pad">--}}
{{--        <div class="animation">--}}
{{--            <ul>--}}
{{--                <li><div><a href="http://www.facebook.com/sharer/sharer.php?u=https://felceazzurra.it/en/story-perfume" class="sprite addthis_button_facebook" target="_blank" title="Facebook">Facebook</a></div></li>--}}
{{--                <li><div><a href="http://twitter.com/share?url=https://felceazzurra.it/en/story-perfume" class="sprite addthis_button_twitter" target="_blank" title="Twitter">Twitter</a></div></li>--}}
{{--                <li><div><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://felceazzurra.it/en/story-perfume&summary=" class="sprite addthis_button_linkedin" target="_blank" title="LinkedIn">LinkedIn</a></div></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




{{--<div class="ele_bread">--}}
{{--    <div class="sc_categorie">--}}
{{--        <span><a href="{{route('home')}}" title="Home"><span>@lang('lang.Home')</span></a></span>--}}
{{--        <span class="separator">&gt;</span>--}}
{{--        <span><a href="#" class="active" title="The story of a perfume"><span>@lang('lang.The story of a perfume')</span></a></span>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="section" id="first_block">--}}

{{--    <div class="swiper-container" id="gallery_piano">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            <div class="swiper-slide">--}}
{{--                <meta itemprop="contentUrl" content="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/02.jpg">--}}
{{--                <div title="The story of a perfume" class="swiper-lazy" data-background="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/02.jpg">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="fascia">--}}
{{--        <div class="pad_fascia">--}}
{{--            <ul>--}}
{{--                @foreach($stories_cd as $key=>$story)--}}

{{--                <li id="high{{++$key}}">--}}
{{--                    <a href="#" onclick="goToByScroll('sec{{$key}}','100'); return false;" title="The perfume of an Italian story"><span>@lang('lang.The story of a perfume')<strong>{{$story->name}}</strong></span></a>--}}
{{--                </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="sec1">--}}
{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_1">--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[0]->image)}}" width="403" height="204" alt="{{$stories[0]->title}}" title="{{$stories[0]->title}}" class="img120 animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>{{$stories[0]->title}}</h3>--}}
{{--                    <h1>--}}
{{--                        @lang('lang.The perfume of')<br>--}}
{{--                        {{$stories[0]->story_constant_cd->name}}--}}
{{--                    </h1>--}}
{{--                    <p>--}}
{{--                        {{$stories[0]->description}}--}}
{{--                                            </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="sec2">--}}
{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_3">--}}
{{--                <div class="animatedivopa">--}}
{{--                    <h2 class="nopad">--}}
{{--                        @lang('lang.The perfume of')--}}
{{--                        {{$stories[1]->story_constant_cd->name??''}}--}}
{{--                    </h2>--}}
{{--                    <h4>--}}
{{--                        {{$stories[1]->title}}--}}
{{--                    </h4>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[1]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_1">--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[1]->image)}}" width="241" height="316" alt="{{$stories[1]->title}}" title="{{$stories[1]->title}}" class="animate lazyload" />--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[2]->image)}}" width="224" height="308" alt="{{$stories[2]->title}}" title="{{$stories[2]->title}}" class="animate ultimo lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2" >--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[2]->story_constant_cd->name}}                    </h3>--}}
{{--                    <h2>--}}


{{--                            {{$stories[2]->title}}--}}


{{--                    </h2>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[2]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="pad_storia right">--}}
{{--            <div class="pad_storia_1">--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[3]->image)}}" width="257" height="314" alt="{{$stories[3]->title}}" title="{{$stories[3]->title}}" class="animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[3]->story_constant_cd->name}}                     </h3>--}}
{{--                    <h2>--}}
{{--                        {{$stories[3]->title}}                 </h2>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[3]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="pad_storia">--}}

{{--            <div class="pad_storia_1">--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[4]->image)}}" width="337" height="418" alt="{{$stories[4]->title}}" title="{{$stories[4]->title}}" class="animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[4]->story_constant_cd->name}}--}}
{{--                    </h3>--}}
{{--                    <h2>--}}
{{--                        {{$stories[4]->title}}                 </h2>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[4]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div id="sec3">--}}

{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_3">--}}
{{--                <div class="animatedivopa">--}}
{{--                    <h2>--}}
{{--                        @lang('lang.The perfume of') {{$stories[4]->story_constant_cd->name}}--}}
{{--                    </h2>--}}
{{--                    <p>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[4]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_1">--}}
{{--                <img  style="margin-right: 30px" src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[5]->image)}}" width="445" height="474" alt="{{$stories[5]->title}}" title="{{$stories[5]->title}}" class="animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[5]->story_constant_cd->name}}--}}
{{--                    </h3>--}}
{{--                    <h2>--}}
{{--                        {{$stories[5]->title}}--}}
{{--                    </h2>--}}

{{--                    <p>--}}
{{--                        {!!  $stories[5]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="pad_storia right">--}}

{{--            <div class="pad_storia_1">--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/08.jpg" width="439" height="359" alt="{{$stories[6]->title}}" title="{{$stories[1]->title}}" class="animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[6]->story_constant_cd->name}}--}}
{{--                    </h3>--}}
{{--                    <h2>--}}
{{--                        {{$stories[6]->title}}--}}
{{--                    </h2>--}}

{{--                    <p>--}}
{{--                        {!!  $stories[6]->description!!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--    <div id="sec4">--}}
{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_3">--}}
{{--                <div class="animatedivopa">--}}
{{--                    <h2>--}}
{{--                        @lang('lang.The perfume of') {{$stories[7]->story_constant_cd->name}}--}}
{{--                    </h2>--}}
{{--                    <p>--}}


{{--                    <p>--}}
{{--                        {!!  $stories[7]->description!!}--}}
{{--                    </p>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="pad_storia">--}}
{{--            <div class="pad_storia_1">--}}
{{--                <img style="margin-right: 30px" src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[8]->image)}}" width="442" height="278" alt="Quality" title="Quality" class="animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[8]->story_constant_cd->name}}--}}
{{--                    </h3>--}}
{{--                    <h2>--}}
{{--                     {{$stories[8]->title}}--}}
{{--                    </h2>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[8]->description!!}--}}

{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="pad_storia right">--}}

{{--            <div class="pad_storia_1">--}}
{{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/10.jpg" width="445" height="316" alt="Manufacturing" title="Manufacturing" class="animate lazyload" />--}}
{{--            </div>--}}
{{--            <div class="pad_storia_2">--}}
{{--                <div class="animatediv">--}}
{{--                    <h3>--}}
{{--                        @lang('lang.The perfume of') {{$stories[9]->story_constant_cd->name}}--}}
{{--                    </h3>--}}
{{--                    <h2>--}}
{{--                        {{$stories[9]->title}}--}}
{{--                    </h2>--}}
{{--                    <p>--}}
{{--                        {!!  $stories[9]->description!!}--}}

{{--                    </p>--}}
{{--                  </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}




{{--<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_g8EWhFWWgJll--K6HBIi-I-TNOY3G6L6MNTjZJ-YXs4.js"></script>--}}
{{--<script type="text/javascript">--}}
{{--    document.createElement( "picture" );--}}
{{--    //--><!]]>--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
{{--    jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"en\/","ajaxPageState":{"theme":"felceazzurra","theme_token":"EckcV0bOTiCYkhLekYEXMvudoN_IQL447lgLftLPa1k","js":{"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lazysizes.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/ls.unveilhooks.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/swiper.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lib\/greensock\/TweenMax.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/ScrollMagic.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/animation.gsap.js":1,"sites\/all\/modules\/contrib\/picture\/picturefill2\/picturefill.min.js":1,"sites\/all\/modules\/contrib\/picture\/picture.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/common.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/it_cookie_compliance.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/storia.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"public:\/\/minifyjs\/misc\/jquery-extend-3.4.0.min.js":1,"public:\/\/minifyjs\/misc\/jquery-html-prefilter-3.5.0-backport.min.js":1,"public:\/\/minifyjs\/misc\/jquery.once.min.js":1,"public:\/\/minifyjs\/misc\/drupal.min.js":1,"0":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"sites\/all\/modules\/contrib\/picture\/picture_wysiwyg.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"modules\/locale\/locale.css":1,"sites\/all\/themes\/felceazzurra\/css\/PFDinTextCompPro.css":1,"sites\/all\/themes\/felceazzurra\/css\/common.css":1,"sites\/all\/themes\/felceazzurra\/css\/swipe.css":1,"sites\/all\/themes\/felceazzurra\/css\/storia.css":1}}});--}}
{{--    //--><!]]>--}}
{{--</script>--}}
{{--<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_hgkRUJdbh_NSNbcbRKyIfNehDE0513rzVfToJnW85Gs.js"></script>--}}

{{--    @endsection--}}





    <!DOCTYPE HTML>
<!--[if IE 7 ]> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="ie9"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-dns-prefetch-control" content="on" />
    <link rel="dns-prefetch" href="//felceazzurrait.cdn-immedia.net" />
    <!--[if IE 9]>
    <link rel="prefetch" href="//felceazzurrait.cdn-immedia.net" />
    <![endif]-->
    <script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://felceazzurra.it/en"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "The story of a perfume",
            "item": "https://felceazzurra.it/en/story-perfume"
        }
    ]
}</script>
    <link rel="alternate" hreflang="en" href="https://felceazzurra.it/en/story-perfume" />
    <link rel="alternate" hreflang="it" href="https://felceazzurra.it/it/storia-di-un-profumo" />
    <meta name="description" content="Felce Azzurra is the story of a perfume born more than a century ago in the Paglieri laboratories. Click and read the whole story!" />
    <meta name="generator" content="Drupal 7 (http://drupal.org)" />
    <link rel="canonical" href="https://felceazzurra.it/en/story-perfume" />
    <meta property="og:site_name" content="Felce Azzurra" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://felceazzurra.it/en/story-perfume" />
    <meta property="og:title" content="The story of a perfume" />
    <meta property="og:updated_time" content="2021-04-30T15:42:34+02:00" />
    <meta property="og:image" content="https://felceazzurra.it/" />
    <meta property="og:image:url" content="//felceazzurrait.cdn-immedia.net/sites/all/themes/felceazzurra/img/fb/generale.jpg" />
    <meta property="article:published_time" content="2016-06-24T15:24:36+02:00" />
    <meta property="article:modified_time" content="2021-04-30T15:42:34+02:00" />
    <meta name="theme-color" content="#06215a" />
    <link rel="shortcut icon" href="//felceazzurrait.cdn-immedia.net/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="icon" href="//felceazzurrait.cdn-immedia.net/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" href="//felceazzurrait.cdn-immedia.net/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="//felceazzurrait.cdn-immedia.net/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" href="//felceazzurrait.cdn-immedia.net/android-icon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-72x72.png" sizes="72x72" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-76x76.png" sizes="76x76" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-114x114.png" sizes="114x114" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-120x120.png" sizes="120x120" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-144x144.png" sizes="144x144" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-152x152.png" sizes="152x152" />
    <link rel="apple-touch-icon" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-180x180.png" sizes="180x180" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-57x57-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-72x72-precomposed.png" sizes="72x72" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-76x76-precomposed.png" sizes="76x76" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-114x114-precomposed.png" sizes="114x114" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-120x120-precomposed.png" sizes="120x120" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-144x144-precomposed.png" sizes="144x144" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-152x152-precomposed.png" sizes="152x152" />
    <link rel="apple-touch-icon-precomposed" href="//felceazzurrait.cdn-immedia.net/apple-touch-icon-180x180-precomposed.png" sizes="180x180" />
    <title>The story of a perfume | Felce Azzurra</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="//felceazzurrait.cdn-immedia.net/sites/default/files/cdn/css/https/css_3IZKBSX7ccV67ksv2q-k4OdQeAF3uHlBU084P6NiigQ.css" media="all" />
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MRJTQ5');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="closed">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRJTQ5"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<!-- MENU -->
<!--<div class="back_pace"></div>-->
@include('front.layout.include.header')


<!-- MENU -->


<div class="apri_social">
    <button type="button" class="social-overlay-close">Chiudi</button>
    <div class="apri_social_pad">
        <div class="animation">
            <ul>
                <li><div><a href="http://www.facebook.com/sharer/sharer.php?u=https://felceazzurra.it/en/story-perfume" class="sprite addthis_button_facebook" target="_blank" title="Facebook">Facebook</a></div></li>
                <li><div><a href="http://twitter.com/share?url=https://felceazzurra.it/en/story-perfume" class="sprite addthis_button_twitter" target="_blank" title="Twitter">Twitter</a></div></li>
                <li><div><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://felceazzurra.it/en/story-perfume&summary=" class="sprite addthis_button_linkedin" target="_blank" title="LinkedIn">LinkedIn</a></div></li>
            </ul>
        </div>
    </div>
</div>




<div class="ele_bread">
    <div class="sc_categorie">
        <span><a href="https://felceazzurra.it/en" title="Home"><span>Home</span></a></span>
        <span class="separator">&gt;</span>
        <span><a href="#" class="active" title="The story of a perfume"><span>The story of a perfume</span></a></span>
    </div>
</div>


<div class="section" id="first_block">

    <div class="swiper-container" id="gallery_piano">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <meta itemprop="contentUrl" content="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/02.jpg">
                <div title="The story of a perfume" class="swiper-lazy" data-background="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/02.jpg">
                </div>
            </div>
        </div>
    </div>
    <div class="fascia">
            <div class="fascia">
                <div class="pad_fascia">
                    <ul>
                        @foreach($stories_cd as $key=>$story)

                        <li id="high{{++$key}}">
                            <a href="#" onclick="goToByScroll('sec{{$key}}','100'); return false;" title="The perfume of an Italian story"><span>@lang('lang.The story of a perfume')<strong>{{$story->name}}</strong></span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    </div>
        <div id="sec1">
            <div class="pad_storia">
                <div class="pad_storia_1">
                    <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[0]->image)}}" width="403" height="204" alt="{{$stories[0]->title}}" title="{{$stories[0]->title}}" class="img120 animate lazyload" />
                </div>
                <div class="pad_storia_2">
                    <div class="animatediv">
                        <h3>{{$stories[0]->title}}</h3>
                        <h1>
                            @lang('lang.The perfume of')<br>
                            {{$stories[0]->story_constant_cd->name}}
                        </h1>
                        <p>
                            {{$stories[0]->description}}
                                                </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="sec2">
            <div class="pad_storia">
                <div class="pad_storia_3">
                    <div class="animatedivopa">
                        <h2 class="nopad">
                            @lang('lang.The perfume of')
                            {{$stories[1]->story_constant_cd->name??''}}
                        </h2>
                        <h4>
                            {{$stories[1]->title}}
                        </h4>
                        <p>
                            {!!  $stories[1]->description!!}
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div id="sec3">

            <div class="pad_storia">
                <div class="pad_storia_3">
                    <div class="animatedivopa">
                        <h2>
                            @lang('lang.The perfume of') {{$stories[4]->story_constant_cd->name}}
                        </h2>
                        <p>
                        <p>
                            {!!  $stories[4]->description!!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="pad_storia">
                <div class="pad_storia_1">
                    <img  style="margin-right: 30px" src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[5]->image)}}" width="445" height="474" alt="{{$stories[5]->title}}" title="{{$stories[5]->title}}" class="animate lazyload" />
                </div>
                <div class="pad_storia_2">
                    <div class="animatediv">
                        <h3>
                            @lang('lang.The perfume of') {{$stories[5]->story_constant_cd->name}}
                        </h3>
                        <h2>
                            {{$stories[5]->title}}
                        </h2>

                        <p>
                            {!!  $stories[5]->description!!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="pad_storia right">

                <div class="pad_storia_1">
                    <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/08.jpg" width="439" height="359" alt="{{$stories[6]->title}}" title="{{$stories[1]->title}}" class="animate lazyload" />
                </div>
                <div class="pad_storia_2">
                    <div class="animatediv">
                        <h3>
                            @lang('lang.The perfume of') {{$stories[6]->story_constant_cd->name}}
                        </h3>
                        <h2>
                            {{$stories[6]->title}}
                        </h2>

                        <p>
                            {!!  $stories[6]->description!!}
                        </p>
                    </div>
                </div>
            </div>


        </div>


    <div id="sec4">
                    <div class="pad_storia">
                        <div class="pad_storia_3">
                            <div class="animatedivopa">
                                <h2>
                                    @lang('lang.The perfume of') {{$stories[7]->story_constant_cd->name}}
                                </h2>
                                <p>


                                <p>
                                    {!!  $stories[7]->description!!}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="pad_storia">
                        <div class="pad_storia_1">
                            <img style="margin-right: 30px" src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/stories/'.$stories[8]->image)}}" width="442" height="278" alt="Quality" title="Quality" class="animate lazyload" />
                        </div>
                        <div class="pad_storia_2">
                            <div class="animatediv">
                                <h3>
                                    @lang('lang.The perfume of') {{$stories[8]->story_constant_cd->name}}
                                </h3>
                                <h2>
                                 {{$stories[8]->title}}
                                </h2>
                                <p>
                                    {!!  $stories[8]->description!!}

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pad_storia right">

                        <div class="pad_storia_1">
                            <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/storia/10.jpg" width="445" height="316" alt="Manufacturing" title="Manufacturing" class="animate lazyload" />
                        </div>
                        <div class="pad_storia_2">
                            <div class="animatediv">
                                <h3>
                                    @lang('lang.The perfume of') {{$stories[9]->story_constant_cd->name}}
                                </h3>
                                <h2>
                                    {{$stories[9]->title}}
                                </h2>
                                <p>
                                    {!!  $stories[9]->description!!}

                                </p>
                              </div>
                        </div>
                    </div>

                </div>
            </div>



<footer>
    <div id="footer">
        <ul class="link_social">
            <li>
                <a href="https://www.facebook.com/FelceAzzurraPaglieri" target="_blank" title="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.344 18.875" style="height:30px;"><path id="facebook" class="cls-1" d="M681.169,731.184a0.825,0.825,0,0,1,.887-0.907H684.3v-3.235l-3.1-.012c-3.436,0-4.218,2.413-4.218,3.956v2.157H675v3.331h1.988v9.43h4.18v-9.43h2.821l0.366-3.331h-3.187v-1.959Z" transform="translate(-675 -727.031)"/></svg>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/felceazzurra/" target="_blank" title="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" style="height:30px;"><path id="Instagram" class="cls-1" d="M250,43.405c67.287,0,75.257.257,101.829,1.469C376.4,46,389.742,50.1,398.622,53.552A78.064,78.064,0,0,1,427.6,72.4a78.063,78.063,0,0,1,18.851,28.976c3.451,8.879,7.556,22.223,8.677,46.792,1.213,26.573,1.469,34.543,1.469,101.83s-0.256,75.257-1.469,101.829c-1.121,24.57-5.226,37.913-8.677,46.793a83.451,83.451,0,0,1-47.826,47.826c-8.88,3.451-22.223,7.556-46.793,8.677-26.568,1.212-34.538,1.469-101.829,1.469s-75.261-.257-101.829-1.469c-24.57-1.121-37.913-5.226-46.793-8.677A78.082,78.082,0,0,1,72.4,427.6a78.082,78.082,0,0,1-18.851-28.976C50.1,389.742,46,376.4,44.875,351.829,43.662,325.257,43.406,317.287,43.406,250s0.257-75.257,1.469-101.83C46,123.6,50.1,110.257,53.552,101.378A78.073,78.073,0,0,1,72.4,72.4a78.075,78.075,0,0,1,28.976-18.851C110.258,50.1,123.6,46,148.17,44.874c26.573-1.212,34.543-1.469,101.83-1.469M250-2c-68.439,0-77.021.29-103.9,1.516C119.278,0.74,100.96,5,84.93,11.23A123.526,123.526,0,0,0,40.3,40.3,123.526,123.526,0,0,0,11.23,84.93C5,100.96.74,119.278-.484,146.1-1.71,172.979-2,181.56-2,250s0.29,77.02,1.516,103.9C0.74,380.722,5,399.04,11.23,415.069A123.53,123.53,0,0,0,40.3,459.7,123.534,123.534,0,0,0,84.93,488.77c16.03,6.229,34.348,10.489,61.171,11.713C172.979,501.71,181.561,502,250,502s77.021-.289,103.9-1.516c26.823-1.224,45.141-5.484,61.171-11.713a128.857,128.857,0,0,0,73.7-73.7c6.23-16.029,10.49-34.347,11.714-61.17C501.71,327.02,502,318.439,502,250s-0.29-77.021-1.516-103.9C499.26,119.278,495,100.96,488.77,84.93A123.521,123.521,0,0,0,459.7,40.3,123.527,123.527,0,0,0,415.07,11.23C399.04,5,380.722.74,353.9-.484,327.021-1.71,318.439-2,250-2h0Zm0,122.594A129.406,129.406,0,1,0,379.405,250,129.405,129.405,0,0,0,250,120.594ZM250,334a84,84,0,1,1,84-84A84,84,0,0,1,250,334ZM414.758,115.482a30.24,30.24,0,1,1-30.24-30.24A30.24,30.24,0,0,1,414.758,115.482Z"/></svg>
                </a>
            </li>
        </ul>
        <p>
            <a href="https://www.paglieri.com" title="Paglieri" target="_blank">
                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/paglieri.png" alt="Paglieri" title="Paglieri" class="lazyload"/>
            </a>
        </p>


        <p>
            <span>Paglieri S.p.A.</span> - S.S. n° 10 per Genova Km 98 - 15122 Alessandria - Italy<br />
            CAP.SOC. EURO 1.560.000.00 I.V. - Company register number, F.C. and VAT number 01681270060 - C.C.I.A.A. R.E.A. AL N.177317<br />
            <a href="mailto:amministrazione.finanza&#064;pec.paglieri.com" title="amministrazione.finanza&#064;pec.paglieri.com">amministrazione.finanza&#064;pec.paglieri.com</a></p>


        <p>
            © Paglieri S.p.A. 2021, All rights reserved <span class="nomobile2">-</span> <a href="https://www.paglieri.com/en/policy" target="_blank" title="Privacy Policy">Privacy Policy</a> <span class="nomobile2">-</span> <a href="/en/contacts" title="Contacts">Contacts</a> <span class="nomobile2">-</span> <a href="/en/cookie-policy" title="Cookie Policy">Cookie Policy</a> <span class="nomobile2">-</span> <a href="/en/legal-notes">Legal notes</a> <span class="nomobile2">-</span> <a href="https://www.immedia.net" title="Digital Agency IM*MEDIA" target="_blank" id="link_immedia">Credits</a>
        </p>

    </div>

</footer>

<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_g8EWhFWWgJll--K6HBIi-I-TNOY3G6L6MNTjZJ-YXs4.js"></script>
<script type="text/javascript">
    document.createElement( "picture" );
    //--><!]]>
</script>
<script type="text/javascript">
    jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"en\/","setHasJsCookie":0,"ajaxPageState":{"theme":"felceazzurra","theme_token":"kdfCys6U00v6d2r0b1lEZVV77SkoU7dC-wWMivPKZAo","js":{"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lazysizes.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/ls.unveilhooks.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/swiper.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lib\/greensock\/TweenMax.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/ScrollMagic.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/animation.gsap.js":1,"sites\/all\/modules\/contrib\/picture\/picturefill2\/picturefill.min.js":1,"sites\/all\/modules\/contrib\/picture\/picture.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/common.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/it_cookie_compliance.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/storia.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"public:\/\/minifyjs\/misc\/jquery-extend-3.4.0.min.js":1,"public:\/\/minifyjs\/misc\/jquery-html-prefilter-3.5.0-backport.min.js":1,"public:\/\/minifyjs\/misc\/jquery.once.min.js":1,"public:\/\/minifyjs\/misc\/drupal.min.js":1,"0":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"sites\/all\/modules\/contrib\/picture\/picture_wysiwyg.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"modules\/locale\/locale.css":1,"sites\/all\/themes\/felceazzurra\/css\/PFDinTextCompPro.css":1,"sites\/all\/themes\/felceazzurra\/css\/common.css":1,"sites\/all\/themes\/felceazzurra\/css\/swipe.css":1,"sites\/all\/themes\/felceazzurra\/css\/storia.css":1}}});
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_hgkRUJdbh_NSNbcbRKyIfNehDE0513rzVfToJnW85Gs.js"></script>
</body>
</html>
