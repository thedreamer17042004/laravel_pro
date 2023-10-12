
<h1>Xin chao ban {{$name}}</h1>
<p>
    <b>Cam on ban da dat hang tai cua hang cua chung toi</b>
</p>
<h5>Thong tin don hang cua ban la</h5>
<h5>Ma don hang: {{$order->id}}</h5>
<h4>Chi tiet san pham</h4>


<table  border="1px" cellspacing="0" cellpadding="12" width="400">
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
        @foreach ($cart as $value => $cart)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cart['name'] }}</td>
                <td>
                    <img src="{{ asset('admin/images/admin') }}/{{ $cart['image'] }}" width="100px" alt="">
                </td>
                <td>{{ $cart['price'] }}</td>

                <td>
                  
                    {{ $cart['quantity'] }}
                    
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