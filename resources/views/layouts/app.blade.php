<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Kara - HealthMall') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Main Theme CSS styles -->
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" media="all">

    <!-- Font linked from external Google Fonts resource -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
        
        h2{
            font-weight: bolder;
        }

        .fadeInUp {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .feather {
            font-family: feather !important;
            speak: none;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }


        .dz-media {
            position: relative;
            overflow: hidden;
        }

        .dz-media img {
            max-width: 100%;
            height: auto;
            width: 100%;
        }

        .dz-team {
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
            position: relative;
        }

        .dz-team * {
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
        }

        .dz-team .dz-name a {
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
        }

        .dz-team .dz-content {
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
            position: relative;
        }

        .dz-team .dz-media img {
            width: 100%;
        }

        .dz-team .dz-position {
            display: block;
        }

        .dz-team.style-1 {
            border-radius: 5px;
        }

        .dz-team.style-1 .dz-media {
            border: 4px solid #00000014;
            border-radius: 5px;
            background-color: #ffffff;
            overflow: hidden;
            position: relative;
            padding: 15px;
            z-index: 2;
            display: flex;
           justify-content: center;
        }

        .dz-media img{
            width: 110px !important;
            height: 110px !important;
            object-fit: cover;
        }

        .dz-team.style-1 .dz-media .btn {
            position: absolute;
            bottom: -60px;
            left: 10px;
            right: 10px;
        }

        .dz-team.style-1 .dz-name {
            font-size: 18px;
            margin-bottom: 0;
        }

        .dz-team.style-1 .dz-position {
            font-size: 13px;
            font-weight: 500;
            color: #00BDE0;
        }

        .dz-team.style-1 .dz-content {
            background-color: #ECF5FB;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding: 35px 20px 15px 20px;
            margin-top: -20px;
            border-radius: 0 0 5px 5px;
            position: relative;
            z-index: 1;
        }

        .dz-team.style-1 .btn-square {
            height: 40px;
            width: 40px;
            min-width: 40px;
            border-radius: 10px;
            font-size: 20px;
        }

        .dz-team.style-1 .dz-social {
            display: flex;
            gap: 20px;
            justify-content: center;
            padding: 12px 15px;
            border-radius: 0 0 5px 5px;
            transform: translateY(-50px);
            background-color: #ECF5FB;
            position: relative;
            z-index: 0;
        }

        @media only screen and (max-width:767px) {
            .dz-team.style-1 .dz-media .btn {
                font-size: 14px;
            }

            .dz-team.style-1 .dz-content {
                padding: 30px 15px 15px 15px;
            }
        }

        .dz-team.style-1.active,
        .dz-team.style-1:hover {
            background-color: #ECF5FB;
        }

        /* .dz-team.style-1.active .dz-media,
        .dz-team.style-1:hover .dz-media {
            background-color: #031B4E;
        } */

        .dz-team.style-1.active .dz-media .btn,
        .dz-team.style-1:hover .dz-media .btn {
            bottom: 10px;
        }

        /* .dz-team.style-1.active .dz-content,
        .dz-team.style-1:hover .dz-content {
            background-color: #031B4E;
        } */

        .dz-team.style-1.active .dz-name a,
        .dz-team.style-1:hover .dz-name a {
            color: #000000;
        }

        .dz-team.style-1.active .btn-square,
        .dz-team.style-1:hover .btn-square {
            background-color: #fff;
            color: #031B4E;
            border-color: #fff;
        }

        .dz-team.style-1.active .btn-square i,
        .dz-team.style-1:hover .btn-square i {
            -webkit-animation: toRightFromLeft .3s forwards;
            -moz-animation: toRightFromLeft .3s forwards;
            animation: toRightFromLeft .3s forwards;
        }

        .dz-team.style-1.active .dz-social,
        .dz-team.style-1:hover .dz-social {
            transform: translateY(0);
        }

        .dz-team.style-1.active .dz-social a,
        .dz-team.style-1:hover .dz-social a {
            color: #031B4E;
        }

        .btn-primary {
            --bs-btn-bg: #00BDE0;
            --bs-btn-border-color: #00BDE0;
            --bs-btn-active-bg: #00BDE0;
            --bs-btn-hover-bg: #00a1be;
            --bs-btn-hover-border-color: #00a1be;
        }

        .btn-secondary {
            --bs-btn-bg: #031B4E;
            --bs-btn-border-color: #031B4E;
            --bs-btn-active-bg: #031B4E;
            --bs-btn-hover-bg: #031742;
            --bs-btn-hover-border-color: #031742;
        }

        .btn {
            overflow: hidden;
        }

        .btn.btn-primary {
            color: #fff;
        }

        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover {
            color: #fff !important;
        }

        .btn-square {
            height: 48px;
            width: 48px;
            min-width: 48px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            -webkit-transition: all .5s;
            -ms-transition: all .5s;
            transition: all .5s;
        }

        @media only screen and (max-width:767px) {
            .btn-square {
                height: 42px;
                width: 42px;
                min-width: 42px;
            }
        }

        .btn-square:hover {
            color: #fff;
        }

        .btn-square:hover i {
            -webkit-animation: toTopRight .5s forwards;
            -moz-animation: toTopRight .5s forwards;
            animation: toTopRight .5s forwards;
        }

        /*! CSS Used keyframes */
        @-webkit-keyframes fadeInUp {
            0% {
                opacity: 0;
                -webkit-transform: translateY(20px);
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                -webkit-transform: translateY(20px);
                -ms-transform: translateY(20px);
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @-webkit-keyframes toRightFromLeft {
            49% {
                -webkit-transform: translateX(100%);
            }

            50% {
                opacity: 0;
                -webkit-transform: translateX(-100%);
            }

            51% {
                opacity: 1;
            }
        }

        @-moz-keyframes toRightFromLeft {
            49% {
                -moz-transform: translateX(100%);
            }

            50% {
                opacity: 0;
                -moz-transform: translateX(-100%);
            }

            51% {
                opacity: 1;
            }
        }

        @-webkit-keyframes toTopRight {
            49% {
                -webkit-transform: translate(30px, -30px);
            }

            50% {
                opacity: 0;
                -webkit-transform: translate(-30px, 30px);
            }

            51% {
                opacity: 1;
            }
        }

        @-moz-keyframes toTopRight {
            49% {
                -moz-transform: translate(30px, -30px);
            }

            50% {
                opacity: 0;
                -moz-transform: translate(-30px, 30px);
            }

            51% {
                opacity: 1;
            }
        }

        /*! CSS Used fontfaces */
        @font-face {
            font-family: feather;
            src: url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/feather/fonts/feather.eot?t=1525787366991);
            src: url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/feather/fonts/feather.eot?t=1525787366991#iefix) format('embedded-opentype'), url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/feather/fonts/feather.woff?t=1525787366991) format('woff'), url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/feather/fonts/feather.ttf?t=1525787366991) format('truetype'), url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/feather/fonts/feather.svg?t=1525787366991#feather) format('svg');
        }

        @font-face {
            font-family: "Font Awesome 6 Brands";
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/fontawesome/webfonts/fa-brands-400.woff2) format("woff2"), url(https://clinicmaster.dexignzone.com/xhtml/assets/icons/fontawesome/webfonts/fa-brands-400.ttf) format("truetype");
        }

        .dz-team ul {
            list-style-type: none;
        }

        .truncated-text {
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .owl-carousel {
            position: relative;
        }

        .owl-carousel .owl-item {
            opacity: 1;
        }

        .owl-carousel .owl-item.active {
            opacity: 1;
        }

        .owl-carousel .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
        }

        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next {
            position: absolute;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            margin-top: -60px;
            color: rgba(0, 0, 0, 0.1) !important;
            -webkit-transition: 0.7s;
            -o-transition: 0.7s;
            transition: 0.7s;
            opacity: 0;
        }

        @media (prefers-reduced-motion: reduce) {

            .owl-carousel .owl-nav .owl-prev,
            .owl-carousel .owl-nav .owl-next {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .owl-carousel .owl-nav .owl-prev span:before,
        .owl-carousel .owl-nav .owl-next span:before {
            font-size: 30px;
        }

        .owl-carousel .owl-nav .owl-prev {
            left: 0;
        }

        .owl-carousel .owl-nav .owl-next {
            right: 0;
        }

        .owl-carousel .owl-dots {
            text-align: center;
            margin-top: 20px;
        }

        .owl-carousel .owl-dots .owl-dot {
            width: 10px;
            height: 10px;
            margin: 5px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .owl-carousel .owl-dots .owl-dot:hover,
        .owl-carousel .owl-dots .owl-dot:focus {
            outline: none !important;
        }

        .owl-carousel .owl-dots .owl-dot.active {
            background: #1089ff;
        }

        .owl-carousel:hover .owl-nav .owl-prev,
        .owl-carousel:hover .owl-nav .owl-next {
            opacity: 1;
        }

        .owl-carousel:hover .owl-nav .owl-prev {
            left: -25px;
        }

        .owl-carousel:hover .owl-nav .owl-next {
            right: -25px;
        }

        .owl-carousel.owl-drag .owl-item {
            -ms-touch-action: pan-y;
            touch-action: pan-y;
        }

        .work {
            width: 100%;
        }

        .work .img {
            width: 120px;
            height: 120px;
            position: relative;
            border-radius: 100px !important;
            -webkit-box-shadow: 0px 20px 35px -30px rgba(0, 0, 0, 0.26);
            -moz-box-shadow: 0px 20px 35px -30px rgba(0, 0, 0, 0.26);
            box-shadow: 0px 20px 35px -30px rgba(0, 0, 0, 0.26);
        }

        .work .img .icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #fff;
            display: block;
            opacity: 0;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }

        @media (prefers-reduced-motion: reduce) {
            .work .img .icon {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .work .text h3 {
            font-size: 18px;
            font-weight: 500;
        }

        .work .text h3 a {
            color: #000;
        }

        .work .text span {
            font-size: 12px;
            letter-spacing: 1px;
            color: rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
            font-weight: 500;
        }

        .work:hover .img .icon {
            opacity: 1;
        }

        @media (max-width: 1023px) {
    .work .img {
        width: 100px;
        height: 100px;
    }
}

/* Mobile View (below 768px) */
@media (max-width: 767px) {
    .work .img {
        width: 75px;
        height: 75px;
    }
}
        /*! CSS Used from: Embedded */
@media (min-width: 768px){
.vertical-container-desktop a:hover{filter:brightness(105%);text-decoration:none;}
}
.hdcare-category-section{background-image:radial-gradient(       circle farthest-corner at 16.5% 28.1%,       rgba(15, 27, 49, 1) 0%,       rgb(0 70 135) 90%     );padding:2rem 1rem;margin:2rem auto 4rem;border-radius:0;}
.hdcare-category-section h2{color:#fff;text-align:center;margin:2rem auto 2rem;font-size:2rem;font-weight:bolder;}
.hdcare-header-chiclets{display:flex;max-width:1000px;margin:0 auto 2rem;justify-content:center;}
.hdcare-header-chiclets span{flex:0 0 200px;padding:0 2rem;text-align:center;color:#fff;align-items:center;display:flex;justify-content:center;border-right:1px solid #ffffff85;}
.hdcare-header-chiclets span:last-child{border-right:none;}
.popular-cat-buttons{display:flex;justify-content:space-evenly;align-items:center;text-align:center;flex-wrap:wrap;gap:1rem;margin:0 auto;max-width:1000px;}
.popular-cat-buttons a{flex:0 0 calc(100% / 7 - 1rem);padding:1rem 0;}
.popular-cat-buttons a:hover{background-color:#132d57;border-radius:1rem;}
.popular-cat-buttons a img{width:100px;height:100px;}
.popular-cat-buttons a p{color:#fff;}
.hdcare-cta-block{display:flex;gap:1rem;align-items:center;justify-content:center;margin:2rem auto;}
.hdcare-cta-block a{border-radius:calc(1rem / 2);background:white;padding:0.8rem 1rem;font-weight:bold;border:1px solid #fff;}
.hdcare-cta-block a:first-child{background:#06c755;background-image:linear-gradient(120deg, #06c755 0%, #11e66a 100%);border:1px solid #ffffff66;color:#fff;display:flex;align-items:center;gap:0.5rem;}
.hdcare-cta-block a:first-child img{height:20px;width:auto;}
@media (max-width: 768px){
.hdcare-header-chiclets span{flex:0 0 33%;padding:0 0.5rem;}
.popular-cat-buttons{gap:0;}
.popular-cat-buttons a{flex:0 0 calc(100% / 3 - 1rem);}
.popular-cat-buttons a:last-child{display:none;}
.popular-cat-buttons img{width:80px;height:80px;}
.hdcare-cta-block{flex-direction:column;align-items:stretch;text-align:center;}
.hdcare-cta-block a{text-align:center;justify-content:center;}
}


.glide *{box-sizing:inherit;}
.glide__slide a{user-select:none;-webkit-user-drag:none;-moz-user-select:none;-ms-user-select:none;}

.focus-container a{text-decoration:none;transition:all ease-in 50ms;}
.focus-container a:hover{filter:brightness(120%);text-decoration:none;}
.provider-card{border-radius:1rem;overflow:hidden;display:flex;flex-direction:column;}
.provider-cover-image{width:100%;height:180px;flex:0 0 180px;overflow:hidden;}
.provider-cover-image img{object-fit:cover;transform:scale(1.1);width:100%;height:auto;}
.provider-content{display:flex;background-color:#004dff1a;padding:1rem;gap:1rem;flex:0 1 100%;}
.provider-content .provider-logo{flex:0 0 100px;}
.provider-details a{display:flex;flex-direction:column;row-gap:0.66rem;}
.provider-content .provider-details{flex:0 1 100%;display:flex;flex-direction:column;font-size:1.2rem;justify-content:space-between;}
.provider-content .provider-details h3{margin:0;line-height:1.3;}
.provider-content .provider-details address{font-style:normal;line-height:1.3;font-size:1rem;}
a.provider-cta{font-size:1rem;padding:0.5rem;display:block;border-radius:calc(1rem / 2);}
a.provider-cta:hover{color:#132d57;background-}
.provider-button-container{display:flex;justify-content:end;}
@media (min-width: 1024px){
.provider-content .provider-logo img{border-radius:calc(1rem / 2);width:100px;height:100px;}
}
@media (max-width: 1023px){
.provider-cover-image{display:none;}
.provider-content .provider-logo img{border-radius:calc(1rem / 2) calc(1rem / 2) 0 0;width:100%;}
.provider-content{flex-direction:column;flex:0 0 100%;padding:0;}
.provider-button-container{display:none;}
.provider-content .provider-details{display:grid;gap:0.48rem;padding:1rem;min-height:160px;}
.provider-content .provider-details h3{font-size:1rem;}
.provider-content .provider-details a.provider-cta{align-self:end;}
}
h3{margin:0px;}
::placeholder{font-size:16px;color:#00205d;opacity:0.5;}

/*! CSS Used from: Embedded */
.doc-list{display:grid;grid-template-columns:repeat(auto-fit, minmax(107px, 1fr));column-gap:5px;row-gap:39px;}
.doc-list-item{display:flex;flex-direction:column;align-items:center;row-gap:12px;}
.doc-img-wrapper{display:flex;align-items:center;justify-content:center;width:60px;height:60px;background:#F4F4F4;border-radius:50%;overflow:hidden;padding:10px;}
.do-img-wrapper{padding:0px;}
.doc-list-img{width:30px;height:30px;}
.doc-list-img.do-list-img{height:100%;width:100%;object-fit:cover;}
.doc-name{font-size:14px;color:#232426;text-align:center;margin:0px;font-weight:400;}
.doc-list-wrapper > div.doc-list > a:nth-child(7){display:none;}
.doc-list-wrapper > div.doc-list.specialities-list > a:nth-child(7){display:flex;}
@media only screen and (min-width: 992px){
.doc-list{column-gap:48px;row-gap:47px;}
.doc-list-item{row-gap:20px;}
.doc-img-wrapper{width:100px;height:100px;}
.doc-list-img{width:40px;height:40px;}
.doc-name{font-size:16px;}
.doc-list-wrapper > div.doc-list > a:nth-child(7){display:flex;}
}
@media (min-width: 768px) {
            .col-md-1-2{
                -webkit-box-flex: 0;
                -ms-flex: 0 0 16.66667%;
                flex: 0 0 16.66667%;
                max-width: 10%;
            }
        }


        .product .specialist-img {
    height: 200px;
    width: 100%;
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #edf1fc;
    /* padding: 7px; */
    border-radius: 5px;
    display: block;
}

.product .specialist-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* max-height: 80%; */
    /* max-width: 80%; */
    /* width: auto; */
    /* height: auto; */
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    -webkit-transition: all 0.85s cubic-bezier(0.23, 1, 0.32, 1);
    -o-transition: all 0.85s cubic-bezier(0.23, 1, 0.32, 1);
    transition: all 0.85s cubic-bezier(0.23, 1, 0.32, 1);
}

.slick-track{
    display: flex;
    align-items: center;
}
       
    </style>

    @livewireStyles

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}


</head>

<body>
    <div id="app">
        @include('layouts/header')
        @yield('content')

    </div>
    <footer class="site-footer footer-padding-lg bg-light mt-8">
        <div class="container-fluid theme-container">
            <div class="upper-footer">
                <div class="row justify-content-around">
                    <div class="col-lg-5 col-md-3 col-12">
                        <div class="widget">
                            <div class="footer-brand"><img src="assets/img/logo.png" alt=""></div>
                            <p>Africa’s largest and most comprehensive healthcare marketplace, providing seamless access to a vast range of medical products and services—all in one convenient location. We are dedicated to bridging the gap between consumers and trusted healthcare providers, ensuring quality, affordability, and reliability.
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>Help</h3>
                            </div>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('faqs') }}">FAQs</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>Policy</h3>
                            </div>
                            <ul>
                                <li>
                                    <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms-and-conditions') }}">Terms and Conditions</a>
                                </li>
                                <li>
                                    <a href="{{ route('support-policy') }}">Support Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('return-and-refund-rolicy') }}">Return and Refund Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('partnership-policy') }}">Partnership Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('intellectual-property-policy') }}">Intellectual Property Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>Social</h3>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">Facebook</a>
                                </li>
                                <li>
                                    <a href="#">Google</a>
                                </li>
                                <li>
                                    <a href="#">Pinterest</a>
                                </li>
                                <li>
                                    <a href="#">Linkedin</a>
                                </li>
                                <li>
                                    <a href="#">Dribble</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <hr>
                <style>
                    .widgets-container {
                        column-count: 7;
                        /* Creates 6 columns */
                        column-gap: 20px;
                        /* Adds space between the columns */
                    }

                    /* Widget styling */
                    .widget {
                        break-inside: avoid;
                        /* Prevents widgets from breaking across columns */
                        margin-bottom: 20px;
                    }

                    /* Title and subcategories styling */
                    .widget-title h3 {
                        margin-bottom: 10px;
                        font-size: 16px;
                    }

                    .widget-title h3 a {
                        font-weight: 700
                    }

                    .sub-categories-list {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }

                    .sub-categories-list li {
                        margin-bottom: 5px;
                        font-size: 14px;
                    }

                    .sub-categories-list li a {
                        text-decoration: none;
                        color: #333;
                    }

                    .sub-categories-list li a:hover {
                        text-decoration: underline;
                        color: #007bff;
                    }

                    /* Responsive adjustments */
                    @media (max-width: 1200px) {
                        .widgets-container {
                            column-count: 4;
                            /* Reduces to 4 columns on medium screens */
                        }
                    }

                    @media (max-width: 768px) {
                        .widgets-container {
                            column-count: 3;
                            /* Reduces to 2 columns on smaller screens */
                        }
                    }

                    @media (max-width: 576px) {
                        .widgets-container {
                            column-count: 2;
                            /* Single column on very small screens */
                        }
                    }
                </style> --}}
                {{-- <div class=" d-flex justify-content-center mt-4">
                    <div class="widgets-container">
                        @foreach ($data['categories'] as $key => $category)
                            <div class="widget">
                                <div class="widget-title">
                                    <h3><a
                                            href="{{ route('search', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </h3>
                                </div>
                                @if ($category->sub_categories()->count() > 0)
                                    <ul class="sub-categories-list">
                                        @foreach ($category->sub_categories() as $key => $sub_category)
                                            <li>
                                                <a
                                                    href="{{ route('search', ['category' => $category->slug , 'sub-category' => $sub_category->slug]) }}">{{ $sub_category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div> --}}

                {{-- <div class="row mt-4">
                    <div class="col-lg-2 col-md-3 col-12">

                    @foreach ($data['categories'] as $key => $value)
                        <div class="widget">
                            <div class="widget-title">
                                <h3>{{ $value->name }}</h3>
                            </div>
                            @if ($value->sub_categories()->count() > 0)
                            <ul class="sub-categories-list">
                                @foreach ($value->sub_categories() as $key => $value)
                                <li>
                                    <a href="{{ route('search', ['category' => $value->name]) }}">{{ $value->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    @endforeach
                </div>

                </div>
                 --}}
            </div>
            <div class="lower-footer">
                <div class="row">
                    <div class="col-md-6 text-lg-left">
                        <p class="mb-4 mb-md-0 text-muted">Copyright © 2021 kara | All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-card text-lg-right">
                            <img class="img-fluid mx-2" src="assets/img/payment-methods.png" alt="Icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- Required vendor scripts (Do not remove) -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!-- Modify theme scripts (Do not remove) -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>


    @livewireScripts


    <script>
        (function($) {


            var fullHeight = function() {

                $('.js-fullheight').css('height', $(window).height());
                $(window).resize(function() {
                    $('.js-fullheight').css('height', $(window).height());
                });

            };
            fullHeight();

            var carousel = function() {
                $('.featured-carousel').owlCarousel({
                    loop: true,
                    autoplay: true,
                    margin: 30,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    nav: true,
                    dots: true,
                    autoplayHoverPause: false,
                    items: 1,
                    navText: ["<span class='ion-ios-arrow-back'></span>",
                        "<span class='ion-ios-arrow-forward'></span>"
                    ],
                    responsive: {
                        0: {
                            items: 4
                        },
                        600: {
                            items: 6
                        },
                        1000: {
                            items: 10
                        }
                    }
                });

            };
            carousel();

        })(jQuery);
    </script>

</body>

</html>
