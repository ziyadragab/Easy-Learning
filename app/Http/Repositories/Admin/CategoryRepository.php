<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    private $categoryModel;
    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.category.index');
    }
    public function create()
    {
        return view('admin.pages.category.create');
    }
    public function store($request)
    {

        $this->categoryModel::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
        ]);

        toast('category Created Successfully', 'success');
        return redirect(route('admin.category.index'));
    }
    public function edit($category)
    {
        return view('admin.pages.category.edit', compact('category'));
    }
    public function update($category, $request)
    {

        $category->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
        ]);
        toast('category Updated Successfully', 'success');
        return redirect(route('admin.category.index'));
    }
    public function delete($category)
    {
        $category->delete();
        toast('category Deleted Successfully', 'success');
        return redirect(route('admin.category.index'));
    }
}
