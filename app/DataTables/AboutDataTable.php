<?php

namespace App\DataTables;

use App\Models\About;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class AboutDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */

     public function dataTable(QueryBuilder $query): EloquentDataTable
     {
         $table = (new EloquentDataTable($query))
             ->addColumn('action', function (About $about) {
                 return view('admin.pages.about.action', compact('about'));
             })
             ->editColumn('image', function (About $about) {
                 return '<img src="'.asset($about->image ?? null).'" alt="" style="max-width: 100px; max-height: 100px;">';
             })
             ->editColumn('description', function (About $about) {
                 return view('admin.pages.about.descrption', compact('about'));
             })
             ->editColumn('title', function (About $about) {
                 return $about->getTranslation('title', app()->getLocale());
             })
             ->editColumn('short_title', function (About $about) {
                 return $about->getTranslation('short_title', app()->getLocale());
             })
             ->setRowId('id');

         return $table->rawColumns(['action', 'image', 'short_title', 'description', 'title'])->addIndexColumn();
     }


    /**
     * Get the query source of dataTable.
     */
    public function query(About $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('about-table')
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
            ['data'=>'title','title'=>'TITLE' , 'name'=>'title'],
            ['data'=>'short_title','title'=>'SHORT TITLE' , 'name'=>'short_title'],
            ['data'=>'description','title'=>'DESCRIPTION' , 'name'=>'description'],
            ['data'=>'image','title'=>'IMAGE' , 'name'=>'image'],
            ['data'=>'action','title'=>'ACTION' , 'name'=>'action','searchable'=>false , 'printable'=>false,'exportable'=>false],
          ];

    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'About_' . date('YmdHis');
    }
}
