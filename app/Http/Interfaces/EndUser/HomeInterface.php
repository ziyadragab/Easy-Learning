<?php
namespace App\Http\Interfaces\EndUser;

interface HomeInterface{
    public function index();
    public function showAbout();
    public function serviceDetails($service);
    public function blogDetails($blog);
    public function createComment($blog , $request);
    public function portfolioDetails($portfolio);
    public function showPortfolio();
    
}



?>
