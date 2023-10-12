@extends('layouts.website')
@section('content')
    <div class="container py-5" >
      
       <div class="jumbotron">
        <h1 class="display-3">Dat hang thanh cong</h1>
        <p class="lead">Vui long check email {{Auth::guard('cus')->user()->email}}</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
       </div>
    </div>
@stop
