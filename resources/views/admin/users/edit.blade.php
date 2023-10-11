@extends('layouts.admin')
@section('title', 'User')
@push('style')
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endpush
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Add User</a></li>
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
                                    <h3 class="box-title">Update User</h3>
                                </div>
                                <div class="col-md-6"
                                    style="display: flex;
                                justify-content: flex-end;">
                                    <a href="{{ route('admin.user.index') }}" id="" class="btn btn-danger"
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
                            <form action="{{ route('admin.user.update', $users->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- @method('PUT') --}}
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $users->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $users->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Avatar</label>

                                    <input type="file" class="form-control-file" name="avartar" id=""
                                        placeholder="" aria-describedby="fileHelpId">

                                    <img width="60px;" src="{{ asset('/admin/images/admin/') }}/{{ $users->avartar }}"
                                        alt="">
                                </div>
                                <div class="form-group">

                                    <label for="" style="display: block"> Status</label>
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            {{ !$users->status ? 'checked' : '' }} id="" value="0">
                                        Inactive
                                    </label>
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            {{ $users->status ? 'checked' : '' }} id="" value="1">
                                        Active
                                    </label>


                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>

                                    <select class="form-select" name="roles[]" id="multiple-select-field"
                                        data-placeholder="Choose anything" multiple>
                                        {{-- @foreach ($role_user as $key) --}}

                                        {{-- {{ $key == $role->id ? 'selected' : '' }} --}}
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            {{in_array($role->id, $role_user) ? 'selected' : ''}}
                                            >{{ $role->name }}</option>
                                        @endforeach
                                       
                                    {{-- @endforeach --}}
                                       
                                    </select>

                                </div>
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endpush
