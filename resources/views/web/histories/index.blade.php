@extends('layouts.web')

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
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="input-group" style="width: 100% !important;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Month!</span>
                                    </div>
                                    <select id="month" name="month" class="multiselect-dropdown form-control-sm form-control">
                                        <optgroup label="Please choose month">
                                            <option value=""></option>
                                            @for ($i=1; $i<=12; $i++)
                                                <option value="{{ $i }}" {{ date("m") == $i ? 'selected' : '' }}>{{ $month_name[$i] }}</option>
                                            @endfor
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="input-group" style="width: 100% !important;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Year!</span>
                                    </div>
                                    <select id="years" name="years" class="multiselect-dropdown form-control-sm form-control">
                                        <optgroup label="Please choose year">
                                            <option value=""></option>
                                            @php
                                                $start = date("Y") - 10;
                                                $now = date("Y");
                                            @endphp
                                            @for ($i=$start; $i<=$now; $i++)
                                                <option value="{{ $i }}" {{ date("Y") == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="mb-2 btn-icon btn-square btn btn-primary" id="search_history"><i class="lnr-magnifier"></i> Search</button>
                            </div>
                        </div>
                        <div class="scroll-area-sm scroll-area-sm-sm">
                            <div class="scrollbar-container ps--active-y ps">
                                <ul class="list-group list-group-flush pb-3" id="show_histories">

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
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function () {
            $('#search_history').click(function (e) {
                var month = $('#month').val();
                var year = $('#years').val();

                $.ajax({
                    type: "POST",
                    url: "/histories",
                    data: {
                        _token: "{{ csrf_token() }}",
                        month: month,
                        year: year
                    },
                    cache: false,
                    success: function (res) {
                        // console.log(res);
                        $('#show_histories').html(res);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endpush
