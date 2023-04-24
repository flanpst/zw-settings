<?php

use Illuminate\Support\Facades\Route;

    Route::apiResource('setting', 'API\SettingController');
    Route::post('logotipo/images', 'API\SettingController@uploadLogotipo');