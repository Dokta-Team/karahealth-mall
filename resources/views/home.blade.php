@extends('layouts.app')

@section('content')
    <div class="slider" data-autoplay="true" data-autoplay-speed="4000">
        <a href="{{ route('search', ['category' => 'pharmacies']) }}">
            <img src="assets/img/hero/hero_1.jpg" alt="">
        </a>
        <a href="{{ route('search', ['category' => 'specialists']) }}">
            <img src="assets/img/hero/hero_2.jpg" alt="">
        </a>
        <a href="{{ route('search', ['category' => 'diagnostic-labs']) }}">
            <img src="assets/img/hero/hero_3.jpg" alt="">
        </a>
        <a href="{{ route('search', ['category' => 'organic-personal-care']) }}">
            <img src="assets/img/hero/hero_4.jpg" alt="">
        </a>
    </div>

    <div class="p-4 py-5">
        <div class="col-md-22">
            <div class="featured-carousel owl-carousel">
                @foreach ($data['categories'] as $key => $category)
                    <div class="item">
                        <div class="work">
                           <a href="{{ route('search', ['category' => $category->slug]) }}">
                              <div class="img d-flex align-items-center justify-content-center rounded" 
                                style="background-size: cover; background-image: url({{ $category->image != null ? asset('uploads/categories/' . $category->image) : 'https://placehold.co/150x150?text=' . urlencode($category->name) }});">
                            </div>
                           </a>
                            <div class="text pt-3 w-100 text-center">
                                <h3><a href="{{ route('search', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <div class="p-4 py-5">
      <div class="d-flex justify-content-center mb-4">
        <h2>Medical products for a Healthier Tomorrow.</h2>
        </div>
        <div class="container-fluid theme-container">
            <div class="row mb-4 justify-content-end">
                <div class="col-auto text-md-right">
                    <a href="{{ route('search', ['products' => 'true']) }}" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                </div>
            </div>

            <div class="slider  arrow-light slider-gap" data-slides-to-show="6" data-autoplay="true" data-nav="true"
                data-dots="false">
                @foreach ($featured as $key => $item)
                    <div class="product">
                        <a href="{{ route('product', ['slug' => $item->slug]) }}" class="product-img">
                            <img src="{{ asset('uploads/products/' . $item->thumbnail) }}" class="" alt="">
                        </a>
                        <div class="product-info">
                            {{-- <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                                <div class="review-count">4.5 (2,213)</div>
                            </div> --}}
                            <h3>
                                <a href="{{ route('product', ['slug' => $item->slug]) }}" class="truncated-text">
                                    {{ $item->name }}</a>
                            </h3>
                            <div class="product-value">
                                @if ($item->before_discount_price)
                                    <div class="d-flex">
                                        <small class="regular-price"><del>{{ $item->before_discount_price }}
                                                USD</del></small>
                                        <div class="off-price">
                                            {{ round((($item->before_discount_price - $item->price) / $item->before_discount_price) * 100, 2) }}%
                                            off</div>
                                    </div>
                                @endif
                                <div class="current-price">{{ $item->price }} USD</div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <div class="p-4 py-5">
      <div class="d-flex justify-content-center mb-4">
        <h2>Expert Care, Personalized for You – Trust Our Specialists.</h2>
        </div>
        <div class="row justify-content-center">
          {{-- <div class="doc-list">
            @foreach ($data['categories']['8']->sub_categories() as $key => $sub_category)
            <a href="{{ route('search', ['category' => $sub_category->category->slug , 'sub_category' => $sub_category->slug]) }}" class="doc-list-item home-city-bind col-md-1-2 mb-4">
              <div class="doc-img-wrapper do-img-wrapper">
                  <img data-src="{{ $sub_category->image }}" alt="{{ $sub_category->name }}" class="doc-list-img do-list-img"
                      loading="lazy" src="{{ $sub_category->image }}">
              </div>
              <h3 class="doc-name">
                  {{ $sub_category->name }}
              </h3>
          </a>
            @endforeach

        </div> --}}

        <div class="doc-list">
          @foreach ($data['categories']['8']->sub_categories() as $key => $sub_category)
              <a href="{{ route('search', ['category' => $sub_category->category->slug , 'sub_category' => $sub_category->slug]) }}" class="doc-list-item home-city-bind">
                  <div class="doc-img-wrapper do-img-wrapper">
                      <img alt="{{ $sub_category->name }}" class="doc-list-img do-list-img" src="{{ $sub_category->image }}">
                  </div>
                  <h3 class="doc-name">
                      {{ $sub_category->name }}
                  </h3>
              </a>
          @endforeach

      </div>
            {{-- <div class=" specialities-list row justify-content-center">
                @foreach ($data['categories']['8']->sub_categories() as $key => $sub_category)
                    <a href="{{ route('search', ['category' => $sub_category->category->slug , 'sub_category' => $sub_category->slug]) }}" class="doc-list-item home-city-bind col-md-1-2 mb-4">
                        <div class="doc-img-wrapper do-img-wrapper">
                            <img data-src="{{ $sub_category->image }}" alt="{{ $sub_category->name }}" class="doc-list-img do-list-img"
                                loading="lazy" src="{{ $sub_category->image }}">
                        </div>
                        <h3 class="doc-name">
                            {{ $sub_category->name }}
                        </h3>
                    </a>
                @endforeach

            </div> --}}


        </div>
    </div>

    <div class="p-4 py-5">
      <div class="d-flex justify-content-center mb-4">
        <h2>Specializing in surgical expertise for over 50 health issues.</h2>
        </div>
        <div class="row justify-content-center">

            <div class="doc-list">
                @foreach ($data['categories']['14']->sub_categories() as $key => $sub_category)
                    <a href="{{ route('search', ['category' => $sub_category->category->slug , 'sub_category' => $sub_category->slug]) }}" class="doc-list-item home-city-bind">
                        <div class="doc-img-wrapper">
                            <img alt="{{ $sub_category->name }}" class="doc-list-img" src="{{ $sub_category->image }}">
                        </div>
                        <h3 class="doc-name">
                            {{ $sub_category->name }}
                        </h3>
                    </a>
                @endforeach

            </div>

        </div>
    </div>

    <div class="p-4 py-5">
      <div class="d-flex justify-content-center mb-4">
            <h2>Your Care, Our Commitment – Healing Made Simple.</h2>
        </div>
        <div class="container-fluid theme-container">
            <div class="row mb-4 justify-content-end">
                <div class="col-auto text-md-right">
                    <a href="{{ route('search', ['category' => 'hospitals-and-clinics']) }}" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                </div>
            </div>
            <div class="slider  arrow-light slider-gap" data-slides-to-show="3" data-autoplay="true" data-nav="true"
                data-dots="false">

                @foreach ($hospitals as $item)
                <div class="provider-card">
                    <div class="provider-content">
                        <div class="provider-logo">
                            <a href="{{ route('profession', ['slug' =>  $item->slug]) }}"><img
                                    src="{{ asset('uploads/professions/'.$item->thumbnail) }}"
                                    alt="{{ $item->slug }}"></a>
                        </div>
                        <div class="provider-details">
                            <a href="{{ route('profession', ['slug' =>  $item->slug]) }}">
                                <h4>{{ $item->name }}</h4>
                                <address>
                                    {{ $item->location }}
                                </address>
                            </a>
                            <div class="provider-button-container">
                                <a href="{{ route('profession', ['slug' =>  $item->slug]) }}" class="provider-cta">View Procedures →</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                @endforeach
               
            </div>
        </div>
    </div>

    <div class="p-4 py-5">
        <div class="d-flex justify-content-center mb-4">
            <h2>Quality You Trust, Convenience You Deserve – Shopping Made Easy.</h2>
        </div>
        <div class="container-fluid theme-container">
            <div class="row mb-4 justify-content-end">
                <div class="col-auto text-md-right">
                    <a href="{{ route('search', ['products' => 'true']) }}" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                </div>
            </div>
            <div class="row">

                @foreach ($products as $item)
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="product">
                        <a href="{{ route('product', ['slug' => $item->slug]) }}" class="product-img">
                            <img src="{{ asset('uploads/products/' . $item->thumbnail) }}" class="" alt="">
                        </a>
                        <div class="product-info">
                            {{-- <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                                <div class="review-count">4.5 (2,213)</div>
                            </div> --}}
                            <h3>
                                <a href="{{ route('product', ['slug' => $item->slug]) }}" class="truncated-text">
                                    {{ $item->name }}</a>
                            </h3>
                            <div class="product-value">
                                @if ($item->before_discount_price)
                                    <div class="d-flex">
                                        <small class="regular-price"><del>{{ $item->before_discount_price }}
                                                USD</del></small>
                                        <div class="off-price">
                                            {{ round((($item->before_discount_price - $item->price) / $item->before_discount_price) * 100, 2) }}%
                                            off</div>
                                    </div>
                                @endif
                                <div class="current-price">{{ $item->price }} USD</div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </div>



    <div class="pt-5">

        <div class="offers-list bg-light py-5 offers-grid-2">
            <div class="container">
                <ul>
                    <li>
                        <div class="offer-image">
                            <img src="assets/img/offer/offer-1.png" alt="">
                        </div>
                        <div class="offer-info">
                            <h2 class="offer-title">
                                True Basics Flat 10% off
                            </h2>
                            <p class="offer-subtitle">
                                Clinically Researched Essentials
                            </p>
                            <a href="javascript:;" class="btn btn-primary btn-sm">Shop now</a>
                        </div>
                    </li>
                    <li>
                        <div class="offer-image">
                            <img src="assets/img/offer/offer-2.png" alt="">
                        </div>
                        <div class="offer-info">
                            <h2 class="offer-title">
                                True Basics Flat 10% off
                            </h2>
                            <p class="offer-subtitle">
                                Clinically Researched Essentials
                            </p>
                            <a href="javascript:;" class="btn btn-primary btn-sm">Shop now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="pt-5">
        <div class="d-flex justify-content-center mb-4">
            <h2>Top Brands, Trusted Quality – Excellence in Every Product.</h2>
        </div>
        <div class="container-fluid theme-container">
            <div class="row mb-4 justify-content-end">
                <div class="col-auto text-md-right">
                    <a href="javascript:;" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                </div>
            </div>
            <div class="slider arrow-light slider-gap" data-slides-to-show="5" data-autoplay="true" data-nav="true"
                data-dots="false">
                <div class="slide">
                    <a href="https://europe.medtronic.com/xd-en/index.html"><img src="https://www.medtronic.com/content/dam/medtronic-com/medtronic75.svg" width="250"
                        alt="Medtronic Logo" /></a>
                </div>
              
                <div class="slide">
                    <a href="https://www.jnj.com/"><img src="https://jnj-content-lab2.brightspotcdn.com/ac/25/bd2078f54d5992dd486ed26140ce/johnson-johnson-logo.svg" width="250"
                        alt="Johnson & Johnson logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.abbott.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Abbott_Laboratories_logo.svg" width="250"
                        alt="Abbott Header Logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.siemens-healthineers.com/"><img src="data:image/svg+xml,%3Csvg viewBox='0 0 576 144' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='m551.905 82.821a11.18 11.18 0 1 0 -3.278-7.909 11.146 11.146 0 0 0 3.278 7.909' fill='%23ec6602'/%3E%3Cpath d='m533.143 101.583a8.61 8.61 0 1 0 -2.519-6.083 8.572 8.572 0 0 0 2.519 6.083' fill='%23ec6602'/%3E%3Cpath d='m533.165 60.43a8.609 8.609 0 1 0 -2.519-6.083 8.574 8.574 0 0 0 2.519 6.083' fill='%23ec6602'/%3E%3Cpath d='m513.959 120.767a6.62 6.62 0 1 0 -1.938-4.68 6.6 6.6 0 0 0 1.938 4.68' fill='%23ec6602'/%3E%3Cpath d='m513.982 79.614a6.617 6.617 0 1 0 -1.939-4.68 6.6 6.6 0 0 0 1.939 4.68' fill='%23ec6602'/%3E%3Cpath d='m514.005 38.462a6.62 6.62 0 1 0 -1.938-4.68 6.6 6.6 0 0 0 1.938 4.68' fill='%23ec6602'/%3E%3Cpath d='m494.474 99.122a5.09 5.09 0 1 0 -1.491-3.6 5.071 5.071 0 0 0 1.491 3.6' fill='%23ec6602'/%3E%3Cpath d='m494.5 57.97a5.09 5.09 0 1 0 -1.491-3.6 5.074 5.074 0 0 0 1.491 3.6' fill='%23ec6602'/%3E%3Cpath d='m474.74 77.727a3.915 3.915 0 1 0 -1.148-2.77 3.9 3.9 0 0 0 1.148 2.77' fill='%23ec6602'/%3E%3Cpath d='m145.576 54.6v-9.664a49.342 49.342 0 0 0 14.6 2.6q8.763 0 8.763-4.629a3.8 3.8 0 0 0 -1.279-2.907q-1.314-1.248-6.694-3.455-9.651-3.971-12.589-6.771a12.484 12.484 0 0 1 -3.792-9.332q0-7.246 5.529-11.049 5.465-3.768 14.24-3.768a79.365 79.365 0 0 1 13.994 1.781v9.294a34.265 34.265 0 0 0 -12.648-2.717q-8.229 0-8.229 4.528a3.2 3.2 0 0 0 1.661 2.762q1.379.86 7.6 3.662 8.952 3.971 11.92 6.911a12.15 12.15 0 0 1 3.528 9.023 13.359 13.359 0 0 1 -6.921 12.131q-5.595 3.386-14.515 3.383a66.52 66.52 0 0 1 -15.168-1.78' fill='%23099'/%3E%3Cpath d='m189.889 55.388h13.662v-48.913h-13.662z' fill='%23099'/%3E%3Cpath d='m216.079 6.477v48.913h35.602v-9.346h-22.435v-11.607h19.038v-8.066h-19.038v-11.044h21.872v-8.85z' fill='%23099'/%3E%3Cpath d='m303.239 6.477-12.618 31.251-12.305-31.251h-17.715v48.913h9.625v-34.63l14.067 35.125h8.474l14.346-35.125v34.63h12.95v-48.913z' fill='%23099'/%3E%3Cpath d='m332.591 6.477v48.913h35.607v-9.346h-22.44v-11.607h19.042v-8.066h-19.042v-11.044h21.872v-8.85z' fill='%23099'/%3E%3Cpath d='m409.819 6.477v32.743l-16.795-32.743h-15.837v48.913h9.625v-33.182l17.247 33.182h15.385v-48.913z' fill='%23099'/%3E%3Cpath d='m429.143 54.6v-9.664a48.846 48.846 0 0 0 14.6 2.6q8.765 0 8.764-4.629a3.831 3.831 0 0 0 -1.247-2.907q-1.306-1.248-6.723-3.455-9.622-3.942-12.589-6.771a12.451 12.451 0 0 1 -3.8-9.365q0-7.219 5.53-11.016 5.457-3.768 14.244-3.768a67.97 67.97 0 0 1 12.785 1.575l1.208.207v9.293a34.351 34.351 0 0 0 -12.686-2.718q-8.193 0-8.19 4.528a3.2 3.2 0 0 0 1.65 2.762q1.314.823 7.638 3.662 8.886 3.971 11.886 6.911a12.135 12.135 0 0 1 3.528 9.023 13.38 13.38 0 0 1 -6.877 12.132q-5.631 3.386-14.548 3.383a66.5 66.5 0 0 1 -15.173-1.78' fill='%23099'/%3E%3Cg fill='%23ec6602'%3E%3Cpath d='m343.319 105.474c0 5.814-7.844 7.166-13.32 7.334.25-5.818 3.287-11.468 9.018-11.468a3.945 3.945 0 0 1 4.3 4.134m10.284-.086c0-8.008-5.481-12.31-13.994-12.31-13.826 0-20.992 11.3-20.992 23.691 0 12.647 5.732 21.583 20.063 21.583a26.592 26.592 0 0 0 15.429-4.721l-3.374-7.839a18.816 18.816 0 0 1 -10.534 3.624c-6.41 0-9.11-4.3-9.7-8.345 10.2-.423 23.1-2.955 23.1-15.683'/%3E%3Cpath d='m384.207 105.474c0 5.814-7.844 7.166-13.32 7.334.25-5.818 3.287-11.468 9.018-11.468a3.945 3.945 0 0 1 4.3 4.134m10.285-.086c0-8.008-5.482-12.31-14-12.31-13.826 0-20.991 11.3-20.991 23.691 0 12.647 5.731 21.583 20.062 21.583a26.592 26.592 0 0 0 15.439-4.721l-3.374-7.839a18.813 18.813 0 0 1 -10.534 3.624c-6.41 0-9.105-4.3-9.7-8.345 10.2-.423 23.1-2.955 23.1-15.683'/%3E%3Cpath d='m80.035 105.474c0 5.814-7.844 7.166-13.321 7.334.25-5.818 3.287-11.468 9.019-11.468a3.945 3.945 0 0 1 4.3 4.134m10.284-.086c0-8.008-5.481-12.31-13.994-12.31-13.826 0-20.992 11.3-20.992 23.691 0 12.647 5.732 21.583 20.063 21.583a26.584 26.584 0 0 0 15.428-4.721l-3.373-7.839a18.816 18.816 0 0 1 -10.535 3.624c-6.41 0-9.109-4.3-9.7-8.345 10.2-.423 23.1-2.955 23.1-15.683'/%3E%3Cpath d='m34.254 81.024v22.339h-17.199v-22.339h-12.055v56.064h12.055v-23.186h17.199v23.186h12.06v-56.064z'/%3E%3Cpath d='m123.281 123.43c0 3.118-2.526 6.323-6.91 6.323-6.242 0-7.676-5.987-7.676-12.815 0-8.263 2.363-15.174 9.278-15.174a13.992 13.992 0 0 1 5.308.924zm12.479 13.657-.843-8.513v-32.374a50.221 50.221 0 0 0 -15.517-3.122c-14.918 0-22.339 9.7-22.339 24.533 0 11.382 4.129 20.655 16.353 20.655 4.557 0 8.768-1.684 11.3-5.563l.424.087.587 4.3z'/%3E%3Cpath d='m145.539 81.107v43.249c0 7.084.674 13.994 12.815 13.994a22.35 22.35 0 0 0 10.708-2.695l-2.532-7.844a14.519 14.519 0 0 1 -5.139 1.353c-3.124 0-4.134-1.858-4.134-6.492v-41.565z'/%3E%3Cpath d='m218.631 137.087v-27.57a7.162 7.162 0 0 1 7.169-7.417c4.47 0 5.394 3.369 5.394 7.753v27.233h11.718v-29c0-10.034-4.8-15.01-13.657-15.01a14.365 14.365 0 0 0 -10.621 4.384v-16.437h-11.721v56.064z'/%3E%3Cpath d='m253.277 137.088h11.723v-42.744h-11.723z'/%3E%3Cpath d='m252.739 80.987a5.883 5.883 0 0 0 1.724 4.346 6.528 6.528 0 0 0 4.638 1.683 6.67 6.67 0 0 0 4.643-1.683 6.049 6.049 0 0 0 0-8.6 6.592 6.592 0 0 0 -4.643-1.775 6.463 6.463 0 0 0 -4.607 1.775 5.907 5.907 0 0 0 -1.755 4.255'/%3E%3Cpath d='m287.086 137.087v-27.4a7.289 7.289 0 0 1 7.334-7.585c4.471 0 5.227 3.455 5.227 8.09v26.9h11.718v-29.177c0-10.116-5.058-14.837-13.4-14.837a14.945 14.945 0 0 0 -12.731 6.322l-.847-5.058h-9.779l.76 7.926v34.817z'/%3E%3Cpath d='m415.315 110.53c.168-4.466 2.868-7.334 7.084-7.334a12.816 12.816 0 0 1 5.981 1.516l2.108-10.112a15.14 15.14 0 0 0 -7-1.515c-3.961 0-8.09 2.358-10.116 7.334l-1.1-6.074h-9.524l.843 7.421v35.323h11.718z'/%3E%3Cpath d='m462.8 96.793.033-.1a23.378 23.378 0 0 0 -13.96-3.633c-8.663.452-15.472 5.616-15 14.538s6.977 11.04 13.383 12.56c3.676.905 6.751 1.593 6.925 4.875.168 3.2-2.041 4.586-5.154 4.75-3.812.2-8.629-1.5-11.738-3.094l-3.493 8.036c2.459 1.646 8.8 4 16.27 3.605 9.755-.51 16.141-5.65 15.645-15.169-.462-8.758-7.469-10.674-13.71-12.291-3.85-.976-6.685-1.929-6.858-5.211-.144-2.782 2.069-4 4.851-4.144 2.878-.149 5.977 1.112 9.269 3.417z'/%3E%3Cpath d='m186.174 103.533h11.044v-9.192h-11.044v-13.32h-11.718v13.325h-6.5v9.192h6.5v20.818c0 7.084.674 13.994 12.815 13.994a22.35 22.35 0 0 0 10.708-2.695l-2.532-7.844a14.517 14.517 0 0 1 -5.144 1.353c-3.118 0-4.129-1.858-4.129-6.492z'/%3E%3C/g%3E%3C/svg%3E" width="250"
                        alt="Siemens Healthineers Logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://freseniusmedicalcare.com/en/"><img src="https://static.cdnlogo.com/logos/f/27/fresenius-medical-care.svg" width="250"
                        alt="Freseniusmedicalcare Logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.stryker.com/us/en/index.html"><img src="https://www.stryker.com/etc/designs/stryker/images/header/logo.png" width="250"
                        alt="Stryker" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.philips.com/global"><img src="https://upload.wikimedia.org/wikipedia/commons/5/52/Philips_logo_new.svg" width="250"
                        alt="Philips Logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.gehealthcare.com/"><img src="https://www.gehealthcare.com/cdn/res/images/logo.svg" width="250"
                        alt="GE HealthCare Logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.bd.com/en-us"><img src="https://www.bd.com/content/dam/bd-assets/bd-com/en-us/logos/bd/header-bd-logo.svg" width="250"
                        alt="bd logo" /></a>
                </div>

                <div class="slide">
                    <a href="https://www.baxter.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Baxter.svg" width="250"
                        alt="Baxter logo" /></a>
                </div>
                
                
                
            </div>
        </div>
    </div>
@endsection
