<div class="row" id="printable">
    <h2 class="text-center col-sm-12">Vehicle and Owner Information</h2>

    <!-- اطلاعات شخصی -->
    <div class="print-section col-sm-6">
        <div class="section-title">Owner Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('First Name') }}</th>
                <td>{{ $row->owner_firstname ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Last Name') }}</th>
                <td>{{ $row->owner->lastname ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('NIN') }}</th>
                <td>{{ $nin ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Phone Number') }}</th>
                <td>{{ $phone ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Residence State') }}</th>
                <td>{{ $residenceState ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات وسیله نقلیه -->
    <div class="print-section col-sm-6">
        <div class="section-title">Vehicle Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Vehicle Manufacturer') }}</th>
                <td>{{ $vehicleManufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Vehicle Model') }}</th>
                <td>{{ $vehicleModel ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Year of Manufacture') }}</th>
                <td>{{ $vehicleYear ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Vehicle Plate') }}</th>
                <td>{{ $vehiclePlate ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات مخزن -->
    <div class="print-section col-sm-6">
        <div class="section-title">Cylinder Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Cylinder Serial') }}</th>
                <td>{{ $CylinderSerial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Manufacturer') }}</th>
                <td>{{ $CylinderManufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Manufacture Date') }}</th>
                <td>{{ $CylinderManufactureDate ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Expiry Date') }}</th>
                <td>{{ $CylinderExpiryDate ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Type') }}</th>
                <td>{{ $CylinderType ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات رگولاتور -->
    <div class="print-section col-sm-6">
        <div class="section-title">Regulator Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Regulator Serial') }}</th>
                <td>{{ $regulatorSerial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Regulator Manufacturer') }}</th>
                <td>{{ $regulatorManufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Regulator Type') }}</th>
                <td>{{ $regulatorType ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات شیرمخزن -->
    <div class="print-section col-sm-6">
        <div class="section-title">Cylinder Valve Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Valve Serial') }}</th>
                <td>{{ $valveSerial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Valve Manufacturer') }}</th>
                <td>{{ $valveManufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Valve Type') }}</th>
                <td>{{ $valveType ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Valve Thread') }}</th>
                <td>{{ $valveThread ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات ایسیو -->
    <div class="print-section col-sm-6">
        <div class="section-title">ECU Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('ECU Serial') }}</th>
                <td>{{ $ecuSerial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('ECU Manufacturer') }}</th>
                <td>{{ $ecuManufacturer ?? '' }}</td>
            </tr>
        </table>
    </div>


</div>
