<?php
namespace App\Http\Interfaces\Admin;

interface CategoryInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($category);
    public function update($category,$request);
    public function delete($category);
}




?>
