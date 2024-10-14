@extends('behin-layouts.app')

@section('title')
    Behin NGV Control - My List
@endsection

@section('style')
@endsection

@section('content')
    <div class="row mt-3 table-responsive">
        <button class="btn btn-primary" onclick="allData()">{{ trans('Get All Data') }}</button>
        <table class="table table-stripped" id="my-list">
            <thead>
                <tr>
                    <th>{{ trans('Unique Id') }}</th>
                    <th>{{ trans('Registeror') }}</th>
                    <th>{{ trans('Retrofit Workshop') }}</th>
                    <th>{{ trans('Vehicle Manufacturer') }}</th>
                    <th>{{ trans('Vehicle Model') }}</th>
                    <th>{{ trans('Vehicle Registration Plate') }}</th>
                    <th>{{ trans('Vehicle Owner') }}</th>
                    <th>{{ trans('Status') }}</th>
                    <th>{{ trans('Action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@section('script')
    <script>

        create_datatable(
            'my-list',
            '{{ route('ngvControl.list.myList') }}',
            [
                {data: 'unique_id'},
                {data: 'registeror', render: function(data){
                    return data.name;
                }},
                {data: 'workshop', render: function(data){
                    return data.name;
                }},
                {data: 'vehicle_manufacturer'},
                {data: 'vehicle_model'},
                {data: 'vehicle_plate_number', render: function(data, type, row){
                    return row.vehicle_plate_state + ' ' + data;
                }},
                {data: 'owner_firstname', render: function(data, type, row){
                    return data + ' ' + row.owner_lastname;
                }},
                {
                    data: 'status'
                },
                {data: 'unique_id', render: function(data, type, row){
                    url = '{{ route("ngvControl.registerForm" ) }}';
                    url = url + '/' + data;
                    return `<a href='${url}' target='_blank'>
                        Show
                        </a>`;
                }}
            ]
        )

        function allData(){
            var fd = new FormData();
            fd.append('get_data', 'all');
            send_ajax_formdata_request(
                '{{ route('ngvControl.list.myList') }}',
                fd,
                function(response){
                    console.log(response);

                    update_datatable(response.data)
                }
            )
        }
    </script>
@endsection
