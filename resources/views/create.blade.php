@extends('master')
@section('content')

    <div class="container form-container" >

        <div class="row ">
            <div class="col-md-offset-3 col-md-6">

                <form action="create" method="post">
                    <div class="row">
                        <div class="col-md-12 col-offset-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">megnevezés</label>

                                </div>
                                <div class="col-6">

                                    <input name="name" id="name" placeholder="name">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-offset-4">
                            <div class="row ">
                                <div class="col-6">
                                    <label for="desc">leírás</label>
                                </div>
                                <div class="col-6">

                                    <input name="desc" id="desc" placeholder="descripion">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-offset-4">
                            <div class="row ">
                                <div class="col-6"><label for="deadl">határidő</label></div>
                                <div class="col-6"><input type="number" name="deadl" id="deadl"></div>

                            </div>
                        </div>
                    </div>


                    <br>
                    <p class="text-center">
                        <button class="btn btn-success">save</button>
                    </p>


                </form>
            </div>
        </div>

    </div>
@endsection
