@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<!-- Left side column. contains the logo and sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-2 text-center">
                <p><i class="fa fa-exclamation-triangle fa-5x"></i><br/>Status Code: {{$config['code']}}</p>
           </div>
           <div class="col-md-10">
                <h3>OPPSSS!!!! Sorry...</h3>
                <p>Sorry, your access is refused due to security reasons of our server and also our sensitive data.<br/>Please go back to the previous page to continue browsing.</p>
           </div>
       </div>

    </section>
    <!-- /.content -->
</div>

@stop

