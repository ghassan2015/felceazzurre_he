@php($setting=\App\Models\Setting::first())

@extends('front.layout._layout')
@section('og:title',$setting->website_name)
@section('og:description',$setting->website_bio)

@section('style')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
    }

    .card-container .card {
        border: solid 1px #f2f2f2;
        margin: 5px;
    }

    .card-container .card .card-body {
        padding: 10px;
    }

    .card-container .card img.card-img {
        height: 300px;
        width: 300px;
        object-fit: cover;
    }
    a{
        text-decoration: none;
    }


</style>


@if(app()->getLocale()=='ar')
<style>

    div,h1, h2, h3, h4, h5, h6 {
        font-family: 'Tajawal', sans-serif;
    }
</style>
@endif
@endsection
@section('title',__('lang.Home'))
@section('content')
    <div class="section" id="first_block" style="dir: ltr" >
        <div class="view view-slider-home-view view-id-slider_home_view" >



            <div class="view-content" >

                <div class="slider-home" >
                    <div class="swiper-button-prev">
                        <svg width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
            <polyline fill="none" stroke="#2b354e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" points="45.63,75.8 0.375,38.087 45.63,0.375 " />
        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
            <polyline fill="none" stroke="#2b354e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" points="0.375,0.375 45.63,38.087 0.375,75.8 " />
        </svg>
                    </div>
                    <ul class="swiper-wrapper" style="margin-left: -3%;">
                        @foreach($sliders as $slider)
                            <li class="swiper-slide">
                                <div class="views-field views-field-nothing">
                            <span class="field-content"><a href="javascript:void(0);"  alt="Felce Azzurra Profuma la tua vita" title="Felce Azzurra Profuma la tua vita">
    <div class="inner-slide posizioneDestra">
        <div class="wrap-title colorBlu">
            <h2>
                {{$slider->title}}
                <span>{{$slider->sub_title}}</span>
            </h2>
        </div>
        <div class="wrap-image">
            <picture>
                <img src="{{asset('assets/images/sliders/'.$slider->image)}}" data-src="{{asset('assets/images/sliders/'.$slider->image)}}" alt="{{$slider->title}}" class="swiper-lazy">
            </picture>
        </div>
        <div class="wrapper-cta">
            <div class="pulsante No">
                <span></span>
            </div>
        </div>
    </div>
</a></span>
                                </div>
                            </li>
                        @endforeach
                    </ul>  </div>
            </div>






        </div></div>



    <div class="section" id="sec2">
        <div class="wrapper_title_home">
            <div class="inner_container">
                <h1>@lang('lang.Felce Azzurra')<br/>@lang('lang.find out our products')</h1>
            </div>
        </div>

        <ul id="home_prodotti">
            @foreach($parent_category as $category)
            <li>
                <a href="{{route('category.index',$category->slug)}}" title="{{$category->title}}">
                    <div class="home_prodotti_img">
                        <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/categories/'.$category->icon_image_blue)}}" alt="{{$category->title}}" title="{{$category->title}}" class="img1 lazyload" />
                        <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="{{asset('assets/images/categories/'.$category->image)}}" alt="{{$category->title}}" title="{{$category->title}}" class="img2 lazyload" />
                    </div>
                    <h2>{{$category->title}}</h2>
                </a>
            </li>
            @endforeach
                <li>
                    <a href="http://felceazzurrabio.it" target="_blank" title="Felce Azzurra Bio">
                        <div class="home_prodotti_img">
                            <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/home/04p.jpg" alt="Felce Azzurra Bio" title="Felce Azzurra Bio" class="img1 lazyload" />
                            <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/home/04.jpg" alt="Felce Azzurra Bio" title="Felce Azzurra Bio" class="img2 lazyload" />
                        </div>
                        <h2>@lang('lang.Felce Azzurra Bio')</h2>
                    </a>
                </li>
        </ul>
    </div>

    <div class="section section-video-spot" id="sec-video-spot">
        <div class="wrapper-bg">
            <video style="width:100%; height:100%; object-fit:cover" poster="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/home/orchidea-nera.jpg" playsinline autoplay preload muted loop>
                <source src="{{asset('assets/images/videos/'.$video->video)}}" type="video/mp4">
            </video>
        </div>

        {{--        <div id="guarda_video_50" class="open_video">--}}
        {{--            <div class="icon-text">--}}
        {{--                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/ico_play.svg" alt="Play video" title="Play video" class="icon lazyload" />--}}
        {{--                <span class="text">شاهد الاعلان</span>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

    <div class="section" id="sec3">
        <div class="swiper-container swiper-container-horizontal" id="gallery_piano_2">
            <div class="swiper-wrapper" >
                <div class="swiper-slide swiper-slide-active" style="width: 1733px;">
                    <a href="{{$content->url}}"  data-bg="{{asset('assets/images/contents/'.$content->image)}}" style='background-image: url("//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png");' title="{{$content->title}}" class="lazyload">
                        <div class="pad_cerchio">
                            <div class="cerchio">
                                <h3>@lang('lang.News')</h3>
                                <h2><span style="font-size:0.7em; line-height:75%; ">{{$content->title}}</span></h2>
                                <p>{{$content->title}}</p>
                                <div class="scopri">@lang('lang.learn more')</div>
                            </div>
                            <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/spacer.png" class="swiper-lazy" data-src="//felceazzurrait.cdn-immedia.net/sites/default/files/styles/cover_prodotto/public/upload/home-page/fascia_bio_0.png?itok=1Qnx9PUk" alt="Felce Azzurra Bio" title="Felce Azzurra Bio">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="sec4">
        <h2 class="titolo">
            @lang('lang.SOCIAL WALL')
            <span>#PROFUMALATUAVITA</span>
        </h2>
        <div class="frame_fb">
            <iframe data-src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FFelceAzzurraPaglieri%2F%3Ffref%3Dts&width=71&layout=button&action=like&show_faces=false&share=false&height=65&appId=489838951053815" width="71" height="65" style="border:none;overflow:hidden" data-cookieconsent="marketing" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>

        <ul  data-per="6" style="margin: 0 -16%;">

            @include('front.include.post.post')
        </ul>
    </div>


@endsection
