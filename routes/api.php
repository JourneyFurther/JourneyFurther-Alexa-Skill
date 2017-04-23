<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* laravel standard api call that we dont need
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

AlexaRoute::launch('/echo', 'App\Http\Controllers\JourneyFurther@launch');

AlexaRoute::intent('/echo', 'Testing', 'App\Http\Controllers\JourneyFurther@testingIntent');
AlexaRoute::intent('/echo', 'DontUnderstand', 'App\Http\Controllers\JourneyFurther@dontUnderstandIntent');
AlexaRoute::intent('/echo', 'AboutJourneyFurther', 'App\Http\Controllers\JourneyFurther@aboutJourneyFurtherIntent');
AlexaRoute::intent('/echo', 'WhySentAnEcho', 'App\Http\Controllers\JourneyFurther@whySentAnEchoIntent');
AlexaRoute::intent('/echo', 'WhatSkills', 'App\Http\Controllers\JourneyFurther@whatSkillsIntent');
AlexaRoute::intent('/echo', 'DefineTerms', 'App\Http\Controllers\JourneyFurther@defineTermsIntent');
AlexaRoute::intent('/echo', 'CompareTerms', 'App\Http\Controllers\JourneyFurther@compareTermsIntent');
AlexaRoute::intent('/echo', 'Contact', 'App\Http\Controllers\JourneyFurther@contactIntent');
AlexaRoute::intent('/echo', 'Help', 'App\Http\Controllers\JourneyFurther@helpIntent');
AlexaRoute::intent('/echo', 'Stop', 'App\Http\Controllers\JourneyFurther@stopIntent');

AlexaRoute::sessionEnded('/echo', function() { // use ($app)
    return '{"version":"1.0","response":{"shouldEndSession":true}}';
});