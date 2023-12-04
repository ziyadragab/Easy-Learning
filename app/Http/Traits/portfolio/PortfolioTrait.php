<?php
namespace App\Http\Traits\portfolio;


use App\Models\Portfolio;

trait PortfolioTrait {
    protected function getAllPortfolios(){
        return Portfolio::inRandomOrder()->get();
    }
    protected function getAllPortfoliosPaginated(){
        return Portfolio::paginate(2);
    }
}






?>
