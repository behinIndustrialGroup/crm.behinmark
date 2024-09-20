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
                    <input type="hidden" name="unique_id" class="form-control" id="unique_id" value="{{ $unique_id }}">
                </div>


                <!-- Payment Slip -->
                <p>
                    Please arrange booking fee payment, Naira 150,000, to the below bank account and upload the remittance slip.
                </p>
                <p>
                    BEHIN-MARKPOINT LTD
                </p>
                <p>0060908265</p>
                <p>UNITY BANK PLC</p>
                <div class="mb-3">
                    <label for="payment_fiel" class="form-label">Payment Slip</label>
                    <input type="file" name="payment_file" class="form-control" id="payment_fiel">
                </div>


                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="submit_form()">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function submit_form() {
            var fd = new FormData($('#registeration-form')[0])
            send_ajax_formdata_request(
                "{{ route('vehicleReg.step3') }}",
                fd,
                function(response) {
                    console.log(response);

                    if (response.status == 200) {
                        $('#registeration-form').html(`
                        <div class="alert alert-success">
    Registration was successful
</div>
                        `)
                    }
                }
            )
        }
    </script>
@endsection
