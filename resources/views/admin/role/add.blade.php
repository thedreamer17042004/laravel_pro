@extends('layouts.admin')
@section('title', 'Role')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Add Role</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="box-title">Add Role</h3>
                                </div>
                                <div class="col-md-6"
                                    style="display: flex;
                                justify-content: flex-end;">
                                    <a href="{{ route('admin.role.index') }}" id="" class="btn btn-danger"
                                        role="button">Back to View</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.role.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ old('name') }}">
                                </div>

                                <div class="form-group" style="height: 300px; overflow-y: auto">
                                    <h5>Routes</h5>
                                    @foreach ($routes as $route)
                                        <div class="form-check">
                                            <input class="form-check-input role-item" type="checkbox" name="route[]"
                                                value="{{ $route->id }}" id="{{ $route->id }}">
                                            <label class="form-check-label" for="{{ $route->id }}">
                                                {{ $route->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>

                              
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" name="" id="checkall" value="checkedValue">
                                    Check all
                                  </label>
                        
                                <button type="submit" style="margin-top: 5px;" class="btn btn-success">Add new</button>

                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop
@push('script')
    <script type="text/javascript">
        $("document").ready(function() {
            $('#checkall').click(function() {
            $('.role-item').not(this).prop('checked', this.checked)
            })

        });
    </script>
@endpush
