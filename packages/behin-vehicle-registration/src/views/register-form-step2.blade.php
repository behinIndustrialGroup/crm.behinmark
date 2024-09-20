@extends('layouts.guest')

@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            <div class="text-center mb-4">
                <!-- Logo -->
                <img src="{{ url('public/behin/logo.png') }}" alt="behinmarkpoint-logo" class="img-fluid"
                    style="max-width: 150px;">
            </div>
            <!-- Form Title -->
            <h2 class="text-center mb-2">Vehicle CNG Conversion</h2>
            <h5 class="text-center mb-4">Registration Form</h5>

            <!-- Form -->
            <form class="" action="javascript:void(0)" id="registeration-form">
                <!-- First Name -->
                <div class="mb-3">
                    <input type="hidden" name="unique_id" class="form-control" id="unique_id" value="{{$row->unique_id}}">
                </div>


                <!-- Vehicle Manufacturer -->
                <div class="mb-3">
                    <label for="VehicleMaker" class="form-label">Vehicle Manufacturer</label>
                    <input type="text" value="{{ $row->vehicle_manufacturer }}" name="vehicle_manufacturer" class="form-control" id="VehicleMaker" placeholder="e.g., Toyota">
                </div>

                <!-- Vehicle Model -->
                <div class="mb-3">
                    <label for="VehicleModel" class="form-label">Vehicle Model</label>
                    <input type="text" value="{{ $row->vehicle_model }}" name="vehicle_model" class="form-control" id="VehicleModel" placeholder="e.g., Corola">
                </div>

                <!-- Year of Manufacture -->
                <div class="mb-3">
                    <label for="year" class="form-label">Year of Manufacture</label>
                    <input type="number" value="{{ $row->vehicle_year }}" name="vehicle_year" class="form-control" id="year" placeholder="e.g., 2010">
                </div>

                <!-- Year of Manufacture -->
                <div class="mb-3 form-control">
                    <label for="state" class="form-label">Vehicle Registration Number</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="state" class="form-label">State</label>
                            <select class="form-control" id="state" name="vehicle_reg_state">
                                @include('VehicleRegView::partial.nig-cities')
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <label for="plateNumber" class="form-label">Plate Number</label>
                            <input type="text" value="{{ $row->vehicle_reg_number }}" name="vehicle_reg_number" class="form-control" id="plateNumber" style="text-transform: uppercase;" placeholder="FKJ-254XA">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="submit_form()">Next</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function submit_form() {
            var fd = new FormData($('#registeration-form')[0])
            send_ajax_formdata_request(
                "{{ route('vehicleReg.step2') }}",
                fd,
                function(response) {
                    if(response.status == 200){
                        window.location = response.url
                    }
                }
            )
        }
    </script>
@endsection
