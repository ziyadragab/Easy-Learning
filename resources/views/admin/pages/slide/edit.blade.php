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

                            <form action="{{ route('admin.slide.update', $slide) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Your form fields go here --}}
                                <div class="mb-3">
                                    <label for="title_en" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $slide->getTranslation('title','en')) }}">
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="title_ar" class="form-label">Title (Arabic)</label>
                                    <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar"value="{{ old('title_ar', $slide->getTranslation('title', 'ar')) }}"
                                    >
                                    @error('title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description (English)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description" name="description_en">{{ old('description_en',$slide->getTranslation('description','en')) }}</textarea>
                                    @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description (Arabic)</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror" id="description" name="description_ar">{{ old('description_ar',$slide->getTranslation('description','ar')) }}</textarea>
                                    @error('description_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="video" class="form-label">Video URL</label>
                                    <input type="url" class="form-control @error('video') is-invalid @enderror" id="video" name="video" value="{{ old('video', $slide->video) }}">
                                    @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>

                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    @if ($slide->image)
                                        <img id="preview" src="{{ asset($slide->image) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                                        <p>Current Image</p>
                                    @endif
                                </div>

                                {{-- Add other form fields as needed --}}



                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Slide</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

