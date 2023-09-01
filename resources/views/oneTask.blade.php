@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            név:  {{ $task->name }}
        </div>
        <div class="card-body">
            leírás: {{$task->description}}
            @if($task->success==0)
            <a href="/ticketsuccess/{{$task->id}}">késznek jelöl</a>
            @endif
        </div>
        <div class="card-footer">

            határidő: {{$task->deadline}}
        </div>
    </div>



@endsection
