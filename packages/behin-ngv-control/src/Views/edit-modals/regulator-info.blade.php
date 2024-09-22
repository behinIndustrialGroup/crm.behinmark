@php
    $provinces = getProvincesByCountry('Nigeria');
@endphp


<form id="cylinder1-info" action="javascript:void(0)">
    <input type="text" name="ngv_info_unique_id" id="" value="{{ $row->unique_id }}" readonly>

    <!-- Manufacturer -->
    <div class="mb-3">
        <label for="" class="form-label">Manufacturer</label>
        <input type="text" value="{{ $row->regulator()->manufacturer }}" name="manufacturer" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input type="text" value="{{ $row->regulator()->serial }}" name="serial" class="form-control"
            id="" placeholder="">
    </div>

    {{-- <!-- Vehicle Model -->
    <div class="mb-3">
        <label for="VehicleModel" class="form-label">Vehicle Model</label>
        <input type="text" value="{{ $row->vehicle_model }}" name="vehicle_model" class="form-control"
            id="VehicleModel" placeholder="e.g., Corola">
    </div>

    <!-- Year of Manufacture -->
    <div class="mb-3">
        <label for="year" class="form-label">Year of Manufacture</label>
        <input type="number" value="{{ $row->vehicle_produce_year }}" name="vehicle_produce_year" class="form-control" id="year"
            placeholder="e.g., 2010">
    </div>

    <!-- Year of Manufacture -->
    <div class="mb-3 form-control">
        <label for="state" class="form-label">Vehicle Registration Number</label>
        <div class="row">
            <div class="col-sm-4">
                <label for="state" class="form-label">State</label>
                <select class="form-control" id="state" name="vehicle_plate_state">
                    @foreach ($provinces as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-8">
                <label for="plateNumber" class="form-label">Plate Number</label>
                <input type="text" value="{{ $row->vehicle_reg_number }}" name="vehicle_plate_number"
                    class="form-control" id="plateNumber" style="text-transform: uppercase;" placeholder="FKJ-254XA">
            </div>
        </div>
    </div>

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
<button class="btn btn-success" onclick="submit_regulator_info()">{{ trans('Submit') }}</button>

<script>
    function submit_regulator_info() {
        var form = $('#cylinder1-info')[0]
        var fd = new FormData(form)
        send_ajax_formdata_request(
            '{{ route('ngvControl.regulatorInfo.store') }}',
            fd,
            function(response) {
                console.log(response);
                show_message(response.msg);
                update_ngv_informations_div()
            }
        )
    }
</script>
