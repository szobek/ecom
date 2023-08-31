<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{


    public function make(){

    }


    public function list(){
        $list =  DB::table('flights')->select('id','name','description','border')->get();
return view('list')->with('list',$list);

    }

    public function viewOne(int $id){
        $taks =  DB::table('flights')->select('id','name','description','border')->where('id',$id)->first();
        if($taks==null){
            //print '<h1>Nincs ilyen</h1>';
            throw new \Exception('not found task');
        } else{

           return view('oneTask')->with("task",$taks);
        }

return null;
    }



}
