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
            ->addColumn('images', function ($item) {
                return '<img src="'.$item->laravatar_url.'" class="rounded-circle" width="30" />';
            })
            ->editColumn('roles.name', function($item) {
                return $item->roles->pluck('name');
            })
            ->addColumn('action', function($item) {
                return view('larapattern.table._action', [
                    'show' => null,
                    'edit' => [
                        'gate' => 'administrator.management.accounts.admin.update',
                        'url' => route('administrator.management.accounts.admin.edit', [$item->uuid]),
                        'name' => null
                    ],
                    'destroy' => [
                        'gate' => 'administrator.management.accounts.admin.destroy',
                        'url' => route('administrator.management.accounts.admin.destroy', [$item->uuid]),
                        'name' => $item->name
                    ]
                ]);
            })
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
            'buttons' => view('admin.user-management.accounts.user._partials.top_button'),   // e.g : view('user.actions.create')
            'fields' => [ __('No'), __('Avatar'), __('Name'), __('Email'), __('Role'), __('Action')],  // table header
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
                    [ 'data' => 'images', 'class' => 'text-center', 'orderable' => false ],
                    [ 'data' => 'name', 'class' => 'text-left' ],
                    [ 'data' => 'email', 'class' => 'text-left' ],
                    [ 'data' => 'roles.name', 'class' => 'text-left' ],
                    [ 'data' => 'action', 'class' => 'text-center', 'orderable' => false ],
                ],
                'order' => [
                    [2, 'desc']
                ],
                'filterColumn' => [
                    'exclude' => [0, 1, 4, 5],
                ]
            ]
        ];
    }
}
