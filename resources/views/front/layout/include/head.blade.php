
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BQYC1H6M07"></script>



<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/font-electro.css')}}">

<link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/fancybox/jquery.fancybox.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/slick-carousel/slick/slick.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">

<!-- CSS Electro Template -->

{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.css">--}}

<link rel="stylesheet" href="{{asset('assets/vendor/ion-rangeslider/css/ion.rangeSlider.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />




<!-- CSS Implementing Plugins -->
@if(app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{asset('assets/css/theme.rtl.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Tajawal:wght@200;400;500&display=swap" rel="stylesheet">

    <style>
        body{
            direction: rtl;
            text-align: right;
            font-family: 'Tajawal', sans-serif;
            font-weight: bold;
        }
        .name_user {
            margin-right: 600px;
        }
        .register_login{
            margin-right: 550px;

        }

        .rating-css div {
            color: #ffe400;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }
        .rating-css input {
            display: none;
        }
        .rating-css input + label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }
        .rating-css input:checked + label ~ label {
            color: #b4afaf;
        }
        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

/*body{*/
/*    background-pr;*/
/*}*/
    </style>
@else

    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

@endif
@toastr_css

<!-- CSS Electro Template -->
