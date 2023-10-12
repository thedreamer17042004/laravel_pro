<?php

namespace App\Http\Controllers;
use App\Helper\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('cus');
    }
    public function index(Cart $cart) {

        $cartItems = $cart->list();
        $price = $cart->getTotalPrice();
      return view('website.cart', compact('cartItems', 'price'));
    }
    public function add(Request $request, Cart $cart) {
        $product = Product::find($request->id);
        $quantity = $request->quantity;
        $cart->add($product, $quantity);

        return redirect()->route('cartPage');
    }

    public function remove(Cart $cart , $id) {
        $cart->remove($id);

        return redirect()->back();
    }
    public function update(Cart $cart , $id) {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);

        return redirect()->back();
    }
    public function clear(Cart $cart) {
        $cart->clear();

        return redirect()->back();
    }
}
