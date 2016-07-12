<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');
/**
 * Transformers
 */
app('Dingo\Api\Transformer\Factory')->register('Event', 'EventTransformer');

$api->version('v1', function ($api) {
    $api->resource('/events', 'App\Api\V1\Controllers\EventsController');
    $api->resource('/speakers', 'App\Api\V1\Controllers\SpeakersController');
    $api->resource('/events/{event}/speakers', 'App\Api\V1\Controllers\SpeakersController');
    $api->resource('/events/{event}/talks', 'App\Api\V1\Controllers\TalksController');
});
$app->get('/', function () use ($app) {
    return $app->version();
});
