<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    private $dt;
    private $minh=8;
    private $maxh=22;

    public function make(Request $request)
    {
        $this->dt = intval( date('H'));
        //dd($this->dt > $this->minh && $this->dt < $this->maxh);
        if ($this->dt > $this->minh && $this->dt < $this->maxh) {
            $ticket = new Ticket();
            $ticket->name = $request->input('name');
            $ticket->description = $request->input('desc');
            $ticket->success = 0;
            $ticket->deadline="2023-09-04 15:55";
            $ticket->save();
            return redirect()->route('list');

        } else {
            print '<h1 >Nem lehet most felvinni</h1><br>  <a href="/list">Tovább</a>';
        }

    }


    public function list()
    {

        //a "másik" megoldás,attól függ mi kell mert több adat van benne
//$datas = Ticket::where('success',0)->get();
//dd($datas);
        $dt = date('H');

        // az egyszerűbb változat
        $list = DB::table('tickets')->select('id', 'name', 'description', 'deadline')->where('success',0)->get();
        return view('list')->with(['list' => $list, 'dt' => $dt]);

    }

    public function viewOne(int $id)
    {
        $taks = DB::table('tickets')->select('id', 'name', 'description', 'deadline')->where('id', $id)->first();
        if ($taks == null) {

            throw new \Exception('not found task');
        } else {

            return view('oneTask')->with("task", $taks);
        }

        return null;
    }


}
