<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query));
        return $dataTable
            ->addColumn('action', function (Category $category) {
                return view('admin.pages.category.action', compact('category'));
            })
            ->editColumn('name', function ($raw) {
                return $raw->getTranslation('name', app()->getLocale());
            })
            ->editColumn('created_at', function ($raw) {
                return optional($raw->created_at)->format('Y-m-d h:i A');
            })
            ->editColumn('updated_at', function ($raw) {
                return optional($raw->updated_at)->format('Y-m-d h:i A');
            })
            ->editColumn('id', function () {
                static $i = 1;
                return $i++;
            })
            ->rawColumns(['created_at', 'updated_at', 'name']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('category-table')
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
            ['data' => 'name', 'title' => 'NAME', 'name' => 'name'],
            ['data' => 'created_at', 'title' => 'CREATED AT', 'name' => 'created_at'],
            ['data' => 'updated_at', 'title' => 'UPDATED AT', 'name' => 'updated_at'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
