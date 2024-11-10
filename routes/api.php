<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectQualityController;

use App\Models\Project;
use App\Models\User;
use App\Models\Application;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/status', function (Request $request) {
    $id = $request->id;
    $uid = $request->uid;
    $status = $request->type == 'Accepted' ? 1  : 2;
    Application::where('id', $id)->update(['status' => $status]);
    if ($status ==  1) {
        User::where('id', $uid)->update(['account_type' =>  'Recipient']);
    }
});
