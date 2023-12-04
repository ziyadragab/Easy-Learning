@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Blog</h4>

                            <!-- resources/views/services/edit.blade.php -->


                            <form method="POST" action="{{ route('admin.service.update', $service) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Name (English) -->
                                <div class="mb-3">
                                    <label for="name_en" class="form-label">Name (English)</label>
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                        id="name_en" name="name_en" value="{{ old('name', $service->getTranslation('name','en')) }}">
                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name (Arabic) -->
                                <div class="mb-3">
                                    <label for="name_ar" class="form-label">Name (Arabic)</label>
                                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                        id="name_ar" name="name_ar" value="{{ old('name', $service->getTranslation('name','ar')) }}">
                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                 <!-- Description (English) -->
                                 <div class="mb-3">
                                    <label for="short_description_en" class="form-label">Short Description
                                        (English)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror"
                                        id="short_description_en"
                                        name="short_description_en">{{ old('short_description', $service->getTranslation('short_description','en')) }}</textarea>
                                    @error('short_description_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description (Arabic) -->
                                <div class="mb-3">
                                    <label for="short_description_ar" class="form-label">Description
                                        (Arabic)</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror"
                                        id="short_description_ar"
                                        name="short_description_ar">{{ old('description', $service->getTranslation('short_description','ar')) }}</textarea>
                                    @error('short_description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description (English) -->
                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description
                                        (English)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror"
                                        id="description_en"
                                        name="description_en">{{ old('description', $service->getTranslation('description','en')) }}</textarea>
                                    @error('description_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description (Arabic) -->
                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description
                                        (Arabic)</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror"
                                        id="description_ar"
                                        name="description_ar">{{ old('description', $service->getTranslation('description','ar')) }}</textarea>
                                    @error('description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                               <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    @if ($service->image)
                                        <img id="preview" src="{{ asset($service->image) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                                        <p>Current Image</p>
                                    @endif
                                </div>
                                <!-- Lists -->
                                <div class="mb-3">
                                    <label for="lists" class="form-label">Lists</label>
                                    <input type="text" class="form-control @error('lists') is-invalid @enderror"
                                        id="lists" name="lists" data-role="tagsinput"
                                        value="{{ old('lists',($service->lists)) }}">
                                    @error('lists')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
