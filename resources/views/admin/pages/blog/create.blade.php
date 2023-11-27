@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Create Blog</h1>
                            <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title_en" class="form-label">Title (English)</label>
                                    <input type="text" name="title_en" value="{{ old('title_en') }}"
                                        class="form-control @error('title_en') is-invalid @enderror">
                                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="title_ar" class="form-label">Title (Arabic)</label>
                                    <input type="text" name="title_ar" value="{{ old('title_ar') }}"
                                        class="form-control @error('title_ar') is-invalid @enderror">
                                    <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description (English)</label>
                                    <textarea name="description_en"
                                        class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="description_ar" class="form-label">Description (Arabic)</label>
                                    <textarea name="description_ar"
                                        class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <select name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                                        @foreach(['BUSINESS', 'DESIGN', 'LANDING PAGE', 'DATA', 'APPS', 'WEBSITE', 'BOOK', 'PRODUCT DESIGN'] as $tag)
                                        <option value="{{ $tag }}" {{ in_array($tag, old('tags', [])) ? 'selected' : '' }}>
                                            {{ $tag }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ __($category->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                </div>

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
