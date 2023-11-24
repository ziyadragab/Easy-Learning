<?php
namespace App\Http\Interfaces\Admin;

interface AboutInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($about);
    public function update($about,$request);
    public function delete($about);
}


?>
