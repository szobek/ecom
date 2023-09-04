<?php

use App\Models\aa;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('list');
});

Route::get('/create', function () {
$maxh = " 17:00";
    $minh = " 8:00";
    $dayOfWeek = intval(date('w', strtotime(date('Y-m-d'))));

    $endOfWeek = ($dayOfWeek < 5) ?
        strtotime(date('Y-m-d', strtotime("next friday", strtotime(date('Y-m-d'))))) :
        strtotime(date('Y-m-d ') . $maxh);
//    dd(strtotime('17:00'),strtotime('16:00'));//1693753200,1693749600

    $this->now = strtotime(date('H:i', time()));// a mostani timestamp
    $dayOfWeek = intval(date('w', strtotime(date('Y-m-d'))));// a hét hányadik napja
//    dd($this->now,$this->now + 10*60*60,"ppppppppppppppp",date('D, d M Y H:i:s',1693759500),date('D, d M Y H:i:s',1693795500));// 1693759500,1693795500
//    dd($this->now < $endOfWeek);
    if (($this->now < $endOfWeek)&&($dayOfWeek>0&&$dayOfWeek<6)&&($this->now<strtotime($maxh)&&$this->now>strtotime($minh))) {
        return view('create');
    } else {
        return view('notCreate')->with('now', date('H:i'));
    }

});

Route::post('/create', 'App\Http\Controllers\TicketController@make');
Route::get('/list','App\Http\Controllers\TicketController@list')->name('list');
Route::get('/listall','App\Http\Controllers\TicketController@listAllTicket')->name('listall');
Route::get('/view/{id}','App\Http\Controllers\TicketController@viewOne');
Route::get('/ticketsuccess/{id}','App\Http\Controllers\TicketController@ticketSetSuccess');
Route::fallback(function () {
   return view('404');
});
