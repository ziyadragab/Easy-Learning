@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Category</h4>

                            <form action="{{ route('admin.category.update', $category) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Name (English) -->
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">Name (English)</label>
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en', $category->getTranslation('name', 'en')) }}" required>
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name (Arabic) -->
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">Name (Arabic)</label>
                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar', $category->getTranslation('name', 'ar')) }}" required>
                                    @error('name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Submit Button -->
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
