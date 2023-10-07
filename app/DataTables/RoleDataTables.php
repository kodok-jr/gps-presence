<?php

namespace App\DataTables;

use App\Models\Role;
use App\DataTables\DataTables;
use App\Contracts\DatatablesInterface;

class RoleDataTables extends DataTables implements DatatablesInterface
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

        return $this->eloquent(Role::query()->orderBy('created_at', 'desc'))
            ->addColumn('action', function($item) {
                return view('larapattern.table._action', [
                    'show' => [
                        'gate' => 'administrator.management.access.roles.show',
                        'url' => route('administrator.management.access.roles.show', [$item->uuid]),
                        'name' => __('Assign Permission')
                    ],
                    'edit' => [
                        'gate' => 'administrator.management.access.roles.update',
                        'url' => route('administrator.management.access.roles.edit', [$item->uuid]),
                        'name' => null
                    ],
                    'destroy' => [
                        'gate' => 'administrator.management.access.roles.destroy',
                        'url' => route('administrator.management.access.roles.destroy', [$item->uuid]),
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
            'title' => __('dashboard.content.title.role'),
            'buttons' => view('admin.user-management.module_access.roles.partials._top_button'),   // e.g : view('user.actions.create')
            'fields' => [ __('No'), __('Name'), __('Slug'), __('Desc'), __('Action') ],  // table header
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
                    [ 'data' => 'name', 'class' => 'text-left' ],
                    [ 'data' => 'slug', 'class' => 'text-left' ],
                    [ 'data' => 'description', 'class' => 'text-left' ],
                    [ 'data' => 'action', 'class' => 'text-center', 'orderable' => false ],
                ],
                'order' => [
                    [0, 'asc']
                ],
                'filterColumn' => [
                    'exclude' => [0, 4],
                ]
            ]
        ];
    }
}
