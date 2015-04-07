<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'salt' => 'F28F86043514AEB26943F1A67F21B94251201F322199855F1DF1B982E3CF7C92',
            'length' => 6,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyz1234567890'
        ],

        'video' => [
            'salt' => 'REyUxDUiTEjlSqUBCRMXidLbuCLITJMoaehUoHmKrrZfeiXvaicKHBuUJjngTYzq',
            'length' => 6,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyz1234567890'
        ],


        'audio' => [
            'salt' => 'nhdjUWXWPhPpJEhsBkdYhMmcCTuWMbHrzeAIolqOlbhURCgNVJJNeLUvPrBTULsk',
            'length' => 6,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyz1234567890'
        ],


        'book' => [
            'salt' => 'ahuSgpwPAwAIVRHuuomaydUzuLHFVdoumAgXpdFaekrwYSLeSOBMiNqJdZTjipCm',
            'length' => 6,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyz1234567890'
        ],

        'album' => [
            'salt' => 'LnSIRCwZ8aRw7iK13KU6LxIhc8D5Xy0PSKSMEqbOZQNhQww8GprEwKwZ7SXC4NKx',
            'length' => 6,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyz1234567890'
        ]


    ]

];
