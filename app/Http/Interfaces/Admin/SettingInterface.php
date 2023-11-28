<?php
namespace App\Http\Interfaces\Admin;

interface SettingInterface {
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($setting);
    public function update($setting,$request);
    public function delete($setting);
}




?>
