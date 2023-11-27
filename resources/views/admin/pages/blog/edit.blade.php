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

                            <form action="{{ route('admin.blog.update', $blog) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <label for="title_en">Title (English)</label>
                                <input type="text" name="title_en" value="{{ old('title_en', $blog->getTranslation('title', 'en')) }}"
                                       class="form-control @error('title_en') is-invalid @enderror">
                                <span class="text-danger">{{ $errors->first('title_en') }}</span>

                                <label for="title_ar">Title (Arabic)</label>
                                <input type="text" name="title_ar" value="{{ old('title_ar', $blog->getTranslation('title', 'ar')) }}"
                                       class="form-control @error('title_ar') is-invalid @enderror">
                                <span class="text-danger">{{ $errors->first('title_ar') }}</span>

                                <label for="description_en">Description (English)</label>
                                <textarea name="description_en"
                                          class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en', $blog->getTranslation('description', 'en')) }}</textarea>
                                <span class="text-danger">{{ $errors->first('description_en') }}</span>

                                <label for="description_ar">Description (Arabic)</label>
                                <textarea name="description_ar"
                                          class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar', $blog->getTranslation('description', 'ar')) }}</textarea>
                                <span class="text-danger">{{ $errors->first('description_ar') }}</span>

                                <!-- Add other fields as needed -->

                                <label for="image">Image</label>
                                <input type="file" name="image"
                                       class="form-control @error('image') is-invalid @enderror">
                                @if($blog->image)
                                    <img src="{{ asset($blog->image) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                                @endif
                                <span class="text-danger">{{ $errors->first('image') }}</span>

                                <label for="tags">Tags</label>
                                <select name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                                    @foreach(['BUSINESS', 'DESIGN', 'LANDING PAGE', 'DATA', 'APPS', 'WEBSITE', 'BOOK', 'PRODUCT DESIGN'] as $tag)
                                        <option value="{{ $tag }}" {{ in_array($tag, old('tags', $blog->tags ?? [])) ? 'selected' : '' }}>
                                            {{ $tag }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('tags') }}</span>

                                <label for="category_id">Category</label>
                                <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ __($category->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
