@extends('user.layouts.master')


@section('content')


<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ __($blog->title) }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            @foreach ($images as $image )

            <li><img src="{{ asset($image->image) }}" alt=""></li>
            @endforeach

        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->


<!-- blog-details-area -->
<section class="standard__blog blog__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="standard__blog__post">
                    <div class="standard__blog__thumb">
                        <img src="{{ asset($blog->image) }}" alt="">
                    </div>
                    <div class="blog__details__content services__details__content">
                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i> {{
                                \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</li>
                        </ul>
                        <h2 class="title">{{ __($blog->title) }}</h2>
                        <p>{{ __($blog->description) }}</p>
                    </div>
                    <div class="blog__details__bottom">
                        <ul class="blog__details__tag">
                            <li class="title">Tag:</li>
                            <li class="tags-list">
                                @foreach ($blog->tags as $tag )

                                <a href="#">{{ $tag }}</a>
                                @endforeach

                            </li>
                        </ul>

                    </div>


                    <div class="comment__form">
                        <div class="comment__title">
                            <h4 class="title">Write your comment</h4>
                        </div>
                        <form action="{{ route('endUser.comment.store',$blog) }}" method="POST">
                            @csrf
                            <textarea name="message" id="message" placeholder="Enter your Massage*"></textarea>
                            @error('message')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <button type="submit" class="btn">post a comment</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="blog__sidebar">
                    <div class="widget">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Recent Blog</h4>
                        <ul class="rc__post">
                            @foreach ( $blogs as $item )

                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="{{ route('endUser.blogDetails', $blog) }}"><img
                                            src="{{ asset($item->image) }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="{{ route('endUser.blogDetails', $blog) }}">{{
                                            __($item->title) }}</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> {{
                                        \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</span>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="sidebar__cat">
                            @foreach ($categories as $category)

                            <li class="sidebar__cat__item"><a href="blog.html">{{ $category->name }} ({{
                                    $category->blogs->count() }})</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Recent Comment</h4>
                        <ul class="sidebar__comment">
                            @foreach ($comments as $comment)
                            <li class="sidebar__comment__item">
                                <a href="{{ route('endUser.blogDetails', $comment->blog) }}">{{
                                    __($comment->blog->title) }}</a>
                                <p>{{ $comment->message }}</p>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>
                        <ul class="sidebar__tags">
                            <li><a href="blog.html">Business</a></li>
                            <li><a href="blog.html">Design</a></li>
                            <li><a href="blog.html">apps</a></li>
                            <li><a href="blog.html">landing page</a></li>
                            <li><a href="blog.html">data</a></li>
                            <li><a href="blog.html">website</a></li>
                            <li><a href="blog.html">book</a></li>
                            <li><a href="blog.html">Design</a></li>
                            <li><a href="blog.html">product design</a></li>
                            <li><a href="blog.html">landing page</a></li>
                            <li><a href="blog.html">data</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- blog-details-area-end -->





@endsection
