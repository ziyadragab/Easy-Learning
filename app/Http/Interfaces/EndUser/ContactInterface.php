<?php

namespace App\Http\Interfaces\EndUser;

interface ContactInterface{
    public function index($dataTable);
    public function create();
    public function store($request);
    public function delete($contact);
}



?>
