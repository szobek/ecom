@extends('master')
@section('content')

<div class="container">

    <div class="row ">
        <div class="col-md-offset-3 col-md-6">
            <form action="create" method="post" >

                <label for="name">megnevezés</label>  <input name="name" id="name"><br>
                <label for="desc">leírás</label> <input name="desc" id="desc"><br>
                <label for="deadl">határidő</label> <input type="number" name="deadl" id="deadl">

                <br>
                <p class="text-center">
                    <button>save</button>
                </p>


            </form>
        </div>
    </div>

</div>
@endsection
