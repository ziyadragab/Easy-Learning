<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

trait ImagesTrait
{
    protected function uploadImage($newImage, $path, $oldImage = null)
    {
        if (isset($newImage)) {
            $this->removeImage($oldImage);
            $image_name = time() . '_' . $newImage->hashName();
            $newImage->move($path, $image_name);
            return $image_name;
        }
        return $oldImage;
    }

    protected function removeImage($paths)
    {
        if (is_array($paths)) {
            foreach ($paths as $path) {
                $this->deleteFile($path);
            }
        } elseif (is_string($paths)) {
            $this->deleteFile($paths);
        }
    }

    protected function deleteFile($path)
    {
        if (isset($path) && file_exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
