<?php

namespace App\DataTables;

use App\Models\HomeSlide;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class HomeSlideDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $table = (new EloquentDataTable($query))
            ->addColumn('action', function (HomeSlide $slide) {
                return view('admin.pages.slide.action', compact('slide'));
            })
            ->editColumn('image', function (HomeSlide $slide) {
                return '<img src="' . asset($slide->image ?? null) . '" alt="" style="max-width: 100px; max-height: 100px;">';
            })

          

            ->editColumn('description', function (HomeSlide $slide) {
                return view('admin.pages.slide.descrption', compact('slide'));
            })
            ->editColumn('title', function (HomeSlide $slide) {
                return $slide->getTranslation('title', app()->getLocale());
            })
            ->editColumn('id', function () {
                static $i = 1;
                return  $i++;
            })
            ->setRowId('id');
        return $table->rawColumns(['action', 'id', 'image', 'video', 'description', 'title'])->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(HomeSlide $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('homeslide-table')
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
            ['data' => 'title', 'title' => 'TITLE', 'name' => 'title'],
            ['data' => 'description', 'title' => 'DESCRIPTION', 'name' => 'description'],
            ['data' => 'image', 'title' => 'IMAGE', 'name' => 'image'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'HomeSlide_' . date('YmdHis');
    }
}
