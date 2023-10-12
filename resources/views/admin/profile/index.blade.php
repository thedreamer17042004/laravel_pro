@extends('layouts.admin')
@section('title', 'Product')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">My profile</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Profile Page</h3>
                            {{-- <a href="{{route('admin.post.create')}}" style="float: right;" id="" class="btn btn-primary" 
                                role="button"><i class="fa fa-plus" aria-hidden="true"></i>Add new</a> --}}

                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="row">



                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif  

<form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="" value="{{ $data->name }}">
                                            
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" id=""
                                            aria-describedby="helpId" placeholder="" value="{{ $data->email }}">
                                            
                                    </div>
                                </div>
                               </div>
                                <div class="form-group">
                                    <label for="">Avartar</label>
                                    <input type="file" class="form-control" name="image" id=""
                                        aria-describedby="helpId" placeholder="" >
                                        <img src="{{'admin/images/admin'}}/{{$data->avartar}}" alt="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Old password</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                aria-describedby="helpId" placeholder="" value="">
                                                
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">New password</label>
                                            <input type="text" class="form-control" name="email" id=""
                                                aria-describedby="helpId" placeholder="" value="">
                                                
                                        </div>
                                    </div>
                                   </div>
                              
                                <button type="submit" style="margin-top: 5px;width:100%;" disabled class="btn btn-success">Save change</button>

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
    <!-- Button trigger modal -->

    <!-- Modal -->

@stop
@push('script')
    <script>
        // remove notification
        $("document").ready(function() {
            var fullUrl = window.location.href;
            console.log(fullUrl);
            setTimeout(function() {
                $("div.alert").remove();
            }, 3000);

        });
    </script>
@endpush
