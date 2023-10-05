<x-larapattern-card class="col-12" type="center">

    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="buttons">
        {!! $buttons !!}
    </x-slot>

    <x-slot name="table">

        <div class="responsive-data-table">

            <table class="table lapattern-datatables dt-responsive table-hover nowrap" style="width:100%" data-options='{!! json_encode($options) !!}'>

                <thead>
                    <tr>
                        @foreach ($fields as $field)
                            <th>{{ $field }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody></tbody>

                @if(!empty($options['filterColumn']))
                    <tfoot>
                        <tr>
                        @foreach($options['columns'] as $col => $td)
                            <td>
                                @if(!in_array($col, $options['filterColumn']['exclude']))
                                    <input type="text" class="form-control filter-input {{ !empty($options['columns'][$col]['class']) ? $options['columns'][$col]['class'] : '' }}" placeholder="Search by {{ Str::lower($fields[$col]) }}..." data-column="{{ $col }}">
                                @endif
                            </td>
                        @endforeach
                        </tr>
                        <tr>
                            <td class="filter-label filter-label-up" colspan="{{ count($options['columns']) }}">
                                Filter
                            </td>
                        </tr>
                    </tfoot>
                @endif
            </table>

        </div>

    </x-slot>

</x-larapattern-card>
