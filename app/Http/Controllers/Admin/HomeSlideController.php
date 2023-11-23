<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HomeSlideDataTable;
use App\Models\HomeSlide;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\HomeSlideInterface;
use App\Http\Requests\Admin\homeSlide\StoreHomeSlideRequest;
use App\Http\Requests\Admin\homeSlide\UpdateHomeSlideRequest;

class HomeSlideController extends Controller
{
    private $homeSlideInterface;
    public function __construct(HomeSlideInterface $homeSlideInterface)
    {
        $this->homeSlideInterface = $homeSlideInterface;
    }
    public function index(HomeSlideDataTable $dataTable)
    {
        return $this->homeSlideInterface->index($dataTable);
    }
    public function create()
    {
        return $this->homeSlideInterface->create();
    }
    public function store(StoreHomeSlideRequest $request)
    {
        return $this->homeSlideInterface->store($request);
    }
    public function edit(HomeSlide $slide)
    {
        return $this->homeSlideInterface->edit($slide);
    }
    public function update(HomeSlide $slide, UpdateHomeSlideRequest $request)
    {
        return $this->homeSlideInterface->update($slide, $request);
    }
    public function delete(HomeSlide $slide)
    {
        return $this->homeSlideInterface->delete($slide);
    }
}
