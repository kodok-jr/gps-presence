{{-- @component(larapattern()->component_path('form_row'), ['label_name' => __('Fullname'), 'label_id' => 'name', 'message' => $errors->first('name'), 'required' => true])

    {{ Form::text('name', old('name', $user->name), ['class' => 'form-control form-control-sm', 'id' => 'name', 'placeholder' => __('Fullname')]) }}

@endcomponent --}}

@push('styles')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
@endpush

</pre>
<label style="position: absolute; top: 22px; right: 193px;">Select Date: </label>
<div id="datepicker" class="input-group date mt-3 mb-0" data-date-format="yyyy-mm-dd" style="width: auto !important;">
    <input class="form-control input-sm" id="get_date" name="get_date" value="{{ date('Y-m-d') }}" type="text" placeholder="Choose date" aria-label="Right icon" autocomplete="off" />
    <div class="input-group-append">
    <span class="input-group-text input-group-addon">
        <i class="mdi mdi-calendar-clock"></i>
    </span>
    </div>
</div>


{{-- <label class="text-dark font-weight-medium" for="">Right icon</label>
<div class="input-group date" id="datepicker">
    <input type="text" class="form-control input-sm" placeholder="Right icon" aria-label="Right icon">
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="mdi mdi-calendar-clock"></i>
        </span>
    </div>
</div> --}}

@push('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script>
        $(function () {
            $("#datepicker").datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'yyyy-mm-dd'
            });

            function load_presences () {
                var get_date = $('#get_date').val();

                $.ajax({
                    type: 'POST',
                    url: '/administrator/monitoring',
                    data: {
                        _token: "{{ csrf_token() }}",
                        date: get_date
                    },
                    cache: false,
                    success: function (response) {
                        $('#load_presences').html(response);
                    }
                });
            }

            $('#get_date').change(function (e) {
                load_presences();
            })

            load_presences();

            // let minDate, maxDate;

            // // Custom filtering function which will search data in column four between two values
            // DataTable.ext.search.push(function (settings, data, dataIndex) {
            //     let min = minDate.val();
            //     let max = maxDate.val();
            //     let date = new Date(data[4]);

            //     if (
            //         (min === null && max === null) ||
            //         (min === null && date <= max) ||
            //         (min <= date && max === null) ||
            //         (min <= date && date <= max)
            //     ) {
            //         return true;
            //     }
            //     return false;
            // });

            // // Create date inputs
            // minDate = new DateTime('#get_date', {
            //     format: 'MMMM Do YYYY'
            // });
            // maxDate = new DateTime('#max', {
            //     format: 'MMMM Do YYYY'
            // });

            // // DataTables initialisation
            // let table = new DataTable('.lapattern-datatables');

            // // Refilter the table
            // document.querySelectorAll('#get_date, #max').forEach((el) => {
            //     el.addEventListener('change', () => table.draw());
            // });
        });
    </script>
@endpush
