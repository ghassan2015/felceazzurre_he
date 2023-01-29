@extends('front.layout._layout')

@section('title',$category->title)

@section('style')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/product_category.css')}}" media="all" />
@if(app()->getLocale()=='ar')
    <style>
        .linea{
            text-align:end !important;
        }
        /*.image-category{*/
        /*    !*margin-right:-65% !important;*!*/

        /*}*/
        /*.categoria{*/
        /*    !*margin-left: 80% !important;*!*/

        /*}*/

        .change{
            margin-top: -12%;
        }
       .image-category {
            margin-right:68%
        }
    </style>
    @else
<style>
    .change{
        margin-top: -12%;
        left: 32%;
    }
    .image-category {
        margin-right:75%
    }
.linea{
    text-align: end;
}
</style>
    @endif
<style>
    div.elenco ul li a .blocco_img img{
        opacity: 1;
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




    <div class="ele_bread">
        <div class="sc_categorie">
            <span><a  href="{{route('home')}}" title="Home"><span>@lang('lang.Home')</span></a></span>  <span class="separator">&gt;</span>  <span><a  href="" title="{{$category->parent->title}}"><span>{{$category->parent->title}}</span></a></span>  <span class="separator">&gt;</span>  <span><a class="active" href="" title="{{$category->title}}"><span>{{$category->title}}</span></a></span>		</div>
    </div>
@foreach($categories as $category)
    <div class="section"  id="first_block">
        <div class="fascia " style="z-index:10">
            <div class="pad_fascia">
                <div class="categoria" style="margin-top: 2%;">
                        <img  class="image-category" src="{{asset('assets/images/categories/'.$category->parent->icon_image_white)}}"  style=" height:70px;">

                    <div class="change" style="left: 60%">
                        <h1>{{$category->parent->title}}</h1>
                    </div>
                </div>
                <div class="linea" >
                    <h3>{{$category->title}}</h3>
                </div>
            </div>
        </div>

        <div class="elenco">
            <ul class="elenco">
                @foreach($category->product as $product)
                <li>

                    <a href="{{url('/'.app()->getLocale().'/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug)}}" title="Fresheners Original">
                        <div class="blocco_img"><img src="{{asset('assets/images/products/'.$product->product_image)}}" data-src="{{asset('assets/images/products/'.$product->product_image)}}" alt="{{$product->name}}" title="{{$product->name}}" class="lazyload"> </div>
                        <h2>{{$product->name}}</h2>
                    </a>
                </li>

                @endforeach



            </ul>
        </div>
    </div>
@endforeach



@endsection

