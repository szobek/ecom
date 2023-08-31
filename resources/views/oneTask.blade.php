@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            név:  {{ $task->name }}
        </div>
        <div class="card-body">
            leírás: {{$task->description}}
        </div>
        <div class="card-footer">

            határidő: {{$task->border}}
        </div>
    </div>



@endsection
