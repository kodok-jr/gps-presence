<?php

namespace App\DataTables;

use App\Models\Model;
use App\DataTables\DataTables;
use App\Contracts\DatatablesInterface;
use App\Models\Member;

class MemberDataTables extends DataTables implements DatatablesInterface
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

        return $this->eloquent(Member::query())
            ->addColumn('images', function ($item) {
                return '<img src="'.$item->laravatar_url.'" class="rounded-circle" width="30" />';
            })
            ->addColumn('action', function($item) {
                return view('larapattern.table._action', [
                    'show' => null,
                    'edit' => [
                        'gate' => 'administrator.management.accounts.student.update',
                        'url' => route('administrator.management.accounts.student.edit', [$item->uuid]),
                        'name' => null
                    ],
                    'destroy' => [
                        'gate' => 'administrator.management.accounts.student.destroy',
                        'url' => route('administrator.management.accounts.student.destroy', [$item->uuid]),
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
            'title' => __('dashboard.content.title.student'),
            'buttons' => view('admin.user-management.accounts.member._partials.top_button'),   // e.g : view('user.actions.create')
            'fields' => [ __('No'), __('Avatar'), __('Number ID'), __('Name'), __('Email'), __('Phone'), __('Address'), __('Action')],  // table header
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
                    [ 'data' => 'number_id', 'class' => 'text-left' ],
                    [ 'data' => 'name', 'class' => 'text-left' ],
                    [ 'data' => 'email', 'class' => 'text-left' ],
                    [ 'data' => 'phone', 'class' => 'text-left' ],
                    [ 'data' => 'address', 'class' => 'text-left' ],
                    [ 'data' => 'action', 'class' => 'text-center', 'orderable' => false ],
                ],
                'order' => [
                    [3, 'desc']
                ],
                'filterColumn' => [
                    'exclude' => [0, 1, 7],
                ]
            ]
        ];
    }
}
