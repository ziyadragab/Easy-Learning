@extends('admin.layouts.master')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="card" style=" width: 100%; height: 500px; margin: 0;">
                        <div class="user-profile text-center mt-3">
                            <div class="">
                                <img src="{{ asset('Images/users/'.auth()->user()->photo) }}" alt="" class="avatar-md rounded-circle">
                            </div>
                            <div class="mt-3">
                                <h4 class="font-size-16 mb-1">{{ auth()->user()->first_name.' '. auth()->user()->last_name }}</h4>
                                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                            </div>
                            <p class="card-text">Email : {{ ' '.auth()->user()->email }}</p>
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Update Profile</a>

                            <p class="card-text">
                                <small class="text-muted">Updated At : {{' '. auth()->user()->updated_at->format('F j, Y, g:i a') }}</small>
                            </p>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
