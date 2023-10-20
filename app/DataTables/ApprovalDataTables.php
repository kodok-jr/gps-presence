<?php

namespace App\DataTables;

use App\Models\Model;
use App\DataTables\DataTables;
use App\Contracts\DatatablesInterface;
use App\Models\Absence;

class ApprovalDataTables extends DataTables implements DatatablesInterface
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

        return $this->eloquent(Absence::with('user')->orderBy('created_at', 'desc'))
            ->editColumn('date', function($item) {
                return $item->absence_date;
            })
            ->editColumn('user.name', function($item) {
                return $item->user->name;
            })
            ->editColumn('user.name', function($item) {
                return $item->user->name;
            })
            ->editColumn('absent', function($item) {
                return $item->status == 'permit' ? 'Izin' : 'Sakit';
            })
            ->editColumn('approval', function($item) {
                if ($item->approval == 'pending') {
                    $color = 'warning';
                } elseif ($item->approval == 'approved') {
                    $color = 'success';
                } else {
                    $color = 'danger';
                }
                return  '<small><code class="text-'.$color.'" style="font-size: small; padding: 3px;">'.$item->approval.'</code></small>';
                // return  '<small><code class="text-danger" style="font-size: small; padding: 3px;">'.$item->approval.'</code></small>';
            })
            ->addColumn('action', function($item) {
                return view('larapattern.table._action', [
                    'approved' => [
                        'data' => $item,
                        'status' => $item->approval,
                        'gate' => 'administrator.approvals.update',
                        'url' => route('administrator.approvals.update', [$item->uuid]),
                        'name' => null
                    ],
                    'rejected' => [
                        'data' => $item,
                        'status' => $item->approval,
                        'gate' => 'administrator.approvals.update',
                        'url' => route('administrator.approvals.update', [$item->uuid]),
                        'name' => null
                    ],
                    'pending' => [
                        'data' => $item,
                        'status' => $item->approval,
                        'gate' => 'administrator.approvals.update',
                        'url' => route('administrator.approvals.update', [$item->uuid]),
                        'name' => null
                    ],
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
            'title' => 'List of Approval',
            'buttons' => null,   // e.g : view('user.actions.create')
            'fields' => [ __('No'), __('Date'), __('Number ID'), __('Name'), __('Absent'), __('Information'), __('Status'), __('Action') ],  // table header
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
                    [ 'data' => 'date', 'class' => 'text-left' ],
                    [ 'data' => 'user.number_id', 'class' => 'text-left' ],
                    [ 'data' => 'user.name', 'class' => 'text-left' ],
                    [ 'data' => 'absent', 'class' => 'text-left' ],
                    [ 'data' => 'description', 'class' => 'text-left' ],
                    [ 'data' => 'approval', 'class' => 'text-left' ],
                    [ 'data' => 'action', 'class' => 'text-right', 'orderable' => false ],
                ],
                'order' => [
                    [0, 'desc']
                ],
                'filterColumn' => [
                    'exclude' => [0, 2, 3, 7],
                ]
            ]
        ];
    }
}
