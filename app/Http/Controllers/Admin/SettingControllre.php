<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\DataTables\SettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\SettingInterface;
use App\Http\Requests\Admin\setting\SettingRequest;

class SettingControllre extends Controller
{
    private $settingInterface;
    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }
    public function index(SettingDataTable $dataTable)
    {
        return $this->settingInterface->index($dataTable);
    }
    public function create()
    {
        return $this->settingInterface->create();
    }
    public function store(SettingRequest $request)
    {
        return $this->settingInterface->store($request);
    }
    public function edit(setting $setting)
    {
        return $this->settingInterface->edit($setting);
    }
    public function update(Setting $setting, SettingRequest $request)
    {
        return $this->settingInterface->update($setting, $request);
    }
    public function delete(Setting $setting)
    {
        return $this->settingInterface->delete($setting);
    }
}
