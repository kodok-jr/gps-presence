<x-larapattern-layout>

    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            {!! Form::model($model, ['url' => route('administrator.settings.update', $model->uuid), 'method' => 'PUT', 'id' => 'settingForm']) !!}
                @csrf
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Base Configuration</h2>
                    </div>
                    <div class="card-body pb-0 pt-2">
                        <label class="text-dark font-weight-medium" for="">Coordinate Location</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">
                                    <i class="mdi mdi-map-marker-radius"></i>
                                </span>
                            </div>
                            <input type="text" name="base_location" value="{{ $model->base_location }}" class="form-control" aria-label="Small" placeholder="Coordinate location..." aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <label class="text-dark font-weight-medium" for="">Radius</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">
                                    <i class="mdi mdi-radar"></i>
                                </span>
                            </div>
                            <input type="text" name="radius" value="{{ $model->radius }}" class="form-control" aria-label="Small" placeholder="Radius" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">
                                <i class=" mdi mdi-content-save-all"></i>  Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-larapattern-layout>
