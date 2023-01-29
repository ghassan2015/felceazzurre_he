@extends('front.layout._layout')
@section('title',$product->name)
@section('style')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/new_style.css')}}" media="all" />

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
    @media screen and (min-width: 320px) and (max-width: 767px) {
        .padsection .cerchio.open {
            text-align: end;
        }
        div,h1, h2, h3, h4, h5, h6 {
            font-family: 'Tajawal', sans-serif;
        }
    }
</style>




@endif
@endsection
@section('content')


<div class="apri_social">
    <button type="button" class="social-overlay-close">Chiudi</button>
    <div class="apri_social_pad">
        <div class="animation">
            <ul>
                <li><div><a href="http://www.facebook.com/sharer/sharer.php?u=https://felceazzurra.it/en/perfumes-your-skin/bodywash/original" class="sprite addthis_button_facebook" target="_blank" title="Facebook">Facebook</a></div></li>
                <li><div><a href="http://twitter.com/share?url=https://felceazzurra.it/en/perfumes-your-skin/bodywash/original" class="sprite addthis_button_twitter" target="_blank" title="Twitter">Twitter</a></div></li>
                <li><div><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://felceazzurra.it/en/perfumes-your-skin/bodywash/original&summary=" class="sprite addthis_button_linkedin" target="_blank" title="LinkedIn">LinkedIn</a></div></li>
            </ul>
        </div>
    </div>
</div>

<div class="ele_bread">
    <div class="sc_categorie">
        <span><a  href="{{route('home')}}" title="Home"><span>@lang('lang.Home')</span></a></span>  <span class="separator">&gt;</span>  <span><a  href="{{route('category.index',$product->category->parent->parent->slug)}}" title="{{$product->category->parent->parent->title}}"><span>{{$product->category->parent->title}}</span></a></span>  <span class="separator">&gt;</span>  <span><a  href="{{url('/'.app()->getLocale().'/'.$product->category->parent->parent->slug.'/'.$product->category->parent->slug)}}" title="Bodywash"> <span><a class="active" href="" title="{{$product->name}}"><span>{{$product->name}}</span></a></span>
    </div>
</div>


<div class="section" id="first_block">
    <div id="divtop">

        <div class="swiper-slide" style="background-image: url('//felceazzurrait.cdn-immedia.net/sites/default/files/styles/background_prodotto/public/upload/products/sfondo_blu_0.jpg?itok=lmEr7lbq');" title="{{$product->name}}">

            <div class="swiper-button-prev">
                @if(isset($last_product))

                <a href="{{url('/'.app()->getLocale().'/'.$last_product->category->parent->slug.'/'.$last_product->category->slug.'/'.$last_product->slug)}}" alt="{{$last_product->name}} " title="Bagnodoccia Ebano e Vaniglia "><svg width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#fff" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" points="45.63,75.8 0.375,38.087 45.63,0.375 "/>
                    </svg>
                </a>
                    @endif
            </div>
            <div class="swiper-button-next">
                @if(isset($product_next))

                <a   href="{{url('/'.app()->getLocale().'/'.$product_next->category->parent->slug.'/'.$product_next->category->slug.'/'.$product_next->slug)}}" class="next"><svg width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#fff" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" points="0.375,0.375 45.63,38.087 0.375,75.8 "/>
                    </svg> </a>
                @endif

            </div>




            <div class="pad_cerchio">
                <div class="cerchio">
                    <h1>
                        {{$product->name}}
                    </h1>
                    <p>
                       {{$product->smell_product}}
                    </p>


                </div>
                <img src="{{asset('assets/images/products/'.$product->product_image)}}" data-src="{{asset('assets/images/products/'.$product->product_image)}}" alt="{{$product->name}}" title="{{$product->name}}" class="lazyload" />


                <div class="share_amazon">
                    <ul>
                        <li>
                            <a href="#" class="share_top" title="Share">Share</a>
                        </li>
                    </ul>
                </div>

            </div>



        </div>
    </div>
