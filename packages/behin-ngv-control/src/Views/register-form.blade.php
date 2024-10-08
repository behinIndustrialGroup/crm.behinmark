@extends('behin-layouts.app')

@section('title')
    Behin NGV Control - Register Form
@endsection

@php
    $uniqueId = $row->unique_id;
    $provinces = getProvincesByCountry('Nigeria');
@endphp

@section('style')
    <style>
        /* Print Setting */
        @media print {
            @page {
                size: A4;
                margin: 20mm;
            }

            body {
                font-size: 12pt;
            }

            .print-section {
                page-break-inside: avoid;
            }
        }

        /* Modern mobile-first styles */
        .section-title {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            border: 1px solid #ddd;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        select,
        input[type="text"],
        button {
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            font-size: 1.1rem;
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .btn {
                font-size: 1rem;
            }

            .form-container {
                padding: 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="row">
            <!-- First Column (Unique ID, Date, Workshop, Conversion Program, Buttons) -->
            <div class="col-12 col-md-3 mb-3 form-container">
                <!-- Unique ID (Read-Only) -->
                <input type="text" name="uniqueId" class="form-control mb-3" value="{{ $row->unique_id }}" readonly>

                <!-- Conversion Date -->
                <div class="form-group">
                    <label for="date">{{ trans('Date') }}</label>
                    <input type="date" name="date" id="date" value="{{ $row->date }}" class="form-control"
                        onfocusout="update_convertion_program()">
                </div>

                <!-- Workshop -->
                <div class="form-group">
                    <label for="workshop_id">{{ trans('Retrofit Workshop') }}</label>
                    <select name="workshop_id" id="workshop_id" class="form-control" onchange="update_convertion_program()">
                        @foreach (getAllRetrofits() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Conversion Program -->
                <div class="form-group">
                    <label for="convertion_program">{{ trans('Conversion Program') }}</label>
                    <select name="convertion_program" id="convertion_program" class="form-control"
                        onchange="update_convertion_program()">
                        @foreach (config('ngv_control.convertion_program_options') as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="form-group">
                    <button class="btn btn-primary w-100 mb-2"
                        onclick="open_vehicle_owner_form('{{ $uniqueId }}')">{{ trans('Vehicle Owner Information') }}</button>
                    <button class="btn btn-info w-100 mb-2"
                        onclick="open_vehicle_info_form('{{ $uniqueId }}')">{{ trans('Vehicle Information') }}</button>
                    <button class="btn btn-success w-100"
                        onclick="{{ "open_kit_form('$uniqueId')" }}">{{ trans('Kit Information') }}</button>
                </div>
            </div>

            <!-- Second Column (Parts Section) -->
            <div class="col-12 col-md-3 mb-3 form-container">
                <p class="section-title">{{ trans('Parts') }}</p>
                <div id="part-modal-buttons"></div>
            </div>

            <!-- Third Column (Images Upload Section) -->
            <div class="col-12 col-md-3 mb-3 form-container">
                <p class="section-title">{{ trans('After Conversion') }}</p>

                <form action="javascript:void(0)" id="after_conversion_form">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ trans('Vehicle Front') }}</label>
                        @if ($row->vehicle_front_after_conversion)
                            <a href="{{ url("public/$row->vehicle_front_after_conversion") }}" target="_black">download</a>
                        @endif
                        <input type="file" name="vehicle_front_after_conversion" onchange="update_vehicle_images()"
                            class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">{{ trans('Vehicle Back') }}</label>
                        @if ($row->vehicle_back_after_conversion)
                            <a href="{{ url("public/$row->vehicle_back_after_conversion") }}" target="_black">download</a>
                        @endif
                        <input type="file" name="vehicle_back_after_conversion" onchange="update_vehicle_images()"
                            class="form-control" accept="image/*">
                    </div>
                </form>
            </div>

            <!-- Fourth Column (Approval Div) -->
            <div class="col-12 col-md-3 mb-3 form-container">
                {!! getApprovalDivView($uniqueId) !!}
            </div>
        </div>

    </div>


    <!-- Print Div -->
    <div id="print-div"></div>
@endsection

@section('script')
    <script>
        // AJAX calls and updating views
        function updateApprovalDivView() {
            var approvalDivView = $('#approval-div-view');
            var url = '{{ route('ngvControl.updatePartial.approvalDiv', ['uniqueId' => 'uniqueId']) }}';
            url = url.replace('uniqueId', '{{ $uniqueId }}');
            send_ajax_get_request(url, function(response) {
                approvalDivView.html(response);
            });
        }

        function open_vehicle_owner_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId);
            var url = '{{ route('ngvControl.editModalFrom', ['modalName' => 'vehicle-owner']) }}';
            send_ajax_formdata_request(url, fd, function(response) {
                open_admin_modal_with_data(response, 'Vehicle Owner Information');
            });
        }

        function open_vehicle_info_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId);
            var url = '{{ route('ngvControl.editModalFrom', ['modalName' => 'vehicle-info']) }}';
            send_ajax_formdata_request(url, fd, function(response) {
                open_admin_modal_with_data(response, 'Vehicle Information');
            });
        }

        function open_kit_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId);
            var url = '{{ route('ngvControl.editModalFrom', ['modalName' => 'kit-info']) }}';
            send_ajax_formdata_request(url, fd, function(response) {
                open_admin_modal_with_data(response, 'Kit Information');
            });
        }

        update_convertion_program()
        function update_convertion_program() {
            var fd = new FormData();
            fd.append('uniqueId', '{{ $uniqueId }}');
            fd.append('convertion_program', $('#convertion_program').val());
            fd.append('workshop_id', $('#workshop_id').val());
            fd.append('date', $('#date').val());
            url = '{{ route('ngvControl.vehicleOwner.store') }}';
            send_ajax_formdata_request(url, fd, function(response) {
                show_message(response.msg);
                update_ngv_informations_div();
                updateApprovalDivView();
            });
        }

        function update_vehicle_images() {
            var fd = new FormData($('#after_conversion_form')[0]);
            fd.append('uniqueId', '{{ $uniqueId }}');
            url = '{{ route('ngvControl.vehicleInfo.store') }}';
            send_ajax_formdata_request(url, fd, function(response) {
                show_message(response.msg);
                update_ngv_informations_div();
                updateApprovalDivView();
            });
        }

        update_ngv_informations_div()
        function update_ngv_informations_div() {
            var fd = new FormData();
            fd.append('uniqueId', '{{ $uniqueId }}');
            url = '{{ route('ngvControl.printView') }}';
            send_ajax_formdata_request(url, fd, function(response) {
                $('#print-div').html(response);
            });
        }

        function update_part_modal_buttons_div() {
            var fd = new FormData();
            fd.append('uniqueId', '{{ $uniqueId }}');
            url = '{{ route('ngvControl.getOpenPartModalButtons') }}';
            send_ajax_formdata_request(url, fd, function(response) {
                $('#part-modal-buttons').html(response);
            });
        }

        function printDiv(divId) {
            var divToPrint = document.getElementById(divId).innerHTML;
            var newWindow = window.open('', 'Print-Window');
            newWindow.document.write('<html><head><title>Print</title>');
            newWindow.document.write(
                '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">'
            );
            newWindow.document.write('</head><body>');
            newWindow.document.write(divToPrint);
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.focus();
            newWindow.print();
        }
    </script>
@endsection
