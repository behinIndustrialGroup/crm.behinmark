<hr>
<div class="row" id="printable">
    <div class="row col-sm-12">
        <div class="">
            <img src="{{ Url('public/behin/logo.png') }}" alt="" width="150">
            <p>Retrofit Workshop: {{ $row->retrofit_workshop ?? '' }}</p>
            <p>Conversion Program: {{ $row->convertion_program ?? '' }}</p>
            <p>Serial: {{ $row->unique_id ?? '' }}</p>
        </div>
    </div>
    <h2 class="text-center col-sm-12">Vehicle and Owner Information</h2>

    <!-- اطلاعات شخصی -->
    <div class="print-section col-sm-6">
        <div class="section-title bg-gray">Owner Information</div>
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
        <div class="section-title bg-gray">Vehicle Information</div>
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
                <th>{{ trans('VIN') }}</th>
                <td>{{ $row->vehicle_vin ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ trans('Vehicle Plate') }}</th>
                <td>{{ $row->vehicle_plate_state . '-' . $row->vehicle_plate_number ?? '' }}</td>
            </tr>
        </table>
    </div>

    @php
        $kit = $row->kit();
    @endphp

    @if (displayPartsInformation($row->unique_id))

        <!-- اطلاعات مخزن -->
        <div class="print-section col-sm-6">
            <div class="section-title bg-gray">Cylinder No.1 Information</div>
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

        @if ($row->cylinder2(false))
            <div class="print-section col-sm-6">
                <div class="section-title bg-gray">Cylinder No.2 Information</div>
                <table class="table table-bordered">
                    <tr>
                        <th>{{ trans('Cylinder No.2 Serial') }}</th>
                        <td>{{ $row->cylinder2()->serial ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.2 Manufacturer') }}</th>
                        <td>{{ $row->cylinder2()->manufacturer ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.2 Manufacture Date') }}</th>
                        <td>{{ $row->cylinder2()->produce_date ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.2 Expiry Date') }}</th>
                        <td>{{ $row->cylinder2()->expire_date ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.2 Type') }}</th>
                        <td>{{ $row->cylinder2()->type ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Valve No.2 Serial') }}</th>
                        <td>{{ $row->cylinder2()->valve_serial ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Valve No.2 Manufacturer') }}</th>
                        <td>{{ $row->cylinder2()->valve_manufacturer ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Valve No.2 Type') }}</th>
                        <td>{{ $row->cylinder2()->valve_type ?? '' }}</td>
                    </tr>
                </table>
            </div>
        @endif

        @if ($row->cylinder3(false))
            <div class="print-section col-sm-6">
                <div class="section-title bg-gray">Cylinder No.3 Information</div>
                <table class="table table-bordered">
                    <tr>
                        <th>{{ trans('Cylinder No.3 Serial') }}</th>
                        <td>{{ $row->cylinder3()->serial ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.3 Manufacturer') }}</th>
                        <td>{{ $row->cylinder3()->manufacturer ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.3 Manufacture Date') }}</th>
                        <td>{{ $row->cylinder3()->produce_date ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.3 Expiry Date') }}</th>
                        <td>{{ $row->cylinder3()->expire_date ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Cylinder No.3 Type') }}</th>
                        <td>{{ $row->cylinder3()->type ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Valve No.3 Serial') }}</th>
                        <td>{{ $row->cylinder3()->valve_serial ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Valve No.3 Manufacturer') }}</th>
                        <td>{{ $row->cylinder3()->valve_manufacturer ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('Valve No.3 Type') }}</th>
                        <td>{{ $row->cylinder3()->valve_type ?? '' }}</td>
                    </tr>
                </table>
            </div>
        @endif

        @php
            $parts = getKitParts($row->unique_id);
        @endphp

        @foreach ($parts as $key => $value)
            @if (str_contains($key, 'cylinder'))
            @else
                @if ($row->$key(false))
                    <div class="print-section col-sm-6">
                        <div class="section-title bg-gray">{{ $value['title'] }} Information</div>
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans($value['title'] . 'Serial') }}</th>
                                <td>{{ $row->$key()->serial ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans($value['title'] . 'Manufacturer') }}</th>
                                <td>{{ $row->$key()->manufacturer ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans($value['title'] . 'Type') }}</th>
                                <td>{{ $row->$key()->type ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                @endif
            @endif
        @endforeach

        <div class="row col-sm-12" style="font-weight: bold">
            <div class="print-section col-sm-4">
                Vehicle Owner Signature
            </div>
            <div class="print-section col-sm-4">
                Supervisor Signature: {{ getUserById($row->approver_supervisor_user_id)?->name }}
                @if ($row->supervisor_approval)
                    <img width="100"
                        src="data:image/jpg;base64,{{ base64_encode(getUserProfileById($row->approver_supervisor_user_id)?->signature_image) }}"
                        alt="">
                @endif
            </div>
            <div class="print-section col-sm-4">
                Workshop Manager Signature: {{ getUserById($row->approver_workshop_manager_user_id)?->name }}
                @if ($row->workshop_manager_approval)
                    <img width="100"
                        src="data:image/jpg;base64,{{ base64_encode(getUserProfileById($row->approver_workshop_manager_user_id)?->signature_image) }}"
                        alt="">
                @endif
            </div>
        </div>
</div>
@if ($row->supervisor_approval && $row->workshop_manager_approval)
    <!-- Print Button-->
    <div class="text-center mt-4">
        <button onclick="printDiv('printable')" class="btn btn-primary">{{ trans('Print') }}</button>
    </div>
@endif
@else
<p style="color: red">
    {{ trans('NOTICE: For Show Parts Information, Enter Kit Information First') }}
</p>
@endif
