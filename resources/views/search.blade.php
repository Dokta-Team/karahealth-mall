@extends('layouts.app')

@section('content')
    <section class="p-4">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-12 order-md-2">

                    @if ($products->isNotEmpty())
                        <div class="row mb-1 align-items-center">

                            <div class="col-md-12 d-flex justify-content-start">
                                <h4 class="mt-2">Products</h4>

                            </div>
                        </div>
                        <div class="row">
                            @foreach ($products as $key => $item)
                                <div class="col-md-2 col-sm-6 col-12">
                                    <div class="product">
                                        <a href="{{ route('product', ['slug' => $item->slug]) }}" class="product-img">
                                            <img src="{{ asset('uploads/products/' . $item->thumbnail) }}" class=""
                                                alt="">
                                        </a>
                                        <div class="product-info">

                                            <h3>
                                                <a
                                                    href="{{ route('product', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                            </h3>
                                            <div class="product-value">
                                                <div class="d-flex">
                                                    <small class="regular-price">Price <del>USD
                                                            {{ $item->before_discount_price }}</del></small>
                                                    <div class="off-price">53% off</div>
                                                </div>
                                                <div class="current-price">USD {{ $item->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    @endif

                    @if ($professions->isNotEmpty())
                        @php
                            $groupedProfessions = $professions->groupBy('sub_category.category.name');
                        @endphp

                        @foreach ($groupedProfessions as $categoryName => $categoryProfessions)
                            <div class="row mb-1 align-items-center">
                                <div class="col-md-12 d-flex justify-content-start">
                                    <h4 class="mt-2">{{ $categoryName }}</h4>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($categoryProfessions as $profession)
                                    <div class="col-md-2 col-sm-6 col-12">
                                        <div class="product">
                                            <a href="{{ route('profession', ['slug' => $profession->slug]) }}"
                                                class="specialist-img">
                                                <img src="{{ asset('uploads/professions/' . $profession->thumbnail) }}"
                                                    class="" alt="">
                                            </a>
                                            <div class="product-info">
                                                <small class="text-primary">{{ $profession->sub_category->name }}</small>

                                                <h3>
                                                    <a href="{{ route('profession', ['slug' => $profession->slug]) }}">
                                                        {{ $profession->name }}
                                                    </a>
                                                </h3>
                                                <small> {{ $profession->title }}</small>

                                                <span class="d-block text-muted mb-2">{{ $profession->experience }} Years
                                                    of Experience
                                                </span>
                                                <div class="product-value">

                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('profession', ['slug' => $profession->slug]) }}"
                                                            class="btn btn-primary btn-sm product-heading-btn">Contact</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif

                </div>


                {{-- <div class="col-md-3 order-md-1">
                    <div class="sidebar-wrapper mt-5 mt-md-0">
                        <div class="sidebar-widget widget_categories">
                            <h6 class="widget-title">categories</h6>
                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar="" data-simplebar-auto-hide="false">
                                @foreach ($categories as $key => $value)
                                    <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="brand-12">
                                            <label class="form-check-label widget-filter-item-text"
                                                for="brand-12">{{ $value->name }}</label>
                                        </div><span class="fs-xs text-muted">425</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                  

                    <div class="sidebar-wrapper mt-5 mt-md-0">
                        <div class="sidebar-widget widget_categories">
                            <h6 class="widget-title mb-2">Price
                            </h6>
                            <div class="px-3">
                                <div class="range-slider range-slider-ui" id="nouislider" data-start-min="250"
                                    data-start-max="680" data-min="0" data-max="1000" data-step="1">
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}
            </div>
        </div>
    </section>
@endsection
