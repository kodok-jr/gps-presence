<x-larapattern-layout>

    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('administrator.reports.recap-presence.store') }}" method="POST" target="_blank">
                @csrf
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Report Recap Presences</h2>
                    </div>
                    <div class="card-body pb-0 pt-2">
                        <label class="text-dark font-weight-medium" for="">Month</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">
                                    <i class="mdi mdi-calendar-multiselect"></i>
                                </span>
                            </div>
                            {{-- <input type="text" class="form-control" aria-label="Small" placeholder="Small Size" aria-describedby="inputGroup-sizing-sm"> --}}
                            <select id="month" name="month" class="form-control custom-select2 form-control-sm">
                                <optgroup label="Please choose month">
                                    <option value=""></option>
                                    @for ($i=1; $i<=12; $i++)
                                        <option value="{{ $i }}" {{ date("m") == $i ? 'selected' : '' }}>{{ $month_name[$i] }}</option>
                                    @endfor
                                </optgroup>
                            </select>
                        </div>

                        <label class="text-dark font-weight-medium" for="">Years</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">
                                    <i class="mdi mdi-calendar-multiselect"></i>
                                </span>
                            </div>
                            {{-- <input type="text" class="form-control" aria-label="Small" placeholder="Small Size" aria-describedby="inputGroup-sizing-sm"> --}}
                            <select id="years" name="years" class="form-control custom-select2 form-control-sm">
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
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="print" class="btn btn-primary btn-sm btn-block">
                                    <i class=" mdi mdi-printer"></i>  Print
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="export" class="btn btn-success btn-sm btn-block">
                                    <i class=" mdi mdi-file-excel"></i>  Export to excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-larapattern-layout>
