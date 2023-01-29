@extends('front.layout._layout')
@section('title',$category->title)

@section('style')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}" media="all" />
<style>
    div.elenco ul li a .blocco_img img{
        opacity: 1 !important;
    }
</style>
    @if(app()->getLocale()=='ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
        <style>
            .cerchio {
                text-align: end;
            }

            div,h1, h2, h3, h4, h5, h6 {
                font-family: 'Tajawal', sans-serif;
            }
        </style>




    @endif
@endsection
@section('content')
<div class="ele_bread">
    <div class="sc_categorie">
        <span><a  href="{{route('home')}}" title="Home"><span>@lang('lang.Home')</span></a></span>  <span class="separator">&gt;</span>  <span><a class="active"  title="{{$category->title}}"><span>{{$category->title}}</span></a></span>		</div>
</div>

<div class="section"  id="first_block">
    <div class="apertura_categoria_top">
        <div class="inner_container">
            <h1>{{$category->title}}</h1>
        </div>
    </div>
    <div class="elenco_top">
        <ul class="elenco_top">
            @foreach($categories as $category)

            <li>
                <a href="{{url('/'.app()->getLocale().'/'.$category->parent->slug.'/'.$category->slug)}}">
                    <div class="blocco_svg">
                    <img src="{{asset('assets/images/categories/'.$category->icon_image_white)}}" width="100%" height="100%" style="fill: #FFFFFF;">
                    </div>
                    <span>{{$category->title}}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>


    <div class="elenco">
        <ul class="elenco">
            @foreach($categories as $category)
                <li>
                    <a href="{{url('/'.app()->getLocale().'/'.$category->parent->slug.'/'.$category->slug)}}" title="{{$category->title}}">
                        <div class="blocco_img"><img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/categories/'.$category->image)}}" alt="Bodywash Narcissus" title="Bodywash Narcissus" class="lazyload"> </div>
                        <h2>{{$category->title}}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>


<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_g8EWhFWWgJll--K6HBIi-I-TNOY3G6L6MNTjZJ-YXs4.js"></script>
<script type="text/javascript">
    <!--//--><![CDATA[//><!--
    document.createElement( "picture" );
    //--><!]]>
</script>
<script type="text/javascript">
    jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"en\/","setHasJsCookie":0,"ajaxPageState":{"theme":"felceazzurra","theme_token":"-KZl24bETbCHc-dvj0ygB6OcOv5dT3SlncVEGlCNG7U","js":{"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lazysizes.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/ls.unveilhooks.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/swiper.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lib\/greensock\/TweenMax.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/ScrollMagic.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/animation.gsap.js":1,"sites\/all\/modules\/contrib\/picture\/picturefill2\/picturefill.min.js":1,"sites\/all\/modules\/contrib\/picture\/picture.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/common.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/it_cookie_compliance.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/categoria.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"public:\/\/minifyjs\/misc\/jquery-extend-3.4.0.min.js":1,"public:\/\/minifyjs\/misc\/jquery-html-prefilter-3.5.0-backport.min.js":1,"public:\/\/minifyjs\/misc\/jquery.once.min.js":1,"public:\/\/minifyjs\/misc\/drupal.min.js":1,"0":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"sites\/all\/modules\/contrib\/picture\/picture_wysiwyg.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"modules\/locale\/locale.css":1,"modules\/taxonomy\/taxonomy.css":1,"sites\/all\/themes\/felceazzurra\/css\/PFDinTextCompPro.css":1,"sites\/all\/themes\/felceazzurra\/css\/common.css":1,"sites\/all\/themes\/felceazzurra\/css\/swipe.css":1,"sites\/all\/themes\/felceazzurra\/css\/categoria.css":1}}});
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_HKoQE36HtLF5197bKMEQxNCRg85tBk5mcLUj99nPoxTR.js"></script>@endsection

