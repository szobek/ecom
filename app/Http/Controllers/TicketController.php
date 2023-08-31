<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{


    public function make(Request $request){
$ticket = new Ticket();
$ticket->name=$request->input('name');
$ticket->description=$request->input('desc');
$ticket->success=0;
$ticket->save();
        return redirect()->route('list');
    }


    public function list(){
        $list =  DB::table('tickets')->select('id','name','description','deadline')->get();
return view('list')->with('list',$list);

    }

    public function viewOne(int $id){
        $taks =  DB::table('tickets')->select('id','name','description','deadline')->where('id',$id)->first();
        if($taks==null){
            //print '<h1>Nincs ilyen</h1>';
            throw new \Exception('not found task');
        } else{

           return view('oneTask')->with("task",$taks);
        }

return null;
    }



}