</div>
<div class="section" id="secondo_block">
    <div class="padsection left">

        <div class="cerchio" >
{{--            <h2>--}}

{{--                @lang('lang.Fragrance')--}}
{{--            </h2>--}}


            <p>
                {!! $product->fragrance !!}
            </p>

        </div>
        <img src="{{asset('assets/images/products/'.$product->fragrance_image)}}" data-src="{{asset('assets/images/products/'.$product->fragrance_image)}}" alt="{{$product->name}}" title="{{$product->name}}" class="lazyload" />
    </div>
</div>

<div class="section" id="terzo_block">

    <div class="padsection right">

        <div class="cerchio">
{{--            <h2>--}}
{{--           @lang('lang.Formula')--}}
{{--            </h2>--}}

            <p>{!! $product->formula !!}</p>


        </div>
        <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/products/'.$product->formula_image)}}" alt="Formula" title="Formula" class="lazyload" />
    </div>
</div>



<div class="section" id="quarto_block">
    <div class="padsection">
        <div class="cerchio-text">
            @if($product->size)
            <h2>@lang('lang.Available sizes')</h2>
            <p>
                {{$product->size}}
{{--                @lang('lang.ml')--}}
            </p>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_g8EWhFWWgJll--K6HBIi-I-TNOY3G6L6MNTjZJ-YXs4.js"></script>
<script type="text/javascript">
    document.createElement( "picture" );
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_Hi-rORy0yoQpsD2oNYY2JnSvsESiMl9dOQ7f4UbTgVs.js"></script>
<script type="text/javascript">
    jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"en\/","ajaxPageState":{"theme":"felceazzurra","theme_token":"LE7XQj_IM5AQjJninWHnuXmglVYqoK7guzauf_eINK0","js":{"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lazysizes.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/ls.unveilhooks.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/swiper.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lib\/greensock\/TweenMax.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/ScrollMagic.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/animation.gsap.js":1,"sites\/all\/modules\/contrib\/picture\/picturefill2\/picturefill.min.js":1,"sites\/all\/modules\/contrib\/picture\/picture.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/common.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/it_cookie_compliance.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/product.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"public:\/\/minifyjs\/misc\/jquery-extend-3.4.0.min.js":1,"public:\/\/minifyjs\/misc\/jquery-html-prefilter-3.5.0-backport.min.js":1,"public:\/\/minifyjs\/misc\/jquery.once.min.js":1,"public:\/\/minifyjs\/misc\/drupal.min.js":1,"0":1,"public:\/\/minifyjs\/sites\/all\/modules\/contrib\/field_group\/field_group.min.js":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"sites\/all\/modules\/contrib\/picture\/picture_wysiwyg.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"modules\/locale\/locale.css":1,"sites\/all\/themes\/felceazzurra\/css\/PFDinTextCompPro.css":1,"sites\/all\/themes\/felceazzurra\/css\/common.css":1,"sites\/all\/themes\/felceazzurra\/css\/swipe.css":1,"sites\/all\/themes\/felceazzurra\/css\/product.css":1}},"field_group":{"fieldset":"full"}});
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_P_ASiUrbOfLo87c9cyt7JFQtJcGq34-aZG4lICDST38.js"></script>


@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>    <script>
        $( document ).ready(function(e) {
        //     // e.preventDefault();
        //     $('.next').on('click', function () {
        //         var product_slug='';
        //         var parent_category='';
        //         var category='',product_slug = $(this).attr('data-slug'),
        //          parent_category=$(this).attr('data-parent-category'),
        //          category=$(this).attr('data-category');
        //
        //
        //         $.ajax({
        //             url: parent_category+'/'+category+'/'+product_slug,
        //             type: 'get',
        //
        //             dataType: 'json',
        //             success: function (response) {
        //
        //                 alert('test');
        //             }
        //
        //         });
        //     });
        // });
    </script>
@endsection
