<?php

namespace App\DataTables;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
        ->addColumn('action', function (Service $service) {
            return view('admin.pages.service.action', compact('service'));
        })
    
        ->editColumn('name', function (Service $service) {
            return $service->getTranslation('name', app()->getLocale());
        })
       
        ->editColumn('id', function ($raw) {
            static $i = 1;
            return $i++;
        })
        ->editColumn('image', function (Service $service) {
            return '<img src="'.asset($service->image??null).'" alt="" style="max-width: 100px; max-height: 100px;">';
        })
        ->editColumn('description', function (Service $service) {
            return view('admin.pages.service.descrption', compact('service'));
        });

    return $dataTable->rawColumns(['action', 'id', 'image', 'description', 'name'])->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Service $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('service-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => 'id', 'title' => 'ID', 'name' => 'id'],
            ['data' => 'name', 'title' => 'Name', 'name' => 'name'],
            ['data'=>'description','title'=>'DESCRIPTION' , 'name'=>'description'],
            ['data'=>'image','title'=>'IMAGE' , 'name'=>'image'],
            ['data' => 'lists', 'title' => 'Service List', 'name' => 'lists'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Service_' . date('YmdHis');
    }
}
