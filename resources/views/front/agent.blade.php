@extends('front.layout._layout')


@section('style')
    <title>@lang('lang.Agent network')</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="//felceazzurrait.cdn-immedia.net/sites/default/files/cdn/css/https/css_sSVY1LBWj4NHOyEhWjszYTzB7DFbrGs5VgrLtmNmIxs.css" media="all" />
    <!-- Google Tag Manager -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
        color: #FFFFFF;

    }
    a{
        text-decoration: none;
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


<!-- MENU -->


<div class="apri_social">
    <button type="button" class="social-overlay-close">Chiudi</button>
    <div class="apri_social_pad">
        <div class="animation">
            <ul>
                <li><div><a href="http://www.facebook.com/sharer/sharer.php?u=https://felceazzurra.it/it/profumalatuavita" class="sprite addthis_button_facebook" target="_blank" title="Facebook">Facebook</a></div></li>
                <li><div><a href="http://twitter.com/share?url=https://felceazzurra.it/it/profumalatuavita" class="sprite addthis_button_twitter" target="_blank" title="Twitter">Twitter</a></div></li>
                <li><div><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://felceazzurra.it/it/profumalatuavita&summary=" class="sprite addthis_button_linkedin" target="_blank" title="LinkedIn">LinkedIn</a></div></li>
            </ul>
        </div>
    </div>
</div>









<div class="ele_bread">
    <div class="sc_categorie">
        <span><a  href="{{route('home')}}" title="Home"><span>@lang('lang.Home')</span></a></span>  <span class="separator">&gt;</span>  <span><a class="active"  title=""><span>@lang('lang.Agent network')</span></a></span>		</div>
</div>


<div class="section txt_interno" id="first_block">
    <div class="pad_txt_interno">
        <h1>@lang('lang.Agent network')</h1>

        <table class="table" >
            <thead class="thead-dark">
            <tr style="color: white;">
                <th scope="col">الاسم</th>
                <th scope="col">العنوان</th>
                <th scope="col">رقم الهاتف او الجوال</th>
            </tr>
            </thead>
            <tbody>
            @foreach($agents as $agent)
            <tr >
                <td  style="color: white !important;">{{$agent->name}}</td>
                <td style="color: white !important;">{{$agent->location}}</td>
                <td style="color: white !important;">{{$agent->mobile}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>


</div>
</div>

<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_g8EWhFWWgJll--K6HBIi-I-TNOY3G6L6MNTjZJ-YXs4.js"></script>
<script type="text/javascript">
    document.createElement( "picture" );
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_aqcKJ4ANp6VR9qL1Mw70qP1I-CkRrd_NeavWb9w8Aq0.js"></script>
<script type="text/javascript">
    jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"it\/","setHasJsCookie":0,"ajaxPageState":{"theme":"felceazzurra","theme_token":"E9BHHJ--mAsbnkwKGB6MqDW5u-KiKkjsD3hJUuhF2Fg","js":{"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lazysizes.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/ls.unveilhooks.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/swiper.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/lib\/greensock\/TweenMax.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/ScrollMagic.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/plugins\/animation.gsap.js":1,"sites\/all\/modules\/contrib\/picture\/picturefill2\/picturefill.min.js":1,"sites\/all\/modules\/contrib\/picture\/picture.min.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/common.js":1,"https:\/\/felceazzurra.it\/sites\/all\/themes\/felceazzurra\/js\/it_cookie_compliance.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"public:\/\/minifyjs\/misc\/jquery-extend-3.4.0.min.js":1,"public:\/\/minifyjs\/misc\/jquery-html-prefilter-3.5.0-backport.min.js":1,"public:\/\/minifyjs\/misc\/jquery.once.min.js":1,"public:\/\/minifyjs\/misc\/drupal.min.js":1,"0":1,"public:\/\/languages\/it_If8MtE8V9vZbkHcyB6z1qgA8QLZ_d8Jmab7TAUxy10w.js":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"sites\/all\/modules\/contrib\/picture\/picture_wysiwyg.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"modules\/locale\/locale.css":1,"sites\/all\/themes\/felceazzurra\/css\/PFDinTextCompPro.css":1,"sites\/all\/themes\/felceazzurra\/css\/common.css":1,"sites\/all\/themes\/felceazzurra\/css\/swipe.css":1}}});
    //--><!]]>
</script>
<script type="text/javascript" src="//felceazzurrait.cdn-immedia.net/sites/default/files/js/js_XSPhGCYYyjpyiej6cpErBKhwOvkQKVCluI-u_I06fQk.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
