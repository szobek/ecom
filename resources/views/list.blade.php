@extends('master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-auto">

            <p>{{$dt}}</p>
            <h2 class="text-center">Tickets</h2>


            <table class="table table-bordered">

                <thead>

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>deadline</th>
                </tr>

                </thead>

                <tbody>
                @foreach($list as $value)

                    <tr>

                        <td>{{ $value->id }}</td>

                        <td>{{ $value->name }}</td>

                        <td>{{ $value->description }}</td>
                        <td>{{ $value->deadline }}</td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <a href="/create" class="btn btn-primary">Új bejegyzés</a>
        </div>
    </div>
</div>
@endsection
