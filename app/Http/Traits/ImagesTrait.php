<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

trait ImagesTrait
{
    protected function uploadImage($newImage,$path,$oldImage=null){
        if(isset($newImage)){
            $this->removeImage($oldImage);
            $image_name=time(). '_' . $newImage->hashName();
            $newImage->move($path,$image_name);
            return $image_name;
        }
        return $oldImage;
    }

    protected function removeImage($path){

       if(isset($path)&& File::exists(public_path($path))){
        File::delete($path);
       }
    }
}
