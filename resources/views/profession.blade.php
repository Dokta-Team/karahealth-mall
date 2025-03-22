@extends('layouts.app')

@section('content')


<section class="section-padding mt-4">
    <div class="container-fluid">
        <div class="row justify-content-between">
          
            <div class="col-lg-12">
                <div class="row">
                    <div class="row col-lg-9">
                        <div class="col-lg-3">
                            <!--=======  product details slider area  =======-->
                            <div class="product-details-slider-area">
                                <div class="big-image-wrapper">
                                    <div class="product-details-big-image-slider-wrapper slider-for" data-autoplay="false" data-nav="false">
                                        <div class="single-image">
                                            <img style="width: 100%;" src="{{ asset('uploads/professions/'.$profession->thumbnail) }}" alt="slider">
                                        </div> 
                                      
                                       
                                    </div>
                                
                                </div>
                            </div>
                            <!--======= End of product details slider area =======-->
                        </div>
                        <div class="col-lg-9">
                            <div class="single-product-content-description">
                                <p class="single-info">{{ $profession->sub_category->category->name }} <a href="{{ route('search', ['sub_category' => $profession->sub_category->name]) }}">{{ $profession->sub_category->name }}</a> </p>
                                <h4 class="product-title">{{ $profession->name }}</h4>
                            
                                <div class="single-info">
                                    <span class="d-block text-muted mb-2">{{ $profession->title }} </span>
                                    <span class="d-block text-muted mb-2">{{ $profession->short_description }} </span>
                                    <span class="d-block text-muted mb-2"><strong>{{ $profession->experience }} Years of Experience</strong> 
                                    </span>
    
                                </div>
    
                                <div class="mt-4">
                                    <h6 class="font-weight-bold text-dark">Share on</h6>
                                    <div class="social-links social-links-dark">
                                        <a href="#" onclick="shareOnSocial('facebook')">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#" onclick="shareOnSocial('twitter')">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#" onclick="shareOnSocial('whatsapp')">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                      
                                    </div>
                                    
                                    <script>
                                        function shareOnSocial(platform) {
                                            var url = encodeURIComponent(window.location.href);
                                            var shareUrl = '';
                                    
                                            switch (platform) {
                                                case 'facebook':
                                                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                                                    break;
                                                case 'twitter': // X (Twitter)
                                                    shareUrl = `https://twitter.com/intent/tweet?url=${url}`;
                                                    break;
                                                case 'whatsapp':
                                                    shareUrl = `https://api.whatsapp.com/send?text=${url}`;
                                                    break;
                                                
                                            }
                                    
                                            if (shareUrl) {
                                                window.open(shareUrl, '_blank');
                                            }
                                        }
                                    </script>
                                    
                                </div>
    
                             
                           
                                <div class="my-4">
                                    <a target="_blank" href="mailto:{{ $profession->email }}" class="btn btn-block btn-primary btn-pill transition-3d-hover">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="container">
                                <h3 class="entry-product-section-heading">About</h3>
                            {!! $profession->description !!}
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        
                        <div class="mt-4">
                            <img style="width: 100%" src="https://placehold.co/400x600?text=Ads%20Here" alt="">
                        </div>
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=======  product description review   =======-->
 
    
    <div class="single-row-slider-area pt-7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2>Related {{ $profession->sub_category->category->name }}</h2>
                </div>
            </div>
            <div class="row">
              
                @foreach($professions as $profession)
                <div class="col-md-2 col-sm-2 col-12">
                    <div class="product">
                        <a href="{{ route('profession', ['slug' => $profession->slug]) }}"
                            class="specialist-img">
                            <img src="{{ asset('uploads/professions/'.$profession->thumbnail) }}" class="" alt="">
                        </a>
                        <div class="product-info">
                            <small class="text-primary">{{ $profession->sub_category->name }}</small>
    
                            <h3>
                                <a
                                    href="{{ route('profession', ['slug' => 'dr-mahvish-aftab-khan-1537788']) }}">
                                    {{ $profession->name }}
                                </a>
                            </h3>
                            <small> {{ $profession->title }}</small>
                          
                            <span class="d-block text-muted mb-2">{{ $profession->experience }} Years of Experience
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
        </div>
    </div>
</section>

@endsection
