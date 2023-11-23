<?php
namespace App\Http\Interfaces\Admin;

interface HomeInterface{
    public function index();
    public function profile();
    public function editProfile();
    public function updateProfile($user,$request);
    public function showUsers($dataTable);
    public function changeStatus($user);


}



?>
