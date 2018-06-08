<?php

$config = [
    'id' => 'price-calculator',
    'basePath' => dirname(__DIR__),
    'components' => [
            'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JKCpFMOXU4bRq2JkmlwpIU-7DXrd59n6',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ]
];

return $config;
