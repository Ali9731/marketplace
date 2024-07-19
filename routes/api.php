<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\DelayReportController;
use App\Http\Controllers\Api\VendorController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/v1'], function () {

    Route::post('/delay-report', [DelayReportController::class, 'report']);
    Route::post('/agent-assign', [AgentController::class, 'assign']);
    Route::get('/vendor-delays', [VendorController::class, 'vendorDelays']);

});
