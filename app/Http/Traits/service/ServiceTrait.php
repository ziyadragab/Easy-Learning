<?php
namespace App\Http\Traits\service;


use App\Models\Service;

trait ServiceTrait {
    protected function getAllServices($count){
        return Service::inRandomOrder()->take($count)->get();
    }
}






?>
