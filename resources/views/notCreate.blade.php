@extends('master')

@section('content')
    <div class="container not-create-container">
        <div class="row">
            <div class="col-8 col-offset-3">
                <h4 >Nem lehet most felvinni (csak 8-17-ig. Most: {{$now}}) </h4><br>  <a href="/list" class="btn btn-primary">Tovább</a>
            </div>
        </div>
    </div>

@endsection
