<?php
namespace App\Http\Traits\slide;

use App\Models\HomeSlide;

trait SlideTrait {
    protected function getAllSlide($count){
        return HomeSlide::inRandomOrder()->take($count)->get();
    }
}






?>
