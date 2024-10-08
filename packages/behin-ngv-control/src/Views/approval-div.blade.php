<div class='row mt-3' id='approval-div-view'>
    @php
        $uniqueId = $row->unique_id;
    @endphp
    <fieldset>
        <p class="section-title">{{ trans('Approvals') }}</p>
        @if ($row->registeror_approval)
            <p class="alert alert-success">This record was approved by registeror operation</p>
        @else
            @if ($row->registeror_user_id == auth()->user()->id)
                <button class='btn btn-danger mr-3' onclick='storeRegisterorApproval(1)'>
                    {{ trans('Finish and Submit to Supervisor') }}
                </button>
                <script>
                    function storeRegisterorApproval(approval) {
                        var fd = new FormData();
                        fd.append('uniqueId', '{{ $uniqueId }}');
                        fd.append('registeror_approval', approval);
                        send_ajax_formdata_request(
                            '{{ route('ngvControl.approval.storeRegisterorApproval') }}',
                            fd,
                            function(response) {
                                console.log(response);
                                show_message('{{ trans('Approveed') }}')
                                update_ngv_informations_div()
                                updateApprovalDivView()
                            }
                        )
                    }
                </script>
            @else
                <p class="alert alert-warning">This record has not yet been approved by the registeror operator</p>
            @endif
        @endif

        @if ($row->supervisor_approval)
            <p class="alert alert-success">This record was approved by supervisor</p>
        @else
            @if ($row->workshop()?->workshop_supervisor_user_id == auth()->user()->id)
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
                                updateApprovalDivView()
                            }
                        )
                    }
                </script>
            @else
                <p class="alert alert-warning">This record has not yet been approved by the supervisor</p>
            @endif
        @endif

        @if ($row->workshop_manager_approval)
            <p class="alert alert-success">This record was approved by workshop manager</p>
        @else
            @if ($row->workshop()?->workshop_manager_user_id == auth()->user()->id)
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
                                updateApprovalDivView()
                            }
                        )
                    }
                </script>
            @else
                <p class="alert alert-warning">This record has not yet been approved by the workshop manager</p>
            @endif
        @endif

        <div class='' id='part-modal-buttons'>

        </div>

    </fieldset>
</div>
