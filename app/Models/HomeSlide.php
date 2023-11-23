<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class HomeSlide extends Model
{
    use HasFactory, HasSlug, HasTranslations;

    protected $fillable = ['title', 'description', 'slug', 'image', 'video'];
    const PATH='Images/slide';

    public array $translatable  = ['title'];
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageAttribute($value){
        return $this::PATH.DIRECTORY_SEPARATOR.$value;
    }

}
