@php($setting=\App\Models\Setting::first())

<html>

<head>

    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-dns-prefetch-control" content="on" />

    <link rel="alternate" hreflang="en" href="{{url('/en')}}" />
    <link rel="alternate" hreflang="ar" href="{{url('/ar')}}" />
    <meta name="description" content="{{$setting->website_bio}}" />
    <meta name="generator" content="{{$setting->website_bio}}" />
    <link rel="canonical" href="{{route('home')}}" />
    <link rel="shortlink" href="{{route('home')}}" />
    <meta property="og:site_name" content="{{$setting->website_name}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:title" content="@yield('og:title')" />
    <meta property="og:description" content="@yield('og:description')" />
    <meta property="og:image:url" content="{{$setting->website_wide_logo()}}" />
    <meta name="theme-color" content="#06215a" />
    <link rel="shortcut icon" href="{{$setting->website_icon()}}" type="image/vnd.microsoft.icon" />

    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/home.css')}}" media="all" />
    <link type="text/css" rel="stylesheet" href="//assets.juicer.io/embed.css" media="all" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/home_v2.css')}}" media="all" />

@yield('style')

{{--        <style>--}}
{{--            #main-menu-2{--}}
{{--                margin-right: -6% !important;--}}
{{--            }--}}
{{--            @media screen and (min-width: 320px) and (max-width: 767px) {--}}
{{--                #ul_main-menu ul#main-menu-2 {--}}
{{--                    margin-top: 30%;--}}
{{--                }--}}
{{--            }--}}

{{--            ul { margin: 0 20px; padding: 0; }--}}
{{--            ul li {--}}
{{--                /*margin: 0; padding: 0;*/--}}
{{--                /*list-style: disc url(images/ico-bullet_round.gif);*/--}}
{{--                direction:rtl;--}}
{{--            }--}}

{{--        </style>--}}


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
@yield('content')

@include('front.layout.include.footer')




<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_g8EWhFWWgJll--K6HBIi-I-TNOY3G6L6MNTjZJ-YXs4.js"></script>
<script type="text/javascript">
    document.createElement( "picture" );
    //--><!]]>
</script>
<script type="text/javascript">
    jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"en\/","setHasJsCookie":0,"ajaxPageState":{"theme":"felceazzurra","theme_token":"3yq8CwDEOYYG61sApUtO9CsEdBRV_E97IRwTRDWaH1Q","js":{"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lazysizes.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/ls.unveilhooks.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/swiper.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lib\/greensock\/TweenMax.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/ScrollMagic.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/animation.gsap.js":1,"sites\/all\/modules\/contrib\/picture\/picturefill2\/picturefill.min.js":1,"sites\/all\/modules\/contrib\/picture\/picture.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/common.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/it_cookie_compliance.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/home.js":1,"\/\/assets.juicer.io\/embed.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"public:\/\/minifyjs\/misc\/jquery-extend-3.4.0.min.js":1,"public:\/\/minifyjs\/misc\/jquery-html-prefilter-3.5.0-backport.min.js":1,"public:\/\/minifyjs\/misc\/jquery.once.min.js":1,"public:\/\/minifyjs\/misc\/drupal.min.js":1,"0":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"sites\/all\/modules\/contrib\/picture\/picture_wysiwyg.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"sites\/all\/modules\/contrib\/panels\/plugins\/layouts\/onecol\/onecol.css":1,"modules\/locale\/locale.css":1,"sites\/all\/themes\/felceazzurra\/css\/PFDinTextCompPro.css":1,"sites\/all\/themes\/felceazzurra\/css\/common.css":1,"sites\/all\/themes\/felceazzurra\/css\/swipe.css":1,"\/\/assets.juicer.io\/embed.css":1,"sites\/all\/themes\/felceazzurra\/css\/home.css":1}}});
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_idWuiSdBa3cSiWmSKzVicl0FC2aUqaqDLEQ7y4a186E.js"></script>
<script type="text/javascript" src="//assets.juicer.io/embed.js"></script>
</body>
</html>
