@extends('layouts.website')
@section('content')
    <div class="container py-5">
        <tr style="margin: 10px 0px;">
            <a href="#shop_home" style="margin-bottom: 15px;" class="btn btn-info">Tiep tuc mua hang</a>
        </tr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
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
                                <button type="submit" class="btn btn-success">Cap nhat gio hang</button>
                            </form>

                        </td>
                        <td>
                            {{ $cart['price'] * $cart['quantity'] }}
                        </td>
                        <td>


                            <a href="{{ route('cart.remove', $cart['product_id']) }}"
                                onclick="return confirm('Are you sure??')" class="btn btn-danger">Xoa</a>

                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <h3>Total price: {{ $price }}</h3>

        <a href="{{route('checkout.index')}}" class="btn btn-warning">Tien hanh thanh toan</button>

        <a name="" id="" class="btn btn-primary" href="{{ route('cart.clear') }}" role="button">Clear all
            cart</a>
            



    </div>
@stop
