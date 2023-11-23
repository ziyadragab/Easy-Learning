<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status', function (User $user) {
                return view('admin.users.checkStatus', compact('user'));
            })

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->parameters([
            'dom'          => 'Bfrtip',
            'buttons'      => ['export', 'print', 'reset', 'reload'],
        ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            ['data' => 'id', 'title' => 'ID', 'name' => 'id'],
            ['data' => 'first_name', 'title' => 'First Name', 'name' => 'first_name'],
            ['data' => 'last_name', 'title' => 'Last Name', 'name' => 'last_name'],
            ['data' => 'email', 'title' => 'Email', 'name' => 'email'],
            ['data' => 'phone', 'title' => 'Phone', 'name' => 'phone'],
            ['data' => 'address', 'title' => 'Address', 'name' => 'address'],
            ['data' => 'status', 'title' => 'Status', 'name' => 'status','exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
