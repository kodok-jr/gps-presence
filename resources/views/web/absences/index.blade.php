@extends('layouts.web')

@push('styles')
    <style type="text/css">
        .datepicker-container {
            z-index: 9999 !important;
        }
    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
@endpush

@section('content')
<div class="app-main__inner">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="main-card mb-3 card custom">
                <div class="card-header" style="border-radius: 50% !important; justify-content: center; text-transform: capitalize !important; display: flex;">
                    <i class="header-icon pe-7s-cloud-download icon-gradient bg-plum-plate"> </i>
                    Histories
                </div>
                <div class="card-body">
                    <div class="scroll-area-sm scroll-area-sm-sm">
                        <div class="scrollbar-container ps--active-y ps">
                            <ul class="list-group list-group-flush pb-3" id="show_histories">
                            @foreach ($absences as $absence)
                                <li class="list-group-item p-2 pl-3">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3 text-center">
                                                <strong class="text-muted">{{ date('D', strtotime($absence->absence_date)) }}</strong>
                                                <div class="icon-wrapper icon-wrapper-custom border-light rounded m-0 text-muted">
                                                    <strong class="text-muted">{{ date('d', strtotime($absence->absence_date)) }}</strong>
                                                    <p><small>{{ date('M', strtotime($absence->absence_date)) }}</small></p>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                    {{-- <i class="header-icon lnr-enter icon-gradient bg-happy-itmeo"> </i> --}}
                                                    {{ ($absence->status == 'permit') ? 'Izin' : 'Sakit' }}
                                                    <i class="ml-4 header-icon pe-7s-more icon-gradient bg-plum-plate"> </i>
                                                    <small><i class="ml-5 badge badge-{{ ($absence->approval == 'approved') ? 'success' : 'danger' }} {{ ($absence->approval == 'pending') ? 'bg-mean-fruit' : '' }} ">{{ $absence->approval }}</i></small>
                                                    {{-- @if ($absence->status != null)
                                                        {{ $absence->status }}
                                                    @else
                                                        <code>Belum Absen</code>
                                                    @endif --}}
                                                </div>
                                                <div class="widget-subheading" style="line-height: 0.8rem !important;">
                                                    <small class="">{{ $absence->description }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                            <div class="ps__rail-x" style="left: 0px; bottom: -418px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                            <div class="ps__rail-y" style="top: 418px; height: 200px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 136px; height: 64px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            {{-- <button type="button" id="TooltipDemo" class="btn-open-options btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
                <i class="fa fa-paper-plane fa-w-16 fa-2x"></i>
            </button> --}}
        </div>
    </div>
</div>

<button type="button" id="TooltipDemo" class="btn-open-options btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fa fa-paper-plane fa-w-16 fa-2x"></i>
</button>
@endsection


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Pengajuan Izin/ Sakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => route('absences.store'), 'method' => 'POST', 'id' => 'createAbsence', 'autocomplete' => 'off']) !!}
            <div class="card-body">
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">Tanggal Izin</label>
                    <input type="text" name="absence_date" id="absence_date" class="form-control" data-toggle="datepicker" />
                </div>
                <div class="position-relative form-group">
                    <label for="examplePassword" class="">Status</label>
                    <fieldset class="position-relative form-group d-flex">
                        <div class="position-relative form-check mr-3">
                            <label class="form-check-label">
                                <input name="status" type="radio" value="permit" checked class="form-check-input">
                                Izin
                            </label>
                        </div>
                        <div class="position-relative form-check">
                            <label class="form-check-label">
                                <input name="status" type="radio" value="diseased" class="form-check-input">
                                Sakit
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="position-relative form-group">
                    <label for="exampleText" class="">Keterangan</label>
                    <textarea name="description" id="exampleText" class="form-control"></textarea>
                </div>
                <div class="position-relative form-group">
                    <small class="form-text text-muted">
                        <code>Form pengajuan izin/ sakit..! Dan akan disetujui/ ditolak oleh admin</code>
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@if(Session::has('success'))
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'success',
                text: "{{ Session::get('success')[0] }}",
                confirmButtonText: 'Ok'
            })
        </script>
    @endpush
@endif

@if($errors->any())
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...!',
                text: "{{ Session::get('errors') }}",
                confirmButtonText: 'Ok'
            })
        </script>
    @endpush
@endif

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function(){

            // $('[data-toggle="datepicker"]').on('pick.datepicker', function (e) {
            //     console.log('gaskins');
            //     if (e.date < new Date()) {
            //         e.preventDefault(); // Prevent to pick the date
            //     }
            // });
            // $('#absence_date').change(function() {
            //     console.log('gaskins');
            // });
            // $('[data-toggle="datepicker"]').change(function() {
            //     console.log('gaskins');
            // });
            // $().datepicker('formatDate', new Date(2014, 1, 14));
            // $( ".target" ).on( "change", function() {
            //     alert( "Handler for `change` called." );
            // } );
        });
    //     $(document).ready(function () {
    //         $('#absence_date').change(function (){
    //             alert('test');
    //         });
    //         // $(document).on("change", "#absence_date", function (e) {

    //         //     alert('test');

    //         // });
    //         // $('.datepicker-panel>ul>li.picked').on('pick.datepicker', function (e) {
    //         //     alert('gaskins');
    //         //     // if (e.date < new Date()) {
    //         //     //     e.preventDefault(); // Prevent to pick the date
    //         //     // }
    //         // });
    //     });
    </script>
@endpush
