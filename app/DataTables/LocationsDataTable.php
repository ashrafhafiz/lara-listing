<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Location;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class LocationsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '<div class="d-flex"><a href="' . route('admin.location.edit', $query->id) . '" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                <a href="' . route('admin.location.destroy', $query->id) . '" class="ml-2 btn btn-danger btn-sm" id="delete-item"><i class="far fa-trash-alt"></i></a></div>';
            })
            ->addColumn('show_at_home', function ($query) {
                return '<label><input type="checkbox" name="show_at_home" ' . ($query->show_at_home === 1 ? 'checked' : '') . ' disabled class="custom-switch-input">
                <span class="custom-switch-indicator"></span></label>';
            })
            ->addColumn('status', function ($query) {
                // if ($query->status === 1) {
                //     return "<span class='badge badge-primary badge-pill'>Active</span>";
                // } else {
                //     return "<span class='badge badge-danger badge-pill'>Inactive</span>";
                // }
                return '<label><input type="checkbox" name="status" ' . ($query->status === 1 ? 'checked' : '') . ' disabled class="custom-switch-input">
                <span class="custom-switch-indicator"></span></label>';
            })
            ->editColumn('created_at', function ($query) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $query->created_at)->format('d-m-Y');
                return $formatedDate;
            })
            ->editColumn('updated_at', function ($query) {
                // return Carbon::parse($query->updated_at)->diffForHumans();
                return $query->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'show_at_home', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Location $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('location-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('add'),
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
            Column::make('id'),
            Column::make('name'),
            Column::make('slug'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Location_' . date('YmdHis');
    }
}
