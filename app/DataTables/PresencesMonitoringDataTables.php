<?php

namespace App\DataTables;

use App\Models\Model;
use App\DataTables\DataTables;
use App\Contracts\DatatablesInterface;
use App\Models\Presence;

class PresencesMonitoringDataTables extends DataTables implements DatatablesInterface
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

        return $this->eloquent(Presence::with(['user'])->orderBy('presence_date', 'ASC'))
                    ->addColumn('photo_out', function ($item) {
                        return (!is_null($item->photo_out)) ? '<img src="'.asset('storage/presences/'.$item->photo_out).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' : '<i class="mdi mdi-camera-off" style="font-size: large; background-color: beige; padding: 5px;"></i>';
                    })
                    ->addColumn('annotation', function ($item) {

                        return ($item->time_in >= "07:00") ? '<span class="badge badge-danger">Terlambat</span>' : '<span class="badge badge-success">Tepat Waktu</span>';
                    })
                    ->addColumn('photo_in', function ($item) {
                        return '<img src="'.asset('storage/presences/'.$item->photo_in).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />';
                    })
                    ->escapeColumns([])
                    ->addIndexColumn()
                    ->make(true);

        // if (is_null($data['get_date'])) {
        //     dd('kosong');
        //     return $this->eloquent(Presence::with(['user']))
        //             ->addColumn('photo_out', function ($item) {

        //                 return (!is_null($item->photo_out)) ? '<img src="'.asset('storage/presences/'.$item->photo_out).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' : '<i class="mdi mdi-camera-off" style="font-size: large; background-color: beige; padding: 5px;"></i>';
        //             })
        //             ->addColumn('photo_in', function ($item) {
        //                 return '<img src="'.asset('storage/presences/'.$item->photo_in).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />';
        //             })
        //             ->escapeColumns([])
        //             ->addIndexColumn()
        //             ->make(true);
        // } else {
        //     return $this->eloquent(Presence::with(['user'])->where('presence_date', '2023-10-10'))
        //             ->addColumn('photo_out', function ($item) {

        //                 return (!is_null($item->photo_out)) ? '<img src="'.asset('storage/presences/'.$item->photo_out).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' : '<i class="mdi mdi-camera-off" style="font-size: large; background-color: beige; padding: 5px;"></i>';
        //             })
        //             ->addColumn('photo_in', function ($item) {
        //                 return '<img src="'.asset('storage/presences/'.$item->photo_in).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />';
        //             })
        //             ->escapeColumns([])
        //             ->addIndexColumn()
        //             ->make(true);
        // }
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
            'title' => 'Presences Monitoring',
            'buttons' => view('admin.monitoring._partials.top_form'),   // e.g : view('user.actions.create')
            // 'fields' => [ __('No'), __('ID Number'), __('Name'),  __('Time In'), __('Photo In'), __('Time Out'), __('Photo Out') ],  // table header
            'fields' => [ __('No'), __('ID Number'), __('Fullname'), __('Time In'), __('Photo In'), __('Time Out'), __('Photo Out'), __('Annotation') ],  // table header
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
                    [ 'data' => 'user.number_id', 'class' => 'text-left' ],
                    [ 'data' => 'user.name', 'class' => 'text-left' ],
                    [ 'data' => 'time_in', 'class' => 'text-left' ],
                    [ 'data' => 'photo_in', 'class' => 'text-center' ],
                    [ 'data' => 'time_out', 'class' => 'text-left' ],
                    [ 'data' => 'photo_out', 'class' => 'text-center' ],
                    [ 'data' => 'annotation', 'class' => 'text-right' ],
                ],
                'order' => [
                    [0, 'desc']
                ],
                'filterColumn' => [
                    'exclude' => [0, 1, 2, 3, 4, 5, 6, 7],
                ]
            ]
        ];
    }
}
