@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Image</h4>

                            <form action="{{ route('admin.image.update', $image) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    @if ($image->image)
                                        <img id="preview" src="{{ asset($image->image) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                                        <p>Current Image</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Image</button>
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
