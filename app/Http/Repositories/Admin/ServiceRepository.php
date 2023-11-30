<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ServiceInterface;
use App\Http\Traits\ImagesTrait;
use App\Models\Service;
use App\Models\Category;

class ServiceRepository implements ServiceInterface
{

    use ImagesTrait;

    private $serviceModel;
    public function __construct(Service $service)
    {
        $this->serviceModel = $service;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.service.index');
    }
    public function create()
    {
       
        return view('admin.pages.service.create');
    }
    public function store($request)
    {
        
        $imageName = $this->uploadImage($request->file('image'), $this->serviceModel::PATH);
        $this->serviceModel::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'lists'            => $request->lists,
            'image' => $imageName,
        ]);

        toast('Service Created Successfully', 'success');
        return redirect(route('admin.service.index'));
    }
    public function edit($service)
    {
        return view('admin.pages.service.edit',compact(['service']));
    }
    public function update($service, $request)
    {
        if ($request->image) {
            $newImage = $this->uploadImage($request->image, $this->serviceModel::PATH, $service->image);
        }
        $service->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'lists'            => $request->lists,
            'image' => $newImage ?? $service->getRawOriginal('image')
        ]);
        toast('Service Updated Successfully', 'success');
        return redirect(route('admin.service.index'));
    }
    public function delete($service)
    {

        $this->removeImage($service->image);
        $service->delete();
        toast('Service Deleted Successfully', 'success');
        return redirect(route('admin.service.index'));
    }
}
