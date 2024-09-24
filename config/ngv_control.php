<?php

return [
    'kit_type' => [
        'open_loop' => ['key' => 'Open-Loop', 'value' => 'Open Loop'],
        'sequential' => ['key' => 'Sequential', 'value' => 'Sequential'],
    ],
    'convertion_program_options' => [
        'Pi-CNG',
        'Others'
    ],
    'parts' => [
        'cylinder1' => [
            'title' => 'Cylinder & Valve No.1',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'cylinder2' => [
            'title' => 'Cylinder & Valve No.2',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'cylinder3' => [
            'title' => 'Cylinder & Valve No.3',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'regulator' => [
            'title' => 'Regulator',
            'controller' => 'Regulator',
            'function' => 'storeRegulator'
        ],
        'filling_valve' => [
            'title' => 'Filling Valve',
            'controller' => 'FillingValve',
            'function' => 'store'
        ],
        'cutoff_valve' => [
            'title' => 'Cut off Valve',
            'controller' => 'CutoffValve',
            'function' => 'store'
        ],
        'ecu' => [
            'title' => 'ECU',
            'controller' => 'Ecu',
            'function' => 'store'
        ],
        'injector' => [
            'title' => 'Injector No.1',
            'controller' => 'Injector',
            'function' => 'store'
        ],
        'injector2' => [
            'title' => 'Injector No.2',
            'controller' => 'Injector',
            'function' => 'store'
        ],
    ],

    'parts_for_OL' => [
        'cylinder1' => [
            'title' => 'Cylinder & Valve No.1',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'cylinder2' => [
            'title' => 'Cylinder & Valve No.2',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'cylinder3' => [
            'title' => 'Cylinder & Valve No.3',
            'controller' => 'Cylinder',
            'function' => 'storeCylinderNo1'
        ],
        'regulator' => [
            'title' => 'Regulator',
            'controller' => 'Regulator',
            'function' => 'storeRegulator'
        ],
        'filling_valve' => [
            'title' => 'Filling Valve',
            'controller' => 'FillingValve',
            'function' => 'store'
        ],
        'cutoff_valve' => [
            'title' => 'Cut off Valve',
            'controller' => 'CutoffValve',
            'function' => 'store'
        ],
        'fuel_solenoid' => [
            'title' => 'Fuel Selenoid',
            'controller' => 'fuel_selenoid',
            'function' => 'store'
        ],
        'injector' => [
            'title' => 'Injector No.1',
            'controller' => 'Injector',
            'function' => 'store'
        ],
        'injector2' => [
            'title' => 'Injector No.2',
            'controller' => 'Injector',
            'function' => 'store'
        ],
    ]
];
