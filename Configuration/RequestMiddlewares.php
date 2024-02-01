<?php

use \Ibk\Ibkagentur\Middleware\Metataggenerator;

return [
    'frontend' => [
        'ibk/ibkagentur/middleware' => [
            'target' => Metataggenerator::class,
            'before' => [
                'typo3/cms-frontend/page-resolver',
            ],
            'after' => [
                'typo3/cms-frontend/site',
            ],
        ],
    ],
];
