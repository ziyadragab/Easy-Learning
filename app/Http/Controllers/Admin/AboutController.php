<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;

use App\DataTables\AboutDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AboutInterface;
use App\Http\Requests\Admin\about\StoreAboutRequest;
use App\Http\Requests\Admin\about\UpdateAboutRequest;

class AboutController extends Controller
{
    private $aboutInterface;
    public function __construct(AboutInterface $aboutInterface)
    {
        $this->aboutInterface = $aboutInterface;
    }
    public function index(AboutDataTable $dataTable)
    {
        return $this->aboutInterface->index($dataTable);
    }
    public function create()
    {
        return $this->aboutInterface->create();
    }
    public function store(StoreAboutRequest $request)
    {
        return $this->aboutInterface->store($request);
    }
    public function edit(About $about)
    {
        return $this->aboutInterface->edit($about);
    }
    public function update(About $about, UpdateAboutRequest $request)
    {
        return $this->aboutInterface->update($about, $request);
    }
    public function delete(About $about)
    {
        return $this->aboutInterface->delete($about);
    }
}
