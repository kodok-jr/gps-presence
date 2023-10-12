<x-larapattern-layout>

    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Daily Monitoring Presences</h2>

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
                                    <th class="text-center">Location</th>
                                </tr>
                            </thead>

                            <tbody id="load_presences"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Large Modal -->
<div class="modal fade" id="show_map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLarge">User Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="loadmap">

            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-pill">Save Changes</button>
            </div> --}}
        </div>
    </div>
</div>

</x-larapattern-layout>
