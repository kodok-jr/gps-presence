<?php

namespace App\DataTables;

use App\Models\Model;
use App\DataTables\DataTables;
use App\Contracts\DatatablesInterface;
use App\Models\Admin;

class UserDataTables extends DataTables implements DatatablesInterface
{
    /**
    * Datatables function
    *
    * @return []
    */
    public function render ()
    {
        /** Data from controller */
        $data = self::$data;

        return $this->eloquent(
            // app(config('larapattern.user', App\Models\User::class))->with(['roles'])
            app(config('larapattern.user', Admin::class))->with(['roles'])
            )
            ->escapeColumns([])
            ->addIndexColumn()
            ->make(true);
    }

    /**
    * Datatables option
    *
    * @return []
    */
    public function options ()
    {
        /** Data from controller */
        $data = self::$data;

        return [
            'title' => __('dashboard.content.title.user'),
            'buttons' => null,   // e.g : view('user.actions.create')
            'fields' => [ __('No'), ],  // table header
            'foos' => [     // custom data array. You can call in your blade with variable $foos
                'bar' => 'baz',
                'baz' => 'bar',
            ],

            /** Datatables server side options */
            'options' => [
                'processing' => true,
                'serverSide' => true,
                'ajax' => request()->fullurl(),
                'columns' => [
                    [ 'data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false, 'class' => 'text-center' ],
                ],
                'order' => [
                    [0, 'desc']
                ],
                'filterColumn' => [
                    'exclude' => [0],
                ]
            ]
        ];
    }
}
