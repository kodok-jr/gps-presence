<x-larapattern-layout>

    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Presences Monitoring</h2>

                    {{-- <a href="https://datatables.net/examples/styling/display.html" target="_blank" class="btn btn-outline-primary btn-sm text-uppercase">
                        <i class=" mdi mdi-link mr-1"></i> Docs
                    </a> --}}
                    @include('admin.monitoring._partials.top_form')
                </div>

                <div class="card-body">
                    <div class="basic-data-table">
                        <table id="basic-data-table" class="table lapattern-datatables dt-responsive table-hover nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>ID Number</th>
                                    <th>Fullname</th>
                                    <th>Time In</th>
                                    <th class="text-center">Photo In</th>
                                    <th>Time Out</th>
                                    <th class="text-center">Photo Out</th>
                                    <th class="text-right">Annotation</th>
                                </tr>
                            </thead>

                            <tbody id="load_presences">
                                {{-- @foreach ($model as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->number_id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->time_in }}</td>
                                        <td class="text-center">{!! '<img src="'.asset('storage/presences/'.$item->photo_in).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' !!}</td>
                                        <td>{{ $item->time_out }}</td>
                                        <td class="text-center">{!! (!is_null($item->photo_out)) ? '<img src="'.asset('storage/presences/'.$item->photo_out).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' : '<i class="mdi mdi-camera-off" style="font-size: large; background-color: beige; padding: 5px;"></i>' !!}</td>
                                        <td class="text-right">{!! ($item->time_in >= "07:00") ? '<span class="badge badge-danger">Terlambat</span>' : '<span class="badge badge-success">Tepat Waktu</span>' !!}</td>
                                    </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-larapattern-layout>
