<?php
namespace App\Http\Interfaces\Admin;

interface BlogInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($blog);
    public function update($blog,$request);
    public function delete($blog);
}




?>
