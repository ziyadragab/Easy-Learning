<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\BlogInterface;
use App\Http\Requests\Admin\blog\StoreBlogRequest;
use App\Http\Requests\Admin\blog\UpdateBlogRequest;


class BlogController extends Controller
{
    private $blogInterface;
    public function __construct(BlogInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }
    public function index(BlogDataTable $dataTable)
    {
        return $this->blogInterface->index($dataTable);
    }
    public function create()
    {
        return $this->blogInterface->create();
    }
    public function store(StoreBlogRequest $request)
    {
        return $this->blogInterface->store($request);
    }
    public function edit(Blog $blog)
    {
        return $this->blogInterface->edit($blog);
    }
    public function update(Blog $blog, UpdateBlogRequest $request)
    {
        return $this->blogInterface->update($blog, $request);
    }
    public function delete(Blog $blog)
    {
        return $this->blogInterface->delete($blog);
    }
}
