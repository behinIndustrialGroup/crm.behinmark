@extends('behin-layouts.app')

@section('title')
    Behin NGV Control - Register Form
@endsection

@php
    $uniqueId = $row->unique_id;
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
        <button class="btn btn-primary mr-3"
            onclick="open_vehicle_owner_form('{{ $uniqueId }}')">{{ trans('Vehicle Owner Informations') }}</button>
        <button class="btn btn-info mr-3" onclick="">{{ trans('Vehicle Informations') }}</button>

    </div>
    <div id="print-div">

    </div>
    <!-- Print Button-->
    <div class="text-center mt-4">
        <button onclick="printDiv('print-div')" class="btn btn-primary">{{ trans('Print') }}</button>
    </div>
@endsection

@section('script')
    <script>
        function open_vehicle_owner_form(uniqueId) {
            var fd = new FormData();
            fd.append('uniqueId', uniqueId)
            send_ajax_formdata_request(
                '{{ route('ngvControl.vehicleOwner.index') }}',
                fd,
                function(response) {
                    open_admin_modal_with_data(response, 'Vehicle Owner Information')
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
