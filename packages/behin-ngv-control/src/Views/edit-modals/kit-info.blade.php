@php
    $provinces = getProvincesByCountry('Nigeria');
@endphp


<form id="kit-info" action="javascript:void(0)">
    <input type="text" name="ngv_info_unique_id" id="" value="{{ $row->unique_id }}" readonly>

    <!-- kit Manufacturer -->
    <div class="mb-3">
        <label for="" class="form-label">Kit brand</label>
        <input type="text" value="{{ $row->kit()->brand }}" name="brand" class="form-control" id=""
            placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">kit serial</label>
        <input type="text" value="{{ $row->kit()->serial }}" name="serial" class="form-control" id=""
            placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">kit type</label>
        <select name="type" id="">
            @foreach (config('ngv_control.kit_type') as $kit_type)
                <option value="{{ $kit_type['key'] }}" {{ $row->kit()->type === $kit_type['key'] ? 'selected' : '' }}>
                    {{ $kit_type['value'] }}</option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label for="" class="form-label">kit image</label>
        @if ($row->kit()->kit_image)
            <a target="_blank" href="{{ url('public/' . $row->kit()->kit_image) }}">download</a>
        @endif
        <input type="file" name="kit_image" class="form-control" id="" placeholder="">
    </div>
</form>
<button class="btn btn-success" onclick="submit_kit_info()">{{ trans('Submit') }}</button>

<script>
    function submit_kit_info() {
        var form = $('#kit-info')[0]
        var fd = new FormData(form)
        send_ajax_formdata_request(
            '{{ route('ngvControl.kitInfo.store') }}',
            fd,
            function(response) {
                console.log(response);
                show_message(response.msg);
                update_ngv_informations_div()
                update_part_modal_buttons_div()
            }
        )
    }
</script>
