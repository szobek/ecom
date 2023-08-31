@extends('master')


@section('content')
<div class="container">

    <h2 class="text-center">Tickets</h2>


    <table class="table table-bordered">

        <thead>

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Border</th>
        </tr>

        </thead>

        <tbody>
        @foreach($list as $value)

            <tr>

                <td>{{ $value->id }}</td>

                <td>{{ $value->name }}</td>

                <td>{{ $value->description }}</td>
                <td>{{ $value->border }}</td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>
@endsection
