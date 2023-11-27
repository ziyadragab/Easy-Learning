<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Requests\Admin\category\CategoryRequest;

class CategoryController extends Controller
{
    private $categoryInterface;
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }
    public function index(CategoryDataTable $dataTable)
    {
        return $this->categoryInterface->index($dataTable);
    }
    public function create()
    {
        return $this->categoryInterface->create();
    }
    public function store(CategoryRequest $request)
    {
        return $this->categoryInterface->store($request);
    }
    public function edit(Category $category)
    {
        return $this->categoryInterface->edit($category);
    }
    public function update(Category $category, CategoryRequest $request)
    {
        return $this->categoryInterface->update($category, $request);
    }
    public function delete(Category $category)
    {
        return $this->categoryInterface->delete($category);
    }
}
