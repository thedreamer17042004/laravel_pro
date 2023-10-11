@extends('layouts.admin')
@section('title', 'Category')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Edit Category</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if (count($errors))
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.category.update', ['id' => $id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" method="put">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="update_name" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $result->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Slug</label>
                                    <input type="text" class="form-control" name="slug_" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $result->slug }}">
                                </div>
                                <button type="submit" style="margin-top: 5px;" class="btn btn-success">Update</button>

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
