@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Setting</h4>

                            <form action="{{ route('admin.setting.update', $setting) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $setting->phone) }}">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $setting->email) }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address', $setting->address) }}">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_en">Description (English)</label>
                                    <textarea name="description_en"
                                        class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en', $setting->getTranslation('description', 'en')) }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description (Arabic)</label>
                                    <textarea name="description_ar"
                                        class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar', $setting->getTranslation('description','ar')) }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook', $setting->facebook) }}">
                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="x" class="form-label">X</label>
                                    <input type="text" name="x" class="form-control @error('x') is-invalid @enderror"
                                        value="{{ old('x', $setting->x) }}">
                                    <span class="text-danger">{{ $errors->first('x') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" name="linkedin"
                                        class="form-control @error('linkedin') is-invalid @enderror"
                                        value="{{ old('linkedin', $setting->linkedin) }}">
                                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" name="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        value="{{ old('instagram', $setting->instagram) }}">
                                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                </div>

                                <!-- Repeat similar blocks for other fields -->

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection