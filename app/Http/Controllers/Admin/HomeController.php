<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\HomeInterface;
use App\Http\Requests\ProfileRequest;
use App\Models\User;

class HomeController extends Controller
{
    private $homeInterface;
    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface=$homeInterface;
    }
    public function index(){
        return $this->homeInterface->index();
    }
    public function profile()
    {
      return $this->homeInterface->profile();
    }
    public function editProfile()
    {
        return $this->homeInterface->editProfile();

    }
    public function updateProfile(ProfileRequest $request,User $user)
    {
        return $this->homeInterface->updateProfile($user,$request);
    }
    public function showUsers(UserDataTable $dataTable)
    {
        return $this->homeInterface->showUsers($dataTable);
    }
    public function changeStatus(User $user)
    {
        return $this->homeInterface->changeStatus($user);
    }


}
