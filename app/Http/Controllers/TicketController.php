<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    private $dt;
    private $maxh = " 19:00";

    private $endOfWeek;
    private $endOfDay;
    private $now;

    private function setDatesOfField()
    {
        $dayOfWeek = intval(date('w', strtotime(date('Y-m-d'))));
        $this->endOfWeek = ($dayOfWeek < 5) ? date('Y-m-d', strtotime("next friday", strtotime(date('Y-m-d')))) : strtotime(date('Y-m-d ') . $this->maxh);
        $this->endOfDay = strtotime(date('Y-m-d ') . $this->maxh);
        $this->now = strtotime(date('H:i'));

    }

    public function make(Request $request) : string
    {
        $this->setDatesOfField();
        $ticket = new Ticket();
        $ticket->name = $request->input('name');
        $ticket->description = $request->input('desc');
        $ticket->success = 0;
        $ticket->deadline = "";
        $ticket->save();
        return redirect()->route('list');

    }
public function listAllTicket():\Illuminate\View\View{
    $list = DB::table('tickets')->select('id', 'name', 'description', 'deadline','success')->get();
    return view('allTicketList')->with(['list' => $list]);

}

    public function list()
    {
//        $this->countDeadLine(8);
//
//        exit();
        //a "másik" megoldás,attól függ mi kell mert több adat van benne
//$datas = Ticket::where('success',0)->get();
//dd($datas);
        $this->dt = date("H:i");

        // az egyszerűbb változat
        $list = DB::table('tickets')->select('id', 'name', 'description', 'deadline','success')->where('success', 0)->get();
        return view('list')->with(['list' => $list, 'dt' => $this->dt]);

    }

    public function viewOne(int $id)
    {
        $taks = DB::table('tickets')->select('id', 'name', 'description', 'deadline','success')->where('id', $id)->first();
        if ($taks == null) {

            throw new \Exception('not found task');
        } else {

            return view('oneTask')->with("task", $taks);
        }

        return null;
    }

    private function countDeadLine(int $hour)
    {
        $this->now = intval(date('H:i', time()));// a mostani timestamp
        $dayOfWeek = intval(date('w', strtotime(date('Y-m-d'))));// a hét hányadik napja
        dd($this->now + $hour);
        if ($dayOfWeek>0&&$dayOfWeek < 5) {
            $nextFriday = date('Y-m-d', strtotime("next friday", strtotime(date('Y-m-d'))));


            if ($this->now + $hour <= intval($nextFriday . "17:00")) {

                print "mehet";
            } else {
                print "ezen a héten nem fér bele";
            }
        } else {
            print "péntek vagy hétvége van";
        }
        exit();

    }

    public function ticketSetSuccess(int $id) : string{
        DB::table('tickets')->where('id',$id)->update(["success"=>1]);
        return redirect()->route('list');
    }
}

