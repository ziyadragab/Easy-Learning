@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Create Setting</h1>
                            <form action="{{ route('admin.setting.store') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description In English</label>
                                    <textarea name="description_en"
                                        class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description In Arabic</label>
                                    <textarea name="description_ar"
                                        class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="url" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook') }}">
                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="x" class="form-label">X</label>
                                    <input type="url" name="x" class="form-control @error('x') is-invalid @enderror"
                                        value="{{ old('x') }}">
                                    <span class="text-danger">{{ $errors->first('x') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" name="linkedin"
                                        class="form-control @error('linkedin') is-invalid @enderror"
                                        value="{{ old('linkedin') }}">
                                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="url" name="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        value="{{ old('instagram') }}">
                                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection