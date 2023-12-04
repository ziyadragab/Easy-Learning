@extends('user.layouts.master')

@section('content')

<!-- services-details-area -->
<section class="services__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__thumb">
                    <img src={{ asset($service->image) }} alt="">
                </div>
                <div class="services__details__content">
                    <h2 class="title">{{ __($service->name) }}</h2>
                    <p> {{ __($service->description) }}</p>
                    <ul class="services__details__list">
                        @foreach (explode(',',$service->lists) as $list )

                        <li>{{ $list }}</li>
                        @endforeach

                    </ul>
                    <p>{{ __($service->short_description) }}</p>


                </div>
            </div>
            <div class="col-lg-4">
                <aside class="services__sidebar">
                    <div class="widget">
                        <h5 class="title">Get in Touch</h5>
                        <form action="{{ route('endUser.contact.store') }}" method="POST" class="sidebar__contact">
                            @csrf
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Enter your name*">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter your mail*">
                            <textarea name="message" id="message"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="Message*">{{ old('message') }}</textarea>
                            <button type="submit" class="btn">send massage</button>
                        </form>
                    </div>
                    @php
                    $setting=App\Models\Setting::first();
                
                    @endphp
                    <div class="widget">
                        <h5 class="title">Contact Information</h5>

                        <ul class="sidebar__contact__info">
                            <li><span>Address :</span>{{ $setting->address??null }} </li>
                            <li><span>Mail :</span> {{ $setting->email??null }}</li>
                            <li><span>Phone :</span> {{ $setting->phone??null }}</li>
                        </ul>
                        <ul class="sidebar__contact__social">

                            <li><a href={{ $setting->x??null }}><i class="fab fa-twitter"></i></a></li>
                            <li><a href={{ $setting->linkedin??null }}><i class="fab fa-linkedin"></i></a></li>
                            <li><a href={{ $setting->instagram??null }}><i class="fab fa-instagram"></i></a></li>
                            <li><a href={{ $setting->facebook??null }}><i class="fab fa-facebook"></i></a></li>

                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- services-details-area-end -->

@endsection