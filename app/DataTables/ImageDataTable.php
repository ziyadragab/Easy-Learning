<?php

namespace App\DataTables;

use App\Models\Image;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ImageDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
         $table=(new EloquentDataTable($query))
           ->addColumn('action', function (Image $image) {
            return view('admin.pages.image.action', compact('image'));
        })
        ->editColumn('image', function (Image $image) {
            return '<img src="'.asset($image->image??null).'" alt="" style="max-width: 100px; max-height: 100px;">';
        })
            ->setRowId('id');
        return $table->rawColumns(['action', 'image'])->addIndexColumn();

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Image $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('image-table')
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
            ['data'=>'id','title'=>'ID' , 'name'=>'id'],
            ['data'=>'image','title'=>'IMAGE' , 'name'=>'image'],
            ['data'=>'action','title'=>'ACTION' , 'name'=>'action','searchable'=>false , 'printable'=>false,'exportable'=>false],

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Image_' . date('YmdHis');
    }
}
