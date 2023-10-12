<?php 

namespace App\Helper;

class Cart 
{
    private $items = [];

    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart'): [];
    }

    // phuong thuc lay ve danh sach san pham trong gio hang
    public function list() {
        return $this->items;
    }

    // them moi san pham vao gio hang
    public function add($product, $quantity = 1) {
        $item = [
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'image'=>$product->image,
            'quantity' => $quantity
        ];

        if(isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        }else{
            $this->items[$product->id] = $item;
        }

       
        session(['cart'=>$this->items]);



    }

  
    public function getTotalPrice () {
        $total_price = 0;
        foreach($this->items as $item) {
            $total_price+= $item['price'] * $item['quantity'];

        }
        return $total_price;
    }
    public function getTotalQuantity () {
        $total_quantity = 0;
        foreach($this->items as $item) {
            $total_quantity+= $item['quantity'];

        }
        return $total_quantity;
    }

    public function remove($id) {
        if(isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        session(['cart'=>$this->items]);


    }

    public function update($id, $quantity = 1){
        if(isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }

        session(['cart'=>$this->items]);


    }
    public function clear() {
        session(['cart' => '']);
    }
}
?>