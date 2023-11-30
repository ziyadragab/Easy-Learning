<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ServiceInterface;
use App\Http\Requests\Admin\service\StoreServiceRequest;
use App\Http\Requests\Admin\service\UpdateServiceRequest;

class ServiceController extends Controller
{
    private $serviceInterface;
    public function __construct(ServiceInterface $serviceInterface)
    {
        $this->serviceInterface = $serviceInterface;
    }
    public function index(ServiceDataTable $dataTable)
    {
        return $this->serviceInterface->index($dataTable);
    }
    public function create()
    {
        return $this->serviceInterface->create();
    }
    public function store(StoreServiceRequest $request)
    {
        return $this->serviceInterface->store($request);
    }
    public function edit(Service $service)
    {
        return $this->serviceInterface->edit($service);
    }
    public function update(Service $service, UpdateServiceRequest $request)
    {
        return $this->serviceInterface->update($service, $request);
    }
    public function delete(Service $service)
    {
        return $this->serviceInterface->delete($service);
    }
}
