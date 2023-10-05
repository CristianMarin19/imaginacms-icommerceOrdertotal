<?php

return [
    'single' => 'Order Total',
    'description' => 'The module description',
    'list resource' => 'List icommerceordertotals',
    'create resource' => 'Create icommerceordertotals',
    'edit resource' => 'Edit icommerceordertotals',
    'destroy resource' => 'Destroy icommerceordertotals',
    'title' => [
        'icommerceordertotals' => 'IcommerceOrdertotal',
        'create icommerceordertotal' => 'Create a icommerceordertotal',
        'edit icommerceordertotal' => 'Edit a icommerceordertotal',
    ],
    'button' => [
        'create icommerceordertotal' => 'Create a icommerceordertotal',
    ],
    'table' => [
    ],
    'form' => [
    ],
    'messages' => [
    ],
    'validation' => [
    ],
    'crud-fields' => [
        'orderTotalRanges' => [
            'label' => 'Total de la Orden - Rangos (desde/hasta) y valor (Costo del Envio)',
            'help' => 'Si es un RANGO: agregar From, To y Value ||| Si es MENOR A: agregar To y Value ||| Si es MAYOR A: agregar From y Value'
        ]
    ]
];
