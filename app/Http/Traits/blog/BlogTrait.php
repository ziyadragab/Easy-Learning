<?php
namespace App\Http\Traits\blog;

use App\Models\Blog;

trait BlogTrait {
    protected function getAllBlogs(){
        return Blog::with(['category','comments'])->inRandomOrder()->get();
    }
}






?>
