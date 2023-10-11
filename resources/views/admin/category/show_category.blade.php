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
                <li><a href="#">Category</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Category table</h3>
                            <a name="" style="float: right;" id="" class="btn btn-primary"
                                href="{{ route('admin.category.create') }}" role="button"><i class="fa fa-plus"
                                    aria-hidden="true"></i>Add new</a>

                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" style="display: flex;align-items: center" id="example1_length">
                                        <label
                                            style="    display: flex;
                                        align-items: center;">Show

                                        </label>
                                        <form method="get" style="display: flex;align-items: center" action="{{ route('admin.showCategorySort') }}">
                                            @if (request()->has('name', 'id'))
                                                <input type="hidden" class="form-control" name="name" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $name }}">
                                                <input type="hidden" class="form-control" name="id" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $id }}">
                                            @endif
                                            <select name="myselect" id="form_select" aria-controls="example1"
                                                class="form-control input-sm">


                                                <option disabled selected> -- select an option -- </option>

                                                @foreach ($option as $item => $items)
                                                    <option value="{{ $items }}"
                                                        @if ($items == $myselect) selected="selected" @endif>
                                                        {{ $items }}</option>
                                                @endforeach


                                            </select> entries

                                            <input type="submit" value="Submit Form" class="btn btn-success" />
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{ route('admin.showCategorySort') }}" method="get">
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
                            {{-- @if (Session::has('wrong'))
                                <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <strong>Opps !</strong> {{ Session::get('wrong') }}
                                </div>
                                <br>
                            @endif
                            @if (Session::has('success'))
                                <div class="success">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <strong>Congrats !</strong> {{ Session::get('success') }}
                                </div>
                                <br>
                            @endif --}}
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            {{-- <h6>Showing {{$from}} to {{$to}} of {{$total}} entries</h6> --}}
                           





                            @if($category->isNotEmpty()) 
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        {{-- <tr>
                                            <th>Stt
                                                <span style="float: right">
                                                    <i class="fa fa-arrow-up" style="cursor: pointer"  data-action="asc"
                                                        id="up"></i>
                                                    <i class="fa fa-arrow-down" style="cursor: pointer" data-action="desc"
                                                        id="up"></i>
                                                </span>
                                            </th>
                                            <th>Name
                                                <span style="float: right">
                                                    <i class="fa fa-arrow-up" data-action="asc" style="cursor: pointer"></i>
                                                    <i class="fa fa-arrow-down" data-action="desc" style="cursor: pointer"></i>
                                                </span>
                                            </th>
                                            <th>Slug
                                                <span style="float: right">
                                                    <i class="fa fa-arrow-up" data-action="asc" style="cursor: pointer"></i>
                                                    <i class="fa fa-arrow-down" data-action="desc" style="cursor: pointer"></i>
                                                </span>
                                            </th>
                                            <th>Created at
                                                <span style="float: right">
                                                    <i class="fa fa-arrow-up" data-action="asc" style="cursor: pointer"></i>
                                                    <i class="fa fa-arrow-down" data-action="desc" style="cursor: pointer"></i>
                                                </span>
                                            </th>
                                            <th>Action
    
                                            </th>
                                        </tr> --}}
    
                                        <tr>
                                            <th>Stt
                                                <span style="display: flex;float: right">
                                                    <form
                                                        action="{{ route('admin.showCategorySort', ['name' => 'asc', 'id' => 'id']) }}"
                                                        method="get">
                                                        <input type="hidden" class="form-control" name="name" id=""
                                                            aria-describedby="helpId" placeholder="" value="asc">
                                                        <input type="hidden" class="form-control" name="id" id=""
                                                            aria-describedby="helpId" placeholder="" value="id">
                                                        @if (request()->has('myselect'))
                                                            <input type="hidden" class="form-control" name="myselect"
                                                                id="" aria-describedby="helpId" placeholder=""
                                                                value="{{ $myselect }}">
                                                        @endif
                            </div>
                            <button type="submit" class="btnn" style="margin-top: 5px;">
                                <i class="fa fa-arrow-up" style="cursor: pointer"></i>
                            </button>
                            </form>
                            <form action="{{ route('admin.showCategorySort', ['name' => 'desc', 'id' => 'id']) }}" method="get">
                                <input type="hidden" class="form-control" name="name" id=""
                                    aria-describedby="helpId" placeholder="" value="desc">
                                <input type="hidden" class="form-control" name="id" id=""
                                    aria-describedby="helpId" placeholder="" value="id">
                                @if (request()->has('myselect'))
                                    <input type="hidden" class="form-control" name="myselect" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $myselect }}">
                                @endif
                        </div>
                        <button type="submit" class="btnn" style="margin-top: 5px;">
                            <i class="fa fa-arrow-down" style="cursor: pointer"></i>
                        </button>
    
                        </form>
    
                        </span>
                        </th>
                        <th>Name
                            <span style="display: flex;float: right">
                                <form action="{{ route('admin.showCategorySort') }}" method="get">
                                    <input type="hidden" class="form-control" name="name" id=""
                                        aria-describedby="helpId" placeholder="" value="asc">
                                    <input type="hidden" class="form-control" name="id" id=""
                                        aria-describedby="helpId" placeholder="" value="name">
                                    @if (request()->has('myselect'))
                                        <input type="hidden" class="form-control" name="myselect" id=""
                                            aria-describedby="helpId" placeholder="" value="{{ $myselect }}">
                                    @endif
                    </div>
                    <button type="submit" class="btnn" style="margin-top: 5px;">
                        <i class="fa fa-arrow-up" style="cursor: pointer"></i>
                    </button>
                    </form>
                    <form action="{{ route('admin.showCategorySort', ['name' => 'desc', 'id' => 'name']) }}" method="get">
                        <input type="hidden" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="" value="desc">
                        <input type="hidden" class="form-control" name="id" id="" aria-describedby="helpId"
                            placeholder="" value="name">
                        @if (request()->has('myselect'))
                            <input type="hidden" class="form-control" name="myselect" id=""
                                aria-describedby="helpId" placeholder="" value="{{ $myselect }}">
                        @endif
                </div>
                <button type="submit" class="btnn" style="margin-top: 5px;">
                    <i class="fa fa-arrow-down" style="cursor: pointer"></i>
                </button>
    
                </form>
    
                </span>
                </th>
                <th>Slug
                    <span style="display: flex;float: right">
                        <form action="{{ route('admin.showCategorySort', ['name' => 'asc', 'id' => 'slug']) }}" method="get">
                            <input type="hidden" class="form-control" name="name" id=""
                                aria-describedby="helpId" placeholder="" value="asc">
                            <input type="hidden" class="form-control" name="id" id=""
                                aria-describedby="helpId" placeholder="" value="slug">
                            @if (request()->has('myselect'))
                                <input type="hidden" class="form-control" name="myselect" id=""
                                    aria-describedby="helpId" placeholder="" value="{{ $myselect }}">
                            @endif
        </div>
        <button type="submit" class="btnn" style="margin-top: 5px;">
            <i class="fa fa-arrow-up" style="cursor: pointer"></i>
        </button>
        </form>
        <form action="{{ route('admin.showCategorySort', ['name' => 'desc', 'id' => 'slug']) }}" method="get">
            <input type="hidden" class="form-control" name="name" id="" aria-describedby="helpId"
                placeholder="" value="desc">
            <input type="hidden" class="form-control" name="id" id="" aria-describedby="helpId"
                placeholder="" value="slug">
            @if (request()->has('myselect'))
                <input type="hidden" class="form-control" name="myselect" id="" aria-describedby="helpId"
                    placeholder="" value="{{ $myselect }}">
            @endif
            </div>
            <button type="submit" class="btnn" style="margin-top: 5px;">
                <i class="fa fa-arrow-down" style="cursor: pointer"></i>
            </button>
    
        </form>
    
        </span>
        </th>
        <th>Created at
            <span style="display: flex;float: right">
                <form action="{{ route('admin.showCategorySort') }}" method="get">
                    <input type="hidden" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" value="asc">
                    <input type="hidden" class="form-control" name="id" id="" aria-describedby="helpId"
                        placeholder="" value="created_at">
    
    
                    @if (request()->has('myselect'))
                        <input type="hidden" class="form-control" name="myselect" id="" aria-describedby="helpId"
                            placeholder="" value="{{ $myselect }}">
                    @endif
    
                    </div>
                    <button type="submit" class="btnn" style="margin-top: 5px;">
                        <i class="fa fa-arrow-up" style="cursor: pointer"></i>
                    </button>
                </form>
                <form action="{{ route('admin.showCategorySort', ['name' => 'desc', 'id' => 'created_at']) }}" method="get">
                    <input type="hidden" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" value="desc">
                    <input type="hidden" class="form-control" name="id" id="" aria-describedby="helpId"
                        placeholder="" value="created_at">
                    </div>
                    @if (request()->has('myselect'))
                        <input type="hidden" class="form-control" name="myselect" id="" aria-describedby="helpId"
                            placeholder="" value="{{ $myselect }}">
                    @endif
                    <button type="submit" class="btnn" style="margin-top: 5px;">
                        <i class="fa fa-arrow-down" style="cursor: pointer"></i>
                    </button>
    
                </form>
    
            </span>
        </th>
        <th>
            Number of Products
        </th>
        <th>Action
    
        </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td> {{ $item->created_at }} </td>
                    <td>{{  $item->products()->count() }}</td>
                    <td>
                        <a class="btn btn-danger" id="editCompany" data-toggle="modal" data-target='#practice_modal'
                            data-id="{{ $item->id }}">View</a>
                        <a name="" id="" class="btn btn-primary"
                            href="{{ route('admin.category.edit', ['id' => $item->id]) }}" role="button">Edit</a>
                        <a name="" id="" onclick="return confirm('Are you sure?')" class="btn btn-success"
                            href="{{ route('admin.category.delete', ['id' => $item->id]) }}" role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
    
    
    
    
        </tbody>
    
    
    
        </table>
                            @else 
                            <div>
                                <h2>No category found</h2>
                            </div>
                        @endif




    <table class="table table-hover" id="ajaxView" style="display:none">
        <thead>
            <tr>
                <th>Stt

                </th>
                <th>Name

                </th>
                <th>Slug

                </th>
                <th>Created at

                </th>
                <th>Action

                </th>
            </tr>
        </thead>
        <tbody id="user-list">



        </tbody>


    </table>

    <div class="d-flex" style="display: flex;justify-content: space-between;align-items: center">
        {{-- {!! $category->withQueryString()->links() !!} --}}
        @if (!request()->has('search_data'))
            {{ $category->withQueryString()->links() }}
        @endif
        @if (!request()->has('search_data'))
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing
                {{ $from }}
                to {{ $to }} of {{ $total }} entries</div>
    </div>
    @endif

    <div class="modal fade" id="practice_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 23px;display: inline;">Category
                        Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><span id="category_name"></span></td>
                                <td><span id="category_slug"></span></td>
                                <td><span id="category_created_at"></span></td>
                                <td><span id="category_updated_at"></span></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
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

            $('body').on('click', '#editCompany', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: 'category/' + id,
                    success: function(data) {
                        console.log(data);
                        $('#category_name').text(data.data.name);
                        $('#category_slug').text(data.data.slug);
                        $('#category_created_at').text(data.data.created_at);
                        $('#category_updated_at').text(data.data.updated_at);

                    },
                    error: function() {
                        console.log(data);
                    }
                });
            });




        });
    </script>
@endpush
