<?php
namespace App\Http\Interfaces\Admin;

interface PortfolioInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($portfolio);
    public function update($portfolio,$request);
    public function delete($portfolio);
}




?>
