@extends('layouts.admin')

@section('title', 'Post')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Add Post</a></li>
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
                                <h3 class="box-title">Add Post</h3>
                            </div>
                            <div class="col-md-6" style="display: flex;
                            justify-content: flex-end;">
                                <a href="{{route('admin.post.index')}}" id="" class="btn btn-danger"  role="button">Back to View</a>
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
                            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ old('name') }}">
                                        
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ old('image') }}">
                                </div>
                              
                               <label for="">Content</label>
                                <div class="form-group">
                                    <textarea style="width: -webkit-fill-available !important;" name="content" id="" cols="30" rows="10"></textarea>
                                </div>
                              
                                <button type="submit" style="margin-top: 5px;width:100%;" class="btn btn-success">Add new</button>

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
