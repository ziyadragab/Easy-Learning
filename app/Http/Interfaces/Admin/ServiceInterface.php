<?php
namespace App\Http\Interfaces\Admin;

interface ServiceInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($service);
    public function update($service,$request);
    public function delete($service);
}




?>
