@extends('layouts.admin')
@section('title', 'User')

@section('content')
<!-- Left side column. contains the logo and sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User table</h3>
                    <a name="" style="float: right;" id="" class="btn btn-primary"
                        href="{{ route('admin.user.create') }}" role="button"><i class="fa fa-plus"
                            aria-hidden="true"></i>Add new</a>

                </div>
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Stt</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Avatar</th>
                    <th>Role</th>
                  </tr>
                  </thead>
                  <tbody>


                    @foreach($users as $user)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td >
                       {{$user->name}}
                    </td>
                    <td >
                       {{$user->email}}
                    </td>
                    @if($user->status == 1)
                    <td >
                     Active
                    </td>
                    @else
                    <td>
                        Inactive
                    </td>
                    @endif
                    <td >
                      <img src="{{asset('/admin/images/admin/')}}/{{$user->avartar}}" width="70px" alt="">
                    </td>
                    <td >
                      @foreach($user->roles as $role)
                      <li>{{$role->name}}</li>
                       @endforeach
                    </td>
                    <td >
                        <a name="" id="" class="btn btn-primary" href="{{route('admin.user.edit', $user->id)}}" role="button">Edit</a>
                        <a name="" id="" class="btn btn-danger" href="{{route('admin.user.delete', $user->id)}}" onclick="return confirm('Are you sure?...')" role="button">Delete</a>
                    </td>
                    
                  </tr>
                  @endforeach
                  
                  </tbody>
                 
                </table>
                {{ $users->withQueryString()->links() }}
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
</div>

@stop

@push('script')
@if(Session::has('logined'))
<script>
  toastr.options = {
    "progressBar": true,
    "closeButton": true
  }
  toastr.success("{{Session::get('logined')}}", 'Success', {timeOut:12000});
</script>
@endif

@endpush