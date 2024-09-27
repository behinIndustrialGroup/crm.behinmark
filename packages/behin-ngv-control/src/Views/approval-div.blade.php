<div class='row mt-3' id='approval-div-view'>
    @php
        $uniqueId = $row->unique_id;
    @endphp
    <fieldset>
        <legend>
            <label for=''>{{ trans('Approvals') }}</label>
        </legend>
        @if ($row->workshop()?->workshop_supervisor_user_id === auth()->user()->id)
            <button class='btn btn-danger mr-3' onclick='storeSupervisorApproval(1)'>
                {{ trans('Approved as Supervisor') }}
            </button>
            <script>
                function storeSupervisorApproval(approval) {
                    var fd = new FormData();
                    fd.append('uniqueId', '{{ $uniqueId }}');
                    fd.append('supervisor_approval', approval);
                    send_ajax_formdata_request(
                        '{{ route('ngvControl.approval.storeSupervisorApproval') }}',
                        fd,
                        function(response) {
                            console.log(response);
                            show_message('{{ trans('Approveed') }}')
                            update_ngv_informations_div()
                        }
                    )
                }
            </script>
        @endif
        @if ($row->workshop()?->workshop_manager_user_id === auth()->user()->id)
            <button class='btn btn-danger mr-3' onclick='storeWorkshopManagerApproval(1)'>
                {{ trans('Approved as Workshop Manager') }}
            </button>
            <script>
                function storeWorkshopManagerApproval(approval) {
                    var fd = new FormData();
                    fd.append('uniqueId', '{{ $uniqueId }}');
                    fd.append('workshop_manager_approval', approval);
                    send_ajax_formdata_request(
                        '{{ route('ngvControl.approval.storeWorkshopManagerApproval') }}',
                        fd,
                        function(response) {
                            console.log(response);
                            show_message('{{ trans('Approveed') }}')
                            update_ngv_informations_div()
                        }
                    )
                }
            </script>
        @endif

        <div class='' id='part-modal-buttons'>

        </div>

    </fieldset>
</div>
