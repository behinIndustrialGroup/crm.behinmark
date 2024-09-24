@php
    $provinces = getProvincesByCountry('Nigeria');
@endphp


<form id="cylinder2-info" action="javascript:void(0)">
    <input type="text" name="ngv_info_unique_id" id="" value="{{ $row->unique_id }}" readonly>

    <!-- Cylinder Manufacturer -->
    <div class="mb-3">
        <label for="" class="form-label">Cylinder Manufacturer</label>
        <input type="text" value="{{ $row->cylinder2()->manufacturer }}" name="manufacturer" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder Serial</label>
        <input type="text" value="{{ $row->cylinder2()->serial }}" name="serial" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder type</label>
        <input type="text" value="{{ $row->cylinder2()->type }}" name="type" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder production date</label>
        <input type="text" value="{{ $row->cylinder2()->produce_date }}" name="produce_date" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder expiration date</label>
        <input type="text" value="{{ $row->cylinder2()->expire_date }}" name="expire_date" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder image</label>
        @if ($row->cylinder2()->cylinder_image)
            <a target="_blank" href="{{ url("public/". $row->cylinder2()->cylinder_image ) }}">download</a>
        @endif
        <input type="file" name="cylinder_image" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve manufacturer</label>
        <input type="text" value="{{ $row->cylinder2()->valve_manufacturer }}" name="valve_manufacturer" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve serial</label>
        <input type="text" value="{{ $row->cylinder2()->valve_serial }}" name="valve_serial" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve type</label>
        <input type="text" value="{{ $row->cylinder2()->valve_type }}" name="valve_type" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cylinder valve image</label>
        @if ($row->cylinder2()->valve_image)
            <a target="_blank" href="{{ url("public/". $row->cylinder2()->valve_image ) }}">download</a>
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
<button class="btn btn-success" onclick="submit_cylinder2_info()">{{ trans('Submit') }}</button>

<script>
    function submit_cylinder2_info() {
        var form = $('#cylinder2-info')[0]
        var fd = new FormData(form)
        send_ajax_formdata_request(
            '{{ route('ngvControl.cylinder2Info.store') }}',
            fd,
            function(response) {
                console.log(response);
                show_message(response.msg);
                update_ngv_informations_div()
            }
        )
    }
</script>
