@extends('user.layouts.master')


@section('content')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">{{ __($portfolio->name) }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
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

        <!-- portfolio-details-area -->
        <section class="services__details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="services__details__thumb">
                            <img src={{ asset($portfolio->image) }} alt="">
                        </div>
                        <div class="services__details__content">
                            <h2 class="title">{{ __($portfolio->title) }}</h2>
                            <p>{{ __($portfolio->description) }}</p>
                           
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="services__sidebar">
                            <div class="widget">
                                <h5 class="title">Get in Touch</h5>
                                <form action="{{ route('endUser.contact.store') }}" method="POST" class="sidebar__contact">
                                    @csrf
                                    <input type="text" name="name" placeholder="Enter name*">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="email" name="email" placeholder="Enter your mail*">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <textarea name="message" id="message" placeholder="Massage*"></textarea>
                                    @error('message')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <button type="submit" class="btn">send massage</button>
                                </form>
                            </div>
                         
                            <div class="widget">
                                <h5 class="title">Contact Information</h5>
                                @php
                                    $setting=App\Models\Setting::first()
                                @endphp
                                <ul class="sidebar__contact__info">
                                    <li><span>Address :</span> {{ $setting->address }} <br> Mailbon Star</li>
                                    <li><span>Mail :</span> {{ $setting->email }}</li>
                                    <li><span>Phone :</span> {{ $setting->phone }}</li>
                                </ul>
                                <ul class="sidebar__contact__social">
                                    <li><a href="{{ $setting->x }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $setting->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="{{$setting->facebook}}"><i class="fab fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-details-area-end -->


   

    </main>
    <!-- main-area-end -->


@endsection
