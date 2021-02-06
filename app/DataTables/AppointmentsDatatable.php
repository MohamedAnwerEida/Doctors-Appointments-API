<?php

namespace App\DataTables;

use App\Models\Appointment;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AppointmentsDatatable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('Status', '{{ __($Status) }}')
            ->editColumn('Patient.name', '{{ $Patient ?? null }}')
            ->editColumn('Doctor.name', '{{ $Doctor ?? null }}')
            ->editColumn('Start_date', '{{ date("Y-m-d",strtotime($Start_date)) }}')
            ->editColumn('End_date', '{{ date("Y-m-d",strtotime($End_date)) }}')
            ->addColumn('checkbox', 'appointments.btn.checkbox')
            ->addColumn('action', 'appointments.btn.action')
            ->rawColumns(['checkbox', 'action', 'Start_date', 'Doctor.name', 'End_date', 'Patient.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {

        return Appointment::query()->with(["Doctor", "Patient"])->select("appointments.*");
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('appointments-table')
            ->columns($this->getColumns())
            ->dom('Bfrtip')
            ->parameters([
                'buttons'      => [
                    'pageLength',
                    //old way
                    [
                        'text' =>
                        '<i class="fa fa-trash"></i> ' . __('Delete All'),
                        'className' => 'dt-button buttons-collection delBtn buttons-page-length'
                    ],
                    [
                        "extend"=> 'collection',
                        "text"=> __("Export"),
                        "buttons" => [ 'csv', 'excel','print' ]
                    ],
                ],
                'lengthMenu' =>
                [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                'language' => datatable_lang(),

            ])
            ->minifiedAjax()
            ->orderBy(1)
            ->search([]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            [
                'name' => "checkbox",
                'data' => "checkbox",
                'title' =>
                "
                <label class='checkbox checkbox-single'>
                    <input type='checkbox'class='check_all' onclick='check_all()'/>
                    <span></span>
                </label>
                ",
                "exportable" => false,
                "printable" => false,
                "orderable" => false,
                "searchable" => false,
            ],
            Column::make('id'),
            Column::make('Status'),
            Column::make('Patient.name')->title(__("Patient")),
            Column::make('End_date'),
            Column::make('Start_date'),
            Column::make('Doctor.name')->title(__("Doctor")),
            Column::computed('action')
                ->title(__('Action'))
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->width(120)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'appointments_' . date('YmdHis');
    }
}
