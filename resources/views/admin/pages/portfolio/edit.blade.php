@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Slide</h4>

                            <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title (English) -->
                                <div class="mb-3">
                                    <label for="title_en" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $portfolio->getTranslation('title', 'en')) }}" required>
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Title (Arabic) -->
                                <div class="mb-3">
                                    <label for="title_ar" class="form-label">Title (Arabic)</label>
                                    <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar" value="{{ old('title_ar', $portfolio->getTranslation('title', 'ar')) }}" required>
                                    @error('title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name (English) -->
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">Name (English)</label>
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en', $portfolio->getTranslation('name', 'en')) }}" required>
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name (Arabic) -->
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">Name (Arabic)</label>
                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar', $portfolio->getTranslation('name', 'ar')) }}" required>
                                    @error('name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description (English) -->
                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description (English)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en" required>{{ old('description_en', $portfolio->getTranslation('description', 'en')) }}</textarea>
                                    @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description (Arabic) -->
                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description (Arabic)</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" name="description_ar" required>{{ old('description_ar', $portfolio->getTranslation('description', 'ar')) }}</textarea>
                                    @error('description_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Old Image -->
                                @if($portfolio->image)
                                    <div class="mb-3">
                                        <label for="old_image" class="form-label">Old Image</label>
                                        <img src="{{ asset($portfolio->image) }}" alt="Old Image" style="max-width: 100px; max-height: 100px;">
                                    </div>
                                @endif

                                <!-- New Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">New Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    @error('image')
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
