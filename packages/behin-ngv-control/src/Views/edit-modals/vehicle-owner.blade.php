<form id="owner-info" action="javascript:void(0)">
    <input type="text" name="uniqueId" id="" value="{{ $row->unique_id }}" readonly>
    <div class="mb-3">
        <label for="firstName" class="form-label">{{ trans('First Name') }}</label>
        <input type="text" name="owner_firstname" class="form-control" id="firstName"
            value="{{ $row->owner_firstname ?? '' }}" placeholder="{{ trans('Enter first name') }}">
    </div>

    <div class="mb-3">
        <label for="lastName" class="form-label">{{ trans('Last Name') }}</label>
        <input type="text" name="owner_lastname" class="form-control" id="lastName"
            value="{{ $row->owner_lastname ?? '' }}" placeholder="{{ trans('Enter last name') }}">
    </div>

    <div class="mb-3">
        <label for="nin" class="form-label">{{ trans('National Identification Number (NIN)') }}</label>
        <input type="text" name="owner_nin" class="form-control" id="nin" value="{{ $row->owner_nin ?? '' }}"
            placeholder="{{ trans('Enter NIN') }}">
    </div>

    <div class="mb-3">
        <label for="phoneNumber" class="form-label">{{ trans('Phone Number') }}</label>
        <input type="tel" name="owner_phone" class="form-control" id="phoneNumber" value="{{ $row->owner_phone ?? '' }}"
            placeholder="{{ trans('Enter phone number') }}">
    </div>

    <div class="mb-3">
        <label for="residenceState" class="form-label">{{ trans('Residence State') }}</label>
        <select class="form-select" name="owner_residence_state" id="residenceState">
            <option value="">{{ trans('Choose state of residence') }}</option>
            @php
                $provinces = getProvincesByCountry('Nigeria');
            @endphp

            @foreach ($provinces as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="personalImage" class="form-label">{{ trans('Personal Image') }}</label>
        <input type="file" name="owner_personal_image" id="" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="frontNationalCardImage" class="form-label">{{ trans('National Card Image (Front)') }}</label>
        <input type="file" name="owner_front_national_card" id="" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="backNationalCardImage" class="form-label">{{ trans('National Card Image (Back)') }}</label>
        <input type="file" name="owner_back_national_card" id="" class="form-control" accept="image/*">
    </div>
</form>
<button class="btn btn-success" onclick="submit_owner_info()">{{ trans('Submit') }}</button>

<script>
    function submit_owner_info() {
        var form = $('#owner-info')[0]
        var fd = new FormData(form)
        send_ajax_formdata_request(
            '{{ route('ngvControl.vehicleOwner.store') }}',
            fd,
            function(response) {
                console.log(response);
                show_message(response.msg);
                update_ngv_informations_div()
            }
        )
    }
    console.log('{{$provinces}}');

</script>
