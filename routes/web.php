<?php

use App\Models\aa;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
return view('create');
});

Route::post('/create', 'App\Http\Controllers\TicketController@make');
Route::get('/list','App\Http\Controllers\TicketController@list')->name('list');
Route::get('/view/{id}','App\Http\Controllers\TicketController@viewOne');
Route::fallback(function () {
   return view('404');
});
