<?php

namespace App\Http\Repositories\Admin;


use App\Http\Interfaces\Admin\SettingInterface;
use App\Models\Setting;

class SettingRepository implements SettingInterface
{
    private $settingModel;
    public function __construct(Setting $setting)
    {
        $this->settingModel = $setting;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.setting.index');
    }
    public function create()
    {
        return view('admin.pages.setting.create');
    }
    public function store($request)
    {

        $this->settingModel::create([
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        toast('Setting Created Successfully', 'success');
        return redirect(route('admin.setting.index'));
    }
    public function edit($setting)
    {
        return view('admin.pages.setting.edit', compact('setting'));
    }
    public function update($setting, $request)
    {

        $setting->update([
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'facebock' => $request->facebock,
            'x' => $request->x,
            'instgram' => $request->instgram,
            'linkedin' => $request->linkedin,
        ]);
        toast('Setting Updated Successfully', 'success');
        return redirect(route('admin.setting.index'));
    }
    public function delete($setting)
    {
        $setting->delete();
        toast('Setting Deleted Successfully', 'success');
        return redirect(route('admin.setting.index'));
    }
}
