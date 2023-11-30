<?php
namespace App\Http\Traits\about;

use App\Models\About;

trait AboutTrait {
    protected function getAbout($count){
        return About::inRandomOrder()->take($count)->get();
    }
}






?>
