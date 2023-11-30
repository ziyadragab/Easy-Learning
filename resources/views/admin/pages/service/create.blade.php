@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Create Service</h1>


                            <form method="POST" action="{{ route('admin.service.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Name (English) -->
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">Name (English)</label>
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                        id="name_en" name="name_en" value="{{ old('name_en') }}">
                                    <span class="text-danger">{{ $errors->first('name_en') }}</span>
                                </div>

                                <!-- Name (Arabic) -->
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">Name (Arabic)</label>
                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                        id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                                    <span class="text-danger">{{ $errors->first('name_ar') }}</span>
                                </div>

                                <!-- Description (English) -->
                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description (English)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror"
                                        id="description_en" name="description_en">{{ old('description_en') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                </div>

                                <!-- Description (Arabic) -->
                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description (Arabic)</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror"
                                        id="description_ar" name="description_ar">{{ old('description_ar') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                                </div>

                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>

                                <!-- Lists -->
                                <div class="mb-3">
                                    <label for="lists" class="form-label">Service Lists</label>
                                    <input type="text" class="form-control @error('lists') is-invalid @enderror"
                                        id="lists" name="lists" data-role="tagsinput" value="{{ old('lists') }}">
                                    <span class="text-danger">{{ $errors->first('lists') }}</span>
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