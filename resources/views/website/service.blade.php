@extends('layouts.website')
@section('content')

@include('website.includes.all_banner')


@include('website.includes.index_service')


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<h2 class="mb-4">Hot Meals</h2>
				<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
				<p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			@foreach($produ as $pro)
			<div class="col-md-3 text-center ftco-animate">
				<div class="menu-wrap">
					<a href="#" class="menu-img img mb-4" style="background-image: url({{asset('admin/images/admin')}}/{{$pro->image}});"></a>
					<div class="text">
						<h3><a href="#">{{$pro->name}}</a></h3>
						<p>{{$pro->description}}</p>
						<p class="price"><span>${{$pro->price}}</span></p>
						<p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
					</div>
				</div>
			</div>

			@endforeach
			
		</div>
	</div>
</section>
@stop