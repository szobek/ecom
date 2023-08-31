@extends('master')
@section('content')
<div>

    <form action="create" method="post" >

        <label for="name">megnevezés</label>  <input name="name" id="name"><br>
        <label for="desc">leírás</label> <input name="desc" id="desc"><br>
        <label for="deadl">határidő</label> <input type="number" name="deadl" id="deadl">

<button>save</button>

    </form>
</div>
@endsection
