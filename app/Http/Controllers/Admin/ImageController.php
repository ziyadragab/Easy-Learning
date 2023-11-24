<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ImageDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ImageInterface;
use App\Http\Requests\Admin\image\StoreImageRequest;
use App\Http\Requests\Admin\image\UpdateImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
    private $imageInterface;
    public function __construct(ImageInterface $imageInterface)
    {
        $this->imageInterface = $imageInterface;
    }
    public function index(ImageDataTable $dataTable)
    {
        return $this->imageInterface->index($dataTable);
    }
    public function create()
    {
        return $this->imageInterface->create();
    }
    public function store(StoreImageRequest $request)
    {
        return $this->imageInterface->store($request);
    }
    public function edit(Image $image)
    {
        return $this->imageInterface->edit($image);
    }
    public function update(Image $image, UpdateImageRequest $request)
    {
        return $this->imageInterface->update($image, $request);
    }
    public function delete(Image $image)
    {
        return $this->imageInterface->delete($image);
    }
}
