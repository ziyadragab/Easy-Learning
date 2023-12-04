<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Requests\EndUser\comment\CommentRequest;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeInterface;
    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;
    }

    public function index()
    {
        return $this->homeInterface->index();
    }
    public function showAbout()
    {
        return $this->homeInterface->showAbout();
    }
    public function serviceDetails(Service $service)
    {
        return $this->homeInterface->serviceDetails($service);
    }
    public function blogDetails(Blog $blog)
    {
        return $this->homeInterface->blogDetails($blog);
    }
    public function createComment(Blog $blog, CommentRequest $request)
    {
        return $this->homeInterface->createComment($blog, $request);
    }
    public function portfolioDetails(Portfolio $portfolio)
    {
        return $this->homeInterface->portfolioDetails($portfolio);
    }
    public function showPortfolio()
    {
        return $this->homeInterface->showPortfolio();
    }
}
