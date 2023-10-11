@extends('layouts.website')
@section('content')
<div class="container py-5">
   <tr style="margin: 10px 0px;">
   <button type="button" style="margin-bottom: 15px;" class="btn btn-info">Tiep tuc mua hang</button>
       <button type="button" style="margin-bottom: 15px;" class="btn btn-success">Cap nhat gio hang</button>
   </tr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Ho ten</th>
            <th>tuoi</th>
            <th>dia chi</th>
            <th>So dien thoai</th>
            <th>So luong</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td >Nguyen van nam</td>
            <td>20</td>
            <td>trung tien</td>
            <td>04938984334</td>
            <td>
                <input type="text" value="1">
            </td>
            <td>
                12
            </td>
            <td>

            
            <button type="button" class="btn btn-danger">Xoa</button>
            
            </td>
        </tr>
       
       
     
       
    </tbody>
   
</table>
<h3>Total price: 100.00vn</h3>

<button type="button" class="btn btn-warning">Tien hanh thanh toan</button>

</div>
@stop