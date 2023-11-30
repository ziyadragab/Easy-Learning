@extends('user.layouts.master')

@section('content')


<!-- contact-map -->
<div id="contact-map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
        allowfullscreen loading="lazy"></iframe>
</div>

<div class="contact-area">
    <div class="container">
        <form action="{{ route('endUser.contact.store') }}" method="POST" class="contact__form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Enter your name*">

                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="Enter your mail*">

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                        value="{{ old('subject') }}" placeholder="Enter your subject*">

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('budget') is-invalid @enderror" name="budget"
                        value="{{ old('budjet') }}" placeholder="Your Budget*">

                </div>
            </div>
            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"
                placeholder="Enter your message*">{{ old('message') }}</textarea>

            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
</div>





@endsection
