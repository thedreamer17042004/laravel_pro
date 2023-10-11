@extends('layouts.admin')

@section('title', 'Product')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Add Product</a></li>
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
                                <h3 class="box-title">Add Product</h3>
                            </div>
                            <div class="col-md-6" style="display: flex;
                            justify-content: flex-end;">
                                <a href="{{route('admin.product.index')}}" id="" class="btn btn-danger"  role="button">Back to View</a>
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
                            <form action="{{ route('admin.product.update', ['id'=> $value->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="add_product" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $value->name }}">
                                        
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="add_image" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $value->image }}">
                                        <img width="90px;" src="{{ asset('admin/images/admin/')}}/{{ $value->image }}" alt="">
                                </div>
                               <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" class="form-control" name="add_price" id=""
                                            aria-describedby="helpId" placeholder="" value="{{ $value->price }}">
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class=" w-100">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                        </div>
                                        <select name="Business_Type" style="width: -webkit-fill-available !important;height: 34px;" class="custom-select" id="inputGroupSelect01">
                                          <option disabled selected>Choose...</option>
                                          @foreach($category as $pro)
                                            <option  value="{{$pro->id}}" {{$pro->id == $value->category_id ? 'selected': ''}} >{{$pro->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                               </div>
                               <label for="">Description</label>
                                <div class="form-group">
                                    <textarea style="width: -webkit-fill-available !important;" name="description" id="" cols="30" rows="10">
                                        {{ltrim($value->description);}}
                                    </textarea>
                                </div>
                              
                                <button type="submit" style="margin-top: 5px;width:100%;" class="btn btn-danger">Update</button>

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
