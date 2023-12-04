@extends('user.layouts.master')

@section('content')
<!-- main-area -->
<main>

    <!-- banner-area -->
@php
    $slide=App\Models\HomeSlide::first();
@endphp

    <section class="banner">
        <div class="container custom-container">

            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="banner__img text-center text-xxl-end">
                        <img src="{{$slide->image}}" alt="">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="banner__content">
                        <h2 class="title wow fadeInUp" data-wow-delay=".2s"><span>{{ __($slide->title) }}</span></h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">{{__($slide->description)}}</p>
                        <a href="{{ route('endUser.showAbout') }}" class="btn banner__btn wow fadeInUp"
                            data-wow-delay=".6s">more about me</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="scroll__down">
            <a href="#aboutSection" class="scroll__link">Scroll down</a>
        </div>
        <div class="banner__video">
            <a href="{{$slide->video}}" class="popup-video"><i class="fas fa-play"></i></a>
        </div>
    </section>

    <!-- banner-area-end -->

    <!-- about-area -->
    <section id="aboutSection" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="about__icons__wrap">
                        @foreach ($images as $image )

                        <li>
                            <img class="light" src="{{ $image->image }}" alt="XD">
                            <img class="dark" src="{{ $image->image }}" alt="XD">
                        </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-6">
                    @foreach ($abouts as $about)

                    <div class="about__content">
                        <div class="section__title">
                            <span class="sub-title">01 - About me</span>
                            <h2 class="title">{{ __($about->title) }}</h2>
                        </div>
                        <div class="about__exp">
                            <div class="about__exp__icon">
                                <img src={{ asset("userAssets/img/icons/about_icon.png") }} alt="">
                            </div>
                            <div class="about__exp__content">
                                <p>{{ __($about->short_title) }}</p>
                            </div>
                        </div>
                        <p class="desc">{{ __($about->short_description) }}</p>
                        <a href="{{ route('endUser.showAbout') }}" class="btn">Download my resume</a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- services-area -->


    <section class="services">
        <div class="container">
            <div class="services__title__wrap">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="section__title">
                            <span class="sub-title">02 - my Services</span>
                            <h2 class="title">Creates amazing digital experiences</h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-4">
                        <div class="services__arrow"></div>
                    </div>
                </div>
            </div>
            <div class="row gx-0 services__active">
            @foreach ($services as $service )

                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="{{ route('endUser.serviceDetails',$service) }}"><img src="{{ $service->image }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">



                            </div>
                            <h3 class="title"><a href="{{ route('endUser.serviceDetails',$service) }}">{{ __($service->name) }}</a></h3>
                            <p>{{ __($service->short_description) }}</p>
                            <ul class="services__list">
                                @foreach (explode(',', $service->lists) as $list)
                                <li>{{ trim($list) }}</li>
                                @endforeach

                            </ul>
                            <a href="{{ route('endUser.serviceDetails',$service) }}" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- services-area-end -->


    <!-- portfolio-area -->
    <section class="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center">
                        <span class="sub-title">04 - Portfolio</span>
                        <h2 class="title">All creative work</h2>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-content" id="portfolioTabContent">
            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col">

                            <div class="portfolio__active">
        @foreach ($portfolios as $portfolio )

                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src={{ $portfolio->image??null }} alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ __($portfolio->name??null) }}</span>


                                        <a href="{{route('endUser.portfolioDetails',$portfolio)}}" class="link">{{ __($portfolio->title??null) }}</a>
                                    </div>
                                </div>
        @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- portfolio-area-end -->

    <!-- partner-area -->
    <section class="partner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="partner__logo__wrap">
                        @foreach ($images as $image )

                        <li>
                            <img class="light" src="{{$image->image}}" alt="">
                            <img class="dark" src="{{$image->image}}" alt="">
                        </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="partner__content">
                        <div class="section__title">
                            <span class="sub-title">05 - partners</span>
                            <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                        </div>
                        <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and mobile
                            apps in different industries and verticals. Eventually, I decided that it would be a fun
                            challenge to try designing and building my own.</p>
                        <a href="{{ route('endUser.contact.create') }}" class="btn">Start a conversation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- partner-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 order-0 order-lg-2">
                    <ul class="testimonial__avatar__img">
                      @foreach ($images as $image )

                        <li>
                            <img class="light" src="{{$image->image}}" alt="">
                            <img class="dark" src="{{$image->image}}" alt="">
                        </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial__wrap">
                        <div class="section__title">
                            <span class="sub-title">06 - Client Feedback</span>
                            <h2 class="title">Happy clients feedback</h2>
                        </div>
                        <div class="testimonial__active">
                            <div class="testimonial__item">
                                <div class="testimonial__icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial__content">
                                    <p>We are motivated by the satisfaction of our clients. Put your trust in us &share
                                        in our H.Spond Asset Management is made up of a team of expert, committed and
                                        experienced people with a passion for financial markets. Our goal is to achieve
                                        continuous.</p>
                                    <div class="testimonial__avatar">
                                        <span>Rasalina De Wiliamson</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial__item">
                                <div class="testimonial__icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial__content">
                                    <p>We are motivated by the satisfaction of our clients. Put your trust in us &share
                                        in our H.Spond Asset Management is made up of a team of expert, committed and
                                        experienced people with a passion for financial markets. Our goal is to achieve
                                        continuous.</p>
                                    <div class="testimonial__avatar">
                                        <span>Rasalina De Wiliamson</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__arrow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- blog-area -->
    <section class="blog">
        <div class="container">
            <div class="row gx-0 justify-content-center">
                @foreach ( $blogs as $blog )

                <div class="col-lg-4 col-md-6 col-sm-9">

                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('endUser.blogDetails',$blog) }}"><img src="assets/img/blog/blog_post_thumb01.jpg" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="">{{ __($blog->category->name) }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</span>
                            <h3 class="title"><a href="{{ route('endUser.blogDetails',$blog) }}">{{ __($blog->title) }}</a></h3>
                            <a href="{{ route('endUser.blogDetails',$blog) }}" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="blog__button text-center">
                <a href="blog.html" class="btn">more blog</a>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
@php
    $setting=App\Models\Setting::first();
@endphp
    <!-- contact-area -->
    <section class="homeContact">
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

</main>
<!-- main-area-end -->
@endsection
