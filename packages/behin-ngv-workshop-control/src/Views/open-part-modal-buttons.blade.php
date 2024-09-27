@php
    $uniqueId = $row->unique_id;
    $parts = getKitparts($uniqueId);
@endphp
@if (displayPartsInformation($uniqueId))
    @foreach ($parts as $key => $value)
        <button class="btn btn-primary mr-3 mb-3"
            onclick="{{ "open_$key" . "_form('$uniqueId')" }}">{{ trans($value['title']) }}</button>

        <script>
            function {{ "open_$key" . '_form(uniqueId)' }} {
                var fd = new FormData();
                fd.append('uniqueId', uniqueId)
                var url = '{{ route('ngvControl.editModalFrom', ['modalName' => "$key-info"]) }}'
                send_ajax_formdata_request(
                    url,
                    fd,
                    function(response) {
                        open_admin_modal_with_data(response, '{{ $value['title'] }} Information')
                    }
                )
            }
        </script>
    @endforeach
@else
    <p style="color: red">
NOTICE: Complete Kit Information First For Show Other Part Buttons
    </p>
@endif
