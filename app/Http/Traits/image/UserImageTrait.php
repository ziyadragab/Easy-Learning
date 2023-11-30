<?php 
namespace App\Http\Traits\image;

use App\Models\Image;

trait UserImageTrait {
    protected function getAllUserImage($count){
     return Image::inRandomOrder()->take($count)->get();
    }
}




?>