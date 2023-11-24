<?php
namespace App\Http\Interfaces\Admin;

interface ImageInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($image);
    public function update($image,$request);
    public function delete($image);
}




?>
