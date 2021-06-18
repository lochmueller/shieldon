<?php

use HDNET\Shieldon\Middleware\ShieldonMiddleware;

return [
    'frontend' => [
        'shieldon/firewall' => [
            'target' => ShieldonMiddleware::class,
            'after' => [
                'typo3/cms-core/normalized-params-attribute'
            ],
            'before' => [
                'typo3/cms-frontend/site'
            ],
        ],
    ]
];
