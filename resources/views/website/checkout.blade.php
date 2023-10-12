@extends('layouts.website')
@section('content')
    <div class="container py-5">
      
        <h3>Form dat hang</h3>
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('checkout.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="name" value="{{Auth::guard('cus')->user()->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                
                    <div class="form-group">

                      <input type="text" class="form-control" name="phone" value="" placeholder="Your phone">
                    </div>
                    <div class="form-group">

                      <input type="text" class="form-control" name="address" value="" id="exampleInputPassword1" placeholder="Your address">
                    </div>
                  <button type="submit" class="btn btn-danger">Dat hang</button>

                  </form>
            </div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $value => $cart)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cart['name'] }}</td>
                                <td>
                                    <img src="{{ asset('admin/images/admin') }}/{{ $cart['image'] }}" width="100px" alt="">
                                </td>
                                <td>{{ $cart['price'] }}</td>
        
                                <td>
                                    <form action="{{ route('cart.update', $cart['product_id']) }}" method="POST">
                                        @csrf
                                        <input type="text" name="quantity" value="{{ $cart['quantity'] }}">
                                    </form>
        
                                </td>
                                <td>
                                    {{ $cart['price'] * $cart['quantity'] }}
                                </td>
                               
                            </tr>
                        @endforeach
        
                    </tbody>
        
                </table>
                <h3>Total price: {{ $price }}</h3>
            </div>
        </div>

    </div>
@stop
