@php
    $provinces = getProvincesByCountry('Nigeria');
@endphp


@include('BehinNgvControlViews::edit-modals.partial.part-form', [
    'partName' => 'injector2'
])
