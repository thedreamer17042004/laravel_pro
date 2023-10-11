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
                <li><a href="#">Product</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Product table</h3>
                            <a href="{{route('admin.product.create')}}" style="float: right;" id="" class="btn btn-primary" 
                                role="button"><i class="fa fa-plus" aria-hidden="true"></i>Add new</a>

                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" style="display: flex;align-items: center"
                                        id="example1_length">
                                        <label
                                            style="    display: flex;
                                        align-items: center;">Show

                                        </label>
                                        <form method="get" style="display: flex;align-items: center"
                                            action="{{ route('admin.showCategorySort') }}">
                                            @if (request()->has('name', 'id'))
                                                <input type="hidden" class="form-control" name="name" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $name }}">
                                                <input type="hidden" class="form-control" name="id" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $id }}">
                                            @endif
                                            <select name="myselect" id="form_select" aria-controls="example1"
                                                class="form-control input-sm">


                                                <option disabled selected> -- select an option -- </option>

                                              <option value="1">1</option>
                                              <option value="1">2</option>
                                              <option value="1">3</option>
                                              <option value="1">4</option>


                                            </select> entries

                                            <input type="submit" value="Submit Form" class="btn btn-success" />
                                        </form>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <form action="" method="get">
                                        <div id="example1_filter" style="float: right" class="dataTables_filter">
                                            <label
                                                style="display: flex;
                                            align-items: center;">Search:
                                                <input
                                                    style="margin-left: 7px;
                                            "
                                                    type="search" name="search_data" value=""
                                                    class="form-control input-sm" placeholder="" aria-controls="example1">
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>

                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id
                                               
                                            </th>
                                            <th>Name
                                               
                                            </th>
                                            <th>Image
                                               
                                            </th>

                                            <th>Slug
                                             
                                            </th>
                                          
                                            <th>Price

                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                CategoryName
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $pro)
                                        <tr>
                                            <td>{{$pro->id}}</td>
                                            <td>{{$pro->name}}</td>
                                            <td>
                                                <img width="50px;" src="{{asset('admin/images/admin')}}/{{$pro->image}}" alt="">
                                            </td>
                                            <td>{{$pro->slug}}</td>
                                            <td>{{$pro->price}}</td>
                                            <td>{{$pro->description}}</td>
                                            <td>{{$pro->category()->first()->name}}</td>
                                            <td style="display: flex;">
                                                {{-- <a name="" id="" class="btn btn-warning" href="#" role="button">View</a>
                                                <a name="" id="" class="btn btn-danger" href="#" role="button">Edit</a>
                                                <a name="" id="" class="btn btn-success" href="#" role="button">Delete</a> --}}
                                               <a href="{{route('admin.product.show', ['id'=>$pro->id])}}"> <i style="padding: 5px; cursor: pointer;color: green;" class="glyphicon glyphicon-eye-open"></i></a>
                                                <a href="{{route('admin.product.edit', ['id'=>$pro->id])}}"><i style="padding: 5px; cursor: pointer;color: blue;" class="glyphicon glyphicon-edit"></i></a>
                                                <a href="{{route('admin.product.delete', ['id'=>$pro->id])}}" onclick="return confirm('Are you sure?')"><i style="padding: 5px; cursor: pointer;" class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                  



                                </table>
                                {{ $products->withQueryString()->links() }}
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
