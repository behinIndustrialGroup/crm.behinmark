<?php

return [
    'parts' => [
        'cylinder1' => [
            'title' => 'Cylinder No.1',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'regulator' => [
            'title' => 'Regulator',
            'controller' => 'Regulator',
            'function' => 'storeRegulator'
        ],
        'filling_valve' => [
            'title' => 'Filing Valve',
            'controller' => 'FillingValve',
            'function' => 'store'
        ],
        'cutoff_valve' => [
            'title' => 'Cutoff Valve',
            'controller' => 'CutoffValve',
            'function' => 'store'
        ],
        'ecu' => [
            'title' => 'ECU',
            'controller' => 'Ecu',
            'function' => 'store'
        ],
        'injector' => [
            'title' => 'Injector',
            'controller' => 'Injector',
            'function' => 'store'
        ],
    ]
];
