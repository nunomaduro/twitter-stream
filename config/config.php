<?php

return [
    /**
     * To work with Twitter's Streaming API you'll need some credentials.
     *
     * If you don't have credentials yet, head over to https://apps.twitter.com/
     */
    'laravel-twitter-streaming-api' => [
        'access_token' => '',

        'access_token_secret' => '',

        'consumer_key' => '',

        'consumer_secret' => '',
    ],

    /*
     * Here goes your console application configuration. You should
     * define your application list of commands and your Laravel
     * Service Providers configuration.
     */
    'app' => [

        /*
         * Here goes the application name.
         */
        'name' => 'Twitter stream',

        /*
         * Here goes the application version.
         */
        'version' => '1.0.0',

        /*
         * If true, development commands won't be available as the app
         * will be in the production environment.
         */
        'production' => true,

        /*
         * Here goes the application default command.
         *
         * You may want to remove this line in order to ask the user what command he
         * wants to execute.
         */
        'default-command' => App\Commands\TwitterStreamCommand::class,

        /*
         * Here goes the application list of Laravel Service Providers.
         * Enjoy all the power of Laravel on your console.
         */
        'providers' => [
            Spatie\LaravelTwitterStreamingApi\TwitterStreamingApiServiceProvider::class,
        ],
    ],

    /*
     * Here goes the application cache configuration.
     *
     * You may want to review the Laravel supporter drivers in:
     * https://github.com/laravel/laravel/blob/master/config/cache.php
     */
    'cache' => [
        'default' => 'array',
        'stores' => [
            'array' => [
                'driver' => 'array',
            ],
        ],
    ],
];
