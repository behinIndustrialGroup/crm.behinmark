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

        .section-title {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            border: 1px solid #ddd;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-3">
        <input type="text" name="uniqueId" id="" class="form-control mb-3" value="{{ $row->unique_id }}" readonly>
        <div class="row col-sm-12 mb-3">
            <label for="">{{ trans('Retrofit Workshop') }}: </label>
            <select name="workshop_id" id="workshop_id" class="mr-3" onchange="update_convertion_program()">
                @foreach (getAllRetrofits() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row col-sm-12 mb-3">
            <label for="">{{ trans('Conversion Program') }}: </label>
            <select name="convertion_program" id="convertion_program" class="mr-3" onchange="update_convertion_program()">
                @foreach (config('ngv_control.convertion_program_options') as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mr-3"
            onclick="open_vehicle_owner_form('{{ $uniqueId }}')">{{ trans('Vehicle Owner Information') }}</button>

        <button class="btn btn-info mr-3"
            onclick="open_vehicle_info_form('{{ $uniqueId }}')">{{ trans('Vehicle Information') }}</button>
    </div>

    <div class="row mt-3">
        <fieldset>
            <legend>
                <label for="">{{ trans('Parts') }}</label>
            </legend>
            <button class="btn btn-success mr-3 mb-3"
                onclick="{{ "open_kit_form('$uniqueId')" }}">{{ trans('Kit Information') }}</button>

            <div class="" id="part-modal-buttons">

            </div>

        </fieldset>

    </div>
    {!! getApprovalDivView($uniqueId) !!}


    <div id="print-div">

    </div>
@endsection

@section('script')
    <script>
        function updateApprovalDivView() {
            var approvalDivView = $('#approval-div-view');
            var url = '{{ route('ngvControl.updatePartial.approvalDiv', [ 'uniqueId' => 'uniqueId' ]) }}';
            url = url.replace('uniqueId', '{{ $uniqueId }}')
            send_ajax_get_request(url, function(response){
                approvalDivView.html(response)
            })
        }

        function open_vehicle_owner_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId)
            var url = '{{ route('ngvControl.editModalFrom', ['modalName' => 'vehicle-owner']) }}'
            send_ajax_formdata_request(
                url,
                fd,
                function(response) {
                    open_admin_modal_with_data(response, 'Vehicle Owner Information')
                }
            )
        }

        function open_vehicle_info_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId)
            var url = '{{ route('ngvControl.editModalFrom', ['modalName' => 'vehicle-info']) }}'
            send_ajax_formdata_request(
                url,
                fd,
                function(response) {
                    open_admin_modal_with_data(response, 'Vehicle Information')
                }
            )
        }

        function open_kit_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId)
            var url = '{{ route('ngvControl.editModalFrom', ['modalName' => 'kit-info']) }}'
            send_ajax_formdata_request(
                url,
                fd,
                function(response) {
                    open_admin_modal_with_data(response, 'Kit Information')
                }
            )
        }

        update_convertion_program()

        function update_convertion_program() {
            var fd = new FormData();
            fd.append('uniqueId', '{{ $uniqueId }}')
            fd.append('convertion_program', $('#convertion_program').val())
            fd.append('workshop_id', $('#workshop_id').val())
            url = '{{ route('ngvControl.vehicleOwner.store') }}'
            send_ajax_formdata_request(
                url,
                fd,
                function(response) {
                    show_message(response.msg);
                    update_ngv_informations_div();
                    updateApprovalDivView()
                }
            )
        }


        update_ngv_informations_div()

        function update_ngv_informations_div() {
            var fd = new FormData();
            fd.append('uniqueId', '{{ $uniqueId }}')
            url = '{{ route('ngvControl.printView') }}'
            send_ajax_formdata_request(
                url,
                fd,
                function(response) {
                    $('#print-div').html(response)
                }
            )
        }

        update_part_modal_buttons_div()

        function update_part_modal_buttons_div() {
            var fd = new FormData();
            fd.append('uniqueId', '{{ $uniqueId }}')
            url = '{{ route('ngvControl.getOpenPartModalButtons') }}'
            send_ajax_formdata_request(
                url,
                fd,
                function(response) {
                    $('#part-modal-buttons').html(response)
                }
            )
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
            // newWindow.close();
        }
    </script>
@endsection
