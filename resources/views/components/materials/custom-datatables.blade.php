@php
  $thead  = isset($thead) ? $thead : [];
  $class  = isset($class) ? $class : '';
  $options = isset($options) ? $options : [];
  $id = isset($id) ? $id : '';
@endphp

<div class="table-responsive">
  <table data-tables data-options='{!! collect($options)->toJson() !!}' class="table {{ $class }}" id="{{ $id }}" style="width:100%">
    <thead>
      <tr>
        @foreach($thead as $th)
          <th>{{ $th }}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      {{ $slot }}
    </tbody>
    @if(!empty($options['filterColumn']))
      <tfoot>
        <tr>
          @foreach($options['columns'] as $col => $td)
            <td>
            @if(!in_array($col, $options['filterColumn']['exclude']))
              <input type="text" class="form-control filter-input {{ !empty($options['columns'][$col]['class']) ? $options['columns'][$col]['class'] : '' }}" placeholder="{{ $thead[$col] }}" data-column="{{ $col }}">
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
