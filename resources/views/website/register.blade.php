<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
crossorigin="anonymous" referrerpolicy="no-referrer" />



<div class="card bg-light" style="height: 100%;">
    <article class="card-body mx-auto" style="width: 600px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <form action="{{route('post_register')}}" method="POST">
			@csrf
			@if ($errors->has('email'))
				<div class="error">{{ $errors->first('name') }}</div>
			@endif
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control" value="{{old('name')}}" placeholder="Name" type="text">
				
            </div> <!-- form-group// -->
			@if ($errors->has('email'))
				<div class="error">{{ $errors->first('email') }}</div>
			@endif
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control"  value="{{old('email')}}" placeholder="Email address" type="email">
				
            </div> <!-- form-group// -->
			
			@if ($errors->has('password'))
			<div class="error">{{ $errors->first('password') }}</div>
		@endif
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="Create password"  value="{{old('password')}}" name="password" type="password">
			
            </div> <!-- form-group// -->
		

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
            </div> <!-- form-group// -->
            <p class="text-center">Have an account? <a href="{{ route('loginPage') }}">Log In</a> </p>
        </form>
    </article>
</div> <!-- card.// -->

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('message_register'))
<script>
  toastr.options = {
    "progressBar": true,
    "closeButton": true
  }
  toastr.error("{{Session::get('message_register')}}", 'Success', {timeOut:12000});
</script>
@endif