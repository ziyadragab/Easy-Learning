<?php

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
            ->addColumn('action', function (Blog $blog) {
                return view('admin.pages.blog.action', compact('blog'));
            })
            ->editColumn('title', function (Blog $blog) {
                return $blog->getTranslation('title', app()->getLocale());
            })
            ->editColumn('category.name', function (Blog $blog) {
                return optional($blog->category)->getTranslation('name', app()->getLocale());
            })
            ->editColumn('id', function ($raw) {
                static $i = 1;
                return $i++;
            })
            ->editColumn('image', function (Blog $blog) {
                return '<img src="'.asset($blog->image??null).'" alt="" style="max-width: 100px; max-height: 100px;">';
            })
            ->editColumn('description', function (Blog $blog) {
                return view('admin.pages.blog.descrption', compact('blog'));
            });

        return $dataTable->rawColumns(['action', 'id', 'image', 'description','category.name', 'title'])->addIndexColumn();
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('blog-table')
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
            ['data'=>'description','title'=>'DESCRIPTION' , 'name'=>'description'],
            ['data'=>'image','title'=>'IMAGE' , 'name'=>'image'],
            ['data' => 'tags', 'title' => 'TAG', 'name' => 'tags'],
            ['data' => 'category.name', 'title' => 'CATEGORY', 'name' => 'category.name'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Blog_' . date('YmdHis');
    }
}
