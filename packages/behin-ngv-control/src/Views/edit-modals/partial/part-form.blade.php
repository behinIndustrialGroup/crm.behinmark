

<form id="part-info" action="javascript:void(0)">
    <input type="text" name="ngv_info_unique_id" id="" value="{{ $row->unique_id }}" readonly>

    <!-- Manufacturer -->
    <div class="mb-3">
        <label for="" class="form-label">Manufacturer</label>
        <input type="text" value="{{ $row->$partName()->manufacturer }}" name="manufacturer" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input type="text" value="{{ $row->$partName()->serial }}" name="serial" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Type</label>
        <input type="text" value="{{ $row->$partName()->type }}" name="type" class="form-control"
            id="" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <p style="color: red">Notice: Part serial number should be clear in part photo</p>
        @if ($row->$partName()->image)
            <a href="{{ url("public/". $row->$partName()->image) }}" target="_blank">download</a>
        @endif
        <input type="file" value="{{ $row->$partName()->image }}" name="image" class="form-control"
            id="" placeholder="">
    </div>
</form>
<button class="btn btn-success" onclick="submit_part_info()">{{ trans('Submit') }}</button>

<script>
    function submit_part_info() {
        var form = $('#part-info')[0]
        var fd = new FormData(form)
        send_ajax_formdata_request(
            '{{ route("ngvControl." . $partName . "Info.store") }}',
            fd,
            function(response) {
                console.log(response);
                show_message(response.msg);
                update_ngv_informations_div()
            }
        )
    }
</script>
