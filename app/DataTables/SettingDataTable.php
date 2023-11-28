<?php

namespace App\DataTables;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SettingDataTable extends DataTable
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
            ->addColumn('action', function (Setting $setting) {
                return view('admin.pages.setting.action', compact('setting'));
            })
            ->editColumn('description', function (Setting $setting) {
                return view('admin.pages.setting.descrption',compact('setting')) ;
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
    public function query(Setting $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('setting-table')
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
            ['data'=>'address','title'=>'ADDRESS' , 'name'=>'address'],
            ['data'=>'email','title'=>'EMAIL' , 'name'=>'email'],
            ['data'=>'description','title'=>'DESCRIPTION' , 'name'=>'description'],
            ['data'=>'x','title'=>'TWITER' , 'name'=>'x'],
            ['data'=>'facebook','title'=>'FACEBOOK' , 'name'=>'facebook'],
            ['data'=>'instagram','title'=>'INSTAGRAM' , 'name'=>'instagram'],
            ['data'=>'linkedin','title'=>'LINKEDIN' , 'name'=>'linkedin'],
            ['data'=>'action','title'=>'ACTION' , 'name'=>'action','searchable'=>false , 'printable'=>false,'exportable'=>false],
          ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Setting_' . date('YmdHis');
    }
}
