<?php

namespace App\Http\Repositories\Admin;


use App\Http\Interfaces\Admin\ImageInterface;
use App\Http\Traits\ImagesTrait;
use App\Models\Image;

class ImageRepository implements ImageInterface
{

    use ImagesTrait;

    private $imageMode;
    public function __construct(Image $image)
    {
        $this->imageMode = $image;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.image.index');
    }
    public function create()
    {
        return view('admin.pages.image.create');
    }
    public function store($request)
    {

        foreach ($request->file('image') as $file) {
            $imageName = $this->uploadImage($file, $this->imageMode::PATH);
            $this->imageMode::create([
                'image' => $imageName,
            ]);
        }

        toast('Image(s) Created Successfully', 'success');
        return redirect(route('admin.image.index'));
    }
    public function edit($image)
    {
        return view('admin.pages.image.edit', compact('image'));
    }
    public function update($image, $request)
    {
        if ($request->image) {
            $newImage = $this->uploadImage($request->image, $this->imageMode::PATH, $image->image);
        }
        $image->update([
            'image' => $newImage ?? $image->getRawOriginal('image')
        ]);
        toast('Image Updated Successfully', 'success');
        return redirect(route('admin.image.index'));
    }
    public function delete($image)
    {

        $this->removeImage($image->image);
        $image->delete();
        toast('Image Deleted Successfully', 'success');
        return redirect(route('admin.image.index'));
    }
}
