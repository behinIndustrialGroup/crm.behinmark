<hr>
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
                <td>{{ $row->owner_lastname ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('NIN') }}</th>
                <td>{{ $row->owner_nin ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Phone Number') }}</th>
                <td>{{ $row->owner_phone ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Residence State') }}</th>
                <td>{{ $row->owner_residence_state ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات وسیله نقلیه -->
    <div class="print-section col-sm-6">
        <div class="section-title">Vehicle Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Vehicle Manufacturer') }}</th>
                <td>{{ $row->vehicle_manufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Vehicle Model') }}</th>
                <td>{{ $row->vehicle_model ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Year of Manufacture') }}</th>
                <td>{{ $row->vehicle_produce_year ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Vehicle Plate') }}</th>
                <td>{{ $row->vehicle_plate_state .'-' . $row->vehicle_plate_number ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات مخزن -->
    <div class="print-section col-sm-6">
        <div class="section-title">Cylinder Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Cylinder Serial') }}</th>
                <td>{{ $row->cylinder1()->serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Manufacturer') }}</th>
                <td>{{ $row->cylinder1()->manufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Manufacture Date') }}</th>
                <td>{{ $row->cylinder1()->produce_date ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Expiry Date') }}</th>
                <td>{{ $row->cylinder1()->expire_date ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cylinder Type') }}</th>
                <td>{{ $row->cylinder1()->type ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Valve Serial') }}</th>
                <td>{{ $row->cylinder1()->valve_serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Valve Manufacturer') }}</th>
                <td>{{ $row->cylinder1()->valve_manufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Valve Type') }}</th>
                <td>{{ $row->cylinder1()->valve_type ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات رگولاتور -->
    <div class="print-section col-sm-6">
        <div class="section-title">Regulator Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Regulator Serial') }}</th>
                <td>{{ $row->regulator()->serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Regulator Manufacturer') }}</th>
                <td>{{ $row->regulator()->manufacturer ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Regulator Type') }}</th>
                <td>{{ $row->regulator()->type ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات شیرقطع پرکن -->
    <div class="print-section col-sm-6">
        <div class="section-title">Filling Valve Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Filling Serial') }}</th>
                <td>{{ $row->filling_valve()->serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Filling Manufacturer') }}</th>
                <td>{{ $row->filling_valve()->manufacturer ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات ایسیو -->
    <div class="print-section col-sm-6">
        <div class="section-title">ECU Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('ECU Serial') }}</th>
                <td>{{ $row->ecu()->serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('ECU Manufacturer') }}</th>
                <td>{{ $row->ecu()->manufacturer ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات انژکتور -->
    <div class="print-section col-sm-6">
        <div class="section-title">Injector Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Injector Serial') }}</th>
                <td>{{ $row->injector()->serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Injector Manufacturer') }}</th>
                <td>{{ $row->injector()->manufacturer ?? '' }}</td>
            </tr>
        </table>
    </div>

    <!-- اطلاعات شیرقطع کن -->
    <div class="print-section col-sm-6">
        <div class="section-title">Cutoff Valve Information</div>
        <table class="table table-bordered">
            <tr>
                <th>{{ trans('Cutoff Valve Serial') }}</th>
                <td>{{ $row->cutoff_valve()->serial ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Cutoff Valve Manufacturer') }}</th>
                <td>{{ $row->cutoff_valve()->manufacturer ?? '' }}</td>
            </tr>
        </table>
    </div>


</div>
