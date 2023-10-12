<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Mail\ConfirmOrder;
use App\Models\Orders;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{




  public function index(Cart $cart)
  {
    $cartItems = $cart->list();
    $price = $cart->getTotalPrice();

    return view('website.checkout', compact('cartItems', 'price'));
  }
  public function form()
  {
 

    return view('website.checkoutsuccess');
  }
  public function submit_form(Request $req, Cart $cart)
  {
    $c_id = Auth::guard('cus')->user()->id;

    if ($order = Orders::create([
      'customer_id' => $c_id,
      'name' => $req->name,
      'phone' => number_format($req->phone),
      'address' => $req->address
    ])) 
    {
      $order_id = $order->id;
      foreach ($cart->list() as $product_id => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];
        Order_detail::create([
          'order_id' => $order_id,
          'product_id' => $product_id,
          'price' => $price,
          'quantity' => $quantity
        ]);
      }



    try {
      $email_ = Auth::guard('cus')->user()->email;
    
      FacadesMail::to($email_)->send(new ConfirmOrder($cart->list(), $order, $req->name));
     

  } catch (\Exception $err) {
    
    dd($err);
    return 'Khong the gui mail';
  }
      session(['cart' => '']);

      return redirect()->route('checkout.success')->with('checkout.success', 'tao don hang thanh cong');
    }else {
      return redirect()->back()->with('checkout.error', 'tao don hang that bai');

    }
  }
}
