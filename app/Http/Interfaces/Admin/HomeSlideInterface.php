<?php
namespace App\Http\Interfaces\Admin;

interface HomeSlideInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($homeSlide);
    public function update($slide,$request);
    public function delete($slide);
}




?>
