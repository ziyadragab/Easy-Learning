<?php

namespace App\Http\Repositories\Admin;


use App\Models\User;
use App\Models\Contact;
use App\Http\Traits\ImagesTrait;
use App\Http\Interfaces\Admin\HomeInterface;

class HomeRepository implements HomeInterface
{

    use ImagesTrait;
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        return view('admin.profile.index');
    }
    public function editProfile()
    {
        $user = auth()->user();
        return view('admin.profile.edit', compact('user'));
    }
    public function updateProfile($user, $request)
    {
        $imageName = null;

        if ($request->hasFile('photo')) {
            $imageName = $this->uploadImage($request->file('photo'), User::PATH, $user->photo);
        }

        $user->fill([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'photo' => $imageName ?? $user->photo,
        ])->save();

        toast('Profile Updated Successfully', 'success');
        return redirect(route('admin.profile'));
    }
    public function showUsers($dataTable)
    {
        return $dataTable->render('admin.users.index');
    }
    public function changeStatus($user)
    {
        if ($user->status == 'active') {
            $user->update(['status' => 'inactive']);
            toast('Status Changed Successfully', 'success');
            return back();
        }
        $user->update(['status' => 'active']);
        toast('Status Changed Successfully', 'success');
        return back();
    }
}
