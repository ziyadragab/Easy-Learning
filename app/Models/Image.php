<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    const PATH='Images/homeImage';
    protected $fillable=['image'];

    public function getImageAttribute($value){
     return $this::PATH.DIRECTORY_SEPARATOR.$value;
    }
}
