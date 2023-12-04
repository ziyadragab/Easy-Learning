<?php

namespace App\Http\Repositories\EndUser;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\blog\BlogTrait;
use App\Http\Traits\about\AboutTrait;
use App\Http\Traits\slide\SlideTrait;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Traits\image\UserImageTrait;
use App\Http\Traits\service\ServiceTrait;
use App\Http\Traits\portfolio\PortfolioTrait;
use App\Http\Interfaces\EndUser\HomeInterface;

class HomeRepository implements HomeInterface
{

    use SlideTrait, UserImageTrait, AboutTrait, ServiceTrait, PortfolioTrait, BlogTrait;
    public function index()
    {
        if (auth()->user()) {
            $slides = $this->getAllSlide(1);
            $images = $this->getAllUserImage(7);
            $abouts = $this->getAbout(1);
            $portfolios = $this->getAllPortfolios();
            $blogs = $this->getAllBlogs();
            $services = $this->getAllServices(7);
            return view('user.index', compact([ 'images', 'abouts', 'services', 'portfolios', 'blogs']));
        }
        return view('user.auth.login');
    }
    public function showAbout()
    {
        $abouts = $this->getAbout(1);
        return view('user.pages.about.index', compact('abouts'));
    }
    public function serviceDetails($service)
    {
        return view('user.pages.service.service_detail', compact('service'));
    }
    public function blogDetails($blog)
    {
        $categories = Category::get();
        $images = Image::get();
        $blogs = $this->getAllBlogs();
        $comments = Comment::with(['user', 'blog'])->get();
        return view('user.pages.blog.blog_details', compact(['blog', 'blogs', 'categories', 'images', 'comments']));
    }
    public function createComment($blog, $request)
    {
        try {
            DB::beginTransaction();

            Comment::create([
                'message' => $request->message,
                'blog_id' => $blog->id,
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();

            toast('Your Comment Created Successfully','success');
        } catch (\Exception $e) {
            DB::rollBack();

            toast( 'An error occurred while creating your comment. Please try again.' ,'error');
        }

        return back();
    }
    public function portfolioDetails($portfolio)
    {
        $images = Image::get();
        return view('user.pages.portfolio.portfolio-datails', compact(['portfolio', 'images']));
    }
    public function showPortfolio()
    {
        $portfolios = $this->getAllPortfoliosPaginated();
        $images = Image::get();

        return view('user.pages.portfolio.index', compact(['portfolios','images']));
    }
}
