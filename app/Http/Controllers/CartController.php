<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('Pages.cart');
    }
    public function cart_insert(Request $request){
        $product_id = $request->get('product_id');
        $price = $request->get('price');
        $name = $request->get('name');
        $quantity = $request->get('quantity');
        $unit =$request->get('unit');
        $qty = $request->get('qty');

        $cartItems = Cart::add(['id'=>$product_id, 'name' => $name, 'qty' => $qty, 'price' =>$price, 'options' => ['unit' => $unit]]);


         $count = cart::content();
       return response()->json($count);
    }
    public function cartIncrement(Request $request)
    {

        $product_id = $request->get('product_id');
        $rows = Cart::content();
        $rowId = $rows->where('id',$product_id)->first()->rowId;
        $id = Cart::get($rowId);
        Cart::update($rowId,$id->qty + 1);
        return Cart::content();

    }
    public function cartDecrement(Request $request)
    {
        $product_id = $request->get('product_id');
        $rows = Cart::content();
        $rowId = $rows->where('id',$product_id)->first()->rowId;
        $id = Cart::get($rowId);
        Cart::update($rowId,$id->qty - 1);
        return Cart::content();
    }
    public function CartCount()
    {
        return response()->json(Cart::content()->count());
    }
    public function edit_Cart(Request $request)
    {
        $product_id = $request->get('product_id');
        $rows = Cart::content();
        $rowId = $rows->where('id',$product_id)->first()->rowId;
        $id = Cart::get($rowId);
        Cart::update($rowId,['qty' => $request->get('qty')]);
        return Cart::content();
    }
    public function Cart_delete(Request $request)
    {
        $product_id = $request->get('product_id');
        $rows = Cart::content();
        $rowId = $rows->where('id',$product_id)->first()->rowId;
        Cart::remove($rowId);
        return Cart::content();
    }
}
