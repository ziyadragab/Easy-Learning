@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit About</h4>
                            <form method="post" action="{{ route('admin.about.update', $about) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- English Fields --}}
                                <div class="mb-3">
                                    <label for="title_en" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $about->getTranslation('title', 'en')) }}">
                                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                </div>

                                    {{-- Arabic Fields --}}
                                <div class="mb-3">
                                    <label for="title_ar" class="form-label">Title (Arabic)</label>
                                    <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar" value="{{ old('title_ar', $about->getTranslation('title', 'ar')) }}">
                                    <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="short_title_en" class="form-label">Short Title (English)</label>
                                    <input type="text" class="form-control @error('short_title_en') is-invalid @enderror" id="short_title_en" name="short_title_en" value="{{ old('short_title_en', $about->getTranslation('short_title', 'en')) }}">
                                    <span class="text-danger">{{ $errors->first('short_title_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="short_title_ar" class="form-label">Short Title (Arabic)</label>
                                    <input type="text" class="form-control @error('short_title_ar') is-invalid @enderror" id="short_title_ar" name="short_title_ar" value="{{ old('short_title_ar', $about->getTranslation('short_title', 'ar')) }}">
                                    <span class="text-danger">{{ $errors->first('short_title_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description (English)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en">{{ old('description_en', $about->getTranslation('description', 'en')) }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description (Arabic)</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" name="description_ar">{{ old('description_ar', $about->getTranslation('description', 'ar')) }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="short_description_en" class="form-label">Short Description (English)</label>
                                    <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en" name="short_description_en">{{ old('short_description_en', $about->getTranslation('short_description', 'en')) }}</textarea>
                                    <span class="text-danger">{{ $errors->first('short_description_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="short_description_ar" class="form-label">Short Description (Arabic)</label>
                                    <textarea class="form-control @error('short_description_ar') is-invalid @enderror" id="short_description_ar" name="short_description_ar">{{ old('short_description_ar', $about->getTranslation('short_description', 'ar')) }}</textarea>
                                    <span class="text-danger">{{ $errors->first('short_description_ar') }}</span>
                                </div>

                                {{-- Image Field --}}
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>

                                    {{-- Display old image --}}
                                    @if($about->image)
                                        <div class="mt-2">
                                            <strong>Old Image:</strong>
                                            <img src="{{ asset($about->image) }}" alt="Old Image" style="max-width: 100px; max-height: 100px;">
                                        </div>
                                    @endif
                                </div>

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
