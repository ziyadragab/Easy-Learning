@extends('user.layouts.master')


@section('content')
@foreach ($abouts as $about )

<section class="about about__style__two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__image">
                    <img src="{{ asset($about->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">

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
                            <p><span>{{ __($about->short_title) }}</span></p>
                        </div>
                    </div>
                    <p class="desc">{{ __($about->short_description) }}</p><a href="{{ route('endUser.showAbout') }}" class="btn">Download my resume</a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="about__info__wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                                type="button" role="tab" aria-controls="about" aria-selected="true">About</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <p class="desc">{{ __($about->description) }}</p>
                            <ul class="about__exp__list">
                                <li>
                                    <h5 class="title">{{ __($about->title) }}</h5>
                                    <p> {{ __($about->short_description) }} </p>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<!-- about-area-end -->




@endsection
