<?php

use App\Models\aa;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/a', function () {
return view('create');
});
Route::post('/b', function (Request $request) {
//dd( $request->input('name'));
    $d = new aa();
    $d->name = $request->input('name');
    $d->description = "lorem";
    $d->save();
});
Route::get('/list','App\Http\Controllers\TicketController@list');
Route::get('/view/{id}','App\Http\Controllers\TicketController@viewOne');
