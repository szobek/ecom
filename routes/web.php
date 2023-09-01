<?php

use App\Models\aa;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('list');
});

Route::get('/create', function () {
$maxh = " 21:00";
    $dayOfWeek = intval(date('w', strtotime(date('Y-m-d'))));

    $endOfWeek = ($dayOfWeek < 5) ?
        date('Y-m-d', strtotime("next friday", strtotime(date('Y-m-d')))) :
        strtotime(date('Y-m-d ') . $maxh);

    $now = strtotime(date('H:i'));

    if ($now < $endOfWeek) {
        return view('create');
    } else {
        print '<h1 >Nem lehet most felvinni (csak 8-17-ig. Most:' . date('H:i') . ') </h1><br>  <a href="/list">Tovább</a>';
    }

});

Route::post('/create', 'App\Http\Controllers\TicketController@make');
Route::get('/list','App\Http\Controllers\TicketController@list')->name('list');
Route::get('/view/{id}','App\Http\Controllers\TicketController@viewOne');
Route::fallback(function () {
   return view('404');
});
