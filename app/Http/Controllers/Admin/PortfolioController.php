<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;

use App\Http\Controllers\Controller;
use App\DataTables\PortfolioDataTable;
use App\Http\Interfaces\Admin\PortfolioInterface;
use App\Http\Requests\Admin\portfolio\StorePortfolioRequest;
use App\Http\Requests\Admin\portfolio\UpdatePortfolioRequest;

class PortfolioController extends Controller
{
    private $portfolioInterface;
    public function __construct(PortfolioInterface $portfolioInterface)
    {
        $this->portfolioInterface = $portfolioInterface;
    }
    public function index(PortfolioDataTable $dataTable)
    {
        return $this->portfolioInterface->index($dataTable);
    }
    public function create()
    {
        return $this->portfolioInterface->create();
    }
    public function store(StorePortfolioRequest $request)
    {
        return $this->portfolioInterface->store($request);
    }
    public function edit(Portfolio $portfolio)
    {
        return $this->portfolioInterface->edit($portfolio);
    }
    public function update(Portfolio $portfolio, UpdatePortfolioRequest $request)
    {
        return $this->portfolioInterface->update($portfolio, $request);
    }
    public function delete(Portfolio $portfolio)
    {
        return $this->portfolioInterface->delete($portfolio);
    }
}
