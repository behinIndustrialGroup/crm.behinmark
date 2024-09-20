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
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstName" placeholder="Enter your first name">
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Enter your last name">
                </div>

                <!-- Nigerian Identification Number -->
                <div class="mb-3">
                    <label for="nin" class="form-label">NIN</label>
                    <input type="text" name="nin" class="form-control" id="nin"
                        placeholder="Enter your Nigerian Identification Number">
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phoneNumber" pattern="[0-9]{11}" placeholder="e.g., 08039275959">
                </div>

                <!-- Residence State -->
                <div class="mb-3">
                    <label for="residenceState" class="form-label">Residence State</label>
                    <select class="form-control" name="residence_state" id="state">
                        @include('VehicleRegView::partial.enabled-nig-cities')
                    </select>
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
                "{{ route('vehicleReg.step1') }}",
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
