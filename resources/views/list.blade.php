@extends('master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">


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

                    <tr class="task-unsuccess">

                        <td>{{ $value->id }}</td>

                        <td><a href="/view/{{ $value->id }}">{{ $value->name }}</a></td>

                        <td>{{ $value->description }}</td>
                        <td>{{ $value->deadline }}</td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <p class="d-flex justify-content-center">

                <a href="/create" class="btn btn-primary">Új bejegyzés</a>
            </p>
        </div>
    </div>
</div>
@endsection
