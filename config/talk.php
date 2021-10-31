<?php

return [
    'user' => [
        'model' => 'App\User',
        'foreignKey' => null,
        'ownerKey' => null,
    ],
    'broadcast' => [
        'enable' => true,
        'app_name' => 'eurowood',
        'pusher' => [
            'app_id' => '863556',
            'app_key' => 'fc0d2b4241d649e4f881',
            'app_secret' => '366452ff2d1dd65841eb',
            'options' => [
                'cluster' => 'eu',
                'encrypted' => true,
				'useTLS' => true
            ]
        ],
    ],
    'oembed' => [
        'enabled' => false,
        'url' => '',
        'key' => ''
    ]
];
