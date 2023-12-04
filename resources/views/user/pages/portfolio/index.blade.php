@extends('user.layouts.master')


@section('content')



@php
$setting=App\Models\Setting::first()
@endphp
<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Case Study</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            @foreach ($images as $image )
                
            <li><img src="{{ asset($image->image) }}" alt=""></li>
            @endforeach
  
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-area -->
<section class="portfolio__inner">
    <div class="container">
       
        <div class="portfolio__inner__active">
            @foreach ($portfolios as $portfolio )

            <div class="portfolio__inner__item grid-item cat-two cat-three">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="portfolio__inner__thumb">
                            <a href="{{ route('endUser.portfolioDetails',$portfolio) }}">
                                <img src="{{asset ($portfolio->image) }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="portfolio__inner__content">
                            <h2 class="title"><a href="{{ route('endUser.portfolioDetails',$portfolio) }}">{{
                                    __($portfolio->name) }}</a></h2>
                            <p>{{ __($portfolio->description) }}</p>
                            <a href="{{ route('endUser.portfolioDetails',$portfolio) }}" class="link">View Case
                                Study</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
      
    </div>
   
   
    
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <nav aria-label="Page navigation example">
            <ul style="display: inline-flex; list-style: none; padding: 0; margin: 0;">
                {{ $portfolios->links('pagination::simple-bootstrap-4') }}
            </ul>
        </nav>
    </div>
      
</section>
<!-- portfolio-area-end -->




<!-- contact-area -->


<!-- contact-area -->
<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        
                        <h2 class="mail"><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{ route('endUser.contact.store') }}" method="post">
                            <input type="text" name="naem" placeholder="Enter name*">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         
                      
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->
<!-- contact-area-end -->


<!-- main-area-end -->




@endsection