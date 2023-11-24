<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AboutInterface;
use App\Http\Traits\ImagesTrait;
use App\Models\About;

class AboutRepository implements AboutInterface
{
    use ImagesTrait;

    private $aboutModel;
    public function __construct(About $about)
    {
        $this->aboutModel = $about;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.about.index');
    }
    public function create()
    {
        return view('admin.pages.about.create');
    }
    public function store($request)
    {
        $imageName = $this->uploadImage($request->file('image'), $this->aboutModel::PATH);

        $this->aboutModel::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'short_title' => [
                'en' => $request->short_title_en,
                'ar' => $request->short_title_ar,
            ],
            'description' =>
            [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'short_description' =>
            [
                'en' => $request->short_description_en,
                'ar' => $request->short_description_ar,
            ],
            'image' => $imageName,

        ]);

        toast('About Created Successfully', 'success');
        return redirect(route('admin.about.index'));
    }
    public function edit($about)
    {
        return view('admin.pages.about.edit', compact('about'));
    }
    public function update($about, $request)
    {
        if ($request->image) {
            $newImage = $this->uploadImage($request->image, $this->aboutModel::PATH, $about->image);
        }
        $about->update([
            'title' =>
            [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'short_title' => [
                'en' => $request->short_title_en,
                'ar' => $request->short_title_ar,
            ],
            'description' =>
            [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'short_description' =>
            [
                'en' => $request->short_description_en,
                'ar' => $request->short_description_ar,
            ],

            'image' => $newImage ?? $about->getRawOriginal('image')
        ]);
        toast('About Updated Successfully', 'success');
        return redirect(route('admin.about.index'));
    }
    public function delete($about)
    {

        $this->removeImage($about->image);
        $about->delete();
        toast('about Deleted Successfully', 'success');
        return redirect(route('admin.about.index'));
    }
}
