@php
    $provinces = getProvincesByCountry('Nigeria');
@endphp


<form id="cylinder1-info" action="javascript:void(0)">
    <input type="text" name="ngv_info_unique_id" id="" value="{{ $row->unique_id }}" readonly>

    <!-- Cylinder Manufacturer -->
    <div class="mb-3">
        <label for="" class="form-label">Cylinder Manufacturer</label>
        <input type="text" value="{{ $row->cylinder1()->manufacturer }}" name="manufacturer" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder Serial</label>
        <input type="text" value="{{ $row->cylinder1()->serial }}" name="serial" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder type</label>
        <select name="type" id="" class="form-control">
            @foreach (config('ngv_control.cylinder_type') as $item)
                <option value="{{ $item }}" {{ ($item === $row->cylinder1()->type)? 'selected': '' }} >{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder production date</label>
        <input type="text" value="{{ $row->cylinder1()->produce_date }}" name="produce_date" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder expiration date</label>
        <input type="text" value="{{ $row->cylinder1()->expire_date }}" name="expire_date" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder image</label>
        @if ($row->cylinder1()->cylinder_image)
            <a target="_blank" href="{{ url("public/". $row->cylinder1()->cylinder_image ) }}">download</a>
        @endif
        <input type="file" name="cylinder_image" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve manufacturer</label>
        <input type="text" value="{{ $row->cylinder1()->valve_manufacturer }}" name="valve_manufacturer" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve serial</label>
        <input type="text" value="{{ $row->cylinder1()->valve_serial }}" name="valve_serial" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve type</label>
        <select name="valve_type" id="" class="form-control">
            @foreach (config('ngv_control.valve_type') as $item)
                <option value="{{ $item }}" {{ ($item === $row->cylinder1()->valve_type)? 'selected': '' }} >{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve image</label>
        @if ($row->cylinder1()->valve_image)
            <a target="_blank" href="{{ url("public/". $row->cylinder1()->valve_image ) }}">download</a>
        @endif
        <input type="file" name="valve_image" class="form-control"
            id="" placeholder="">
    </div>
    {{-- <!-- Vehicle Model -->


    <div class="mb-3">
        <label for="" class="form-label">{{ trans('Vehicle Card Image') }}</label>
        <input type="file" name="vehicle_card_image" id="" class="form-control" accept="image/*"
            capture="camera">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ trans('Vehicle Image (Plaque)') }}</label>
        <input type="file" name="vehicle_plaque_image" id="" class="form-control" accept="image/*"
            capture="camera">
    </div> --}}
</form>
<button class="btn btn-success" onclick="submit_cylinder1_info()">{{ trans('Submit') }}</button>

<script>
    function submit_cylinder1_info() {
        var form = $('#cylinder1-info')[0]
        var fd = new FormData(form)
        send_ajax_formdata_request(
            '{{ route('ngvControl.cylinderInfo.store') }}',
            fd,
            function(response) {
                console.log(response);
                show_message(response.msg);
                update_ngv_informations_div()
            }
        )
    }
</script>
