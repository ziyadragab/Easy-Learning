<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\about\AboutTrait;
use App\Http\Traits\image\UserImageTrait;
use App\Http\Traits\slide\SlideTrait;

class HomeRepository implements HomeInterface{

    use SlideTrait , UserImageTrait , AboutTrait;
    public function index()
    {
        if(auth()->user()){
        $slides=$this->getAllSlide(1);
        $images=$this->getAllUserImage(7);
        $abouts=$this->getAbout(1);
        return view('user.index',compact(['slides','images','abouts']));
        }
        return view('user.auth.login');
    }
    public function showAbout(){
        $abouts=$this->getAbout(1);
        return view('user.pages.about.index',compact('abouts'));
    }
}




?>
