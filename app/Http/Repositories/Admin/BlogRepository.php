<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\BlogInterface;
use App\Http\Traits\ImagesTrait;
use App\Models\Blog;
use App\Models\Category;

class BlogRepository implements BlogInterface
{

    use ImagesTrait;

    private $blogModel;
    public function __construct(Blog $blog)
    {
        $this->blogModel = $blog;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.blog.index');
    }
    public function create()
    {
        $categories=Category::get();
        return view('admin.pages.blog.create',compact('categories'));
    }
    public function store($request)
    {
        
        $imageName = $this->uploadImage($request->file('image'), $this->blogModel::PATH);
        $this->blogModel::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'tags'            => $request->tags,
            'category_id'     => $request->category_id,
            'image' => $imageName,
        ]);

        toast('Blog Created Successfully', 'success');
        return redirect(route('admin.blog.index'));
    }
    public function edit($blog)
    {
        $categories=Category::get();
        return view('admin.pages.blog.edit',compact(['blog','categories']));
    }
    public function update($blog, $request)
    {
        if ($request->image) {
            $newImage = $this->uploadImage($request->image, $this->blogModel::PATH, $blog->image);
        }
        $blog->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'tags'            => $request->tags,
            'category_id'     => $request->category_id,
            'image' => $newImage ?? $blog->getRawOriginal('image')
        ]);
        toast('Blog Updated Successfully', 'success');
        return redirect(route('admin.blog.index'));
    }
    public function delete($blog)
    {

        $this->removeImage($blog->image);
        $blog->delete();
        toast('Blog Deleted Successfully', 'success');
        return redirect(route('admin.blog.index'));
    }
}
