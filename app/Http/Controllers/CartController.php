<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddToCartRequest;

class CartController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function cart()
    {
        $carts = Cart::where('user_id',Auth::user()->id)->get();

        $total = 0;
        
        foreach($carts as $cart) {
            $total += $cart->total;
        }

        return view('product.cart',[
            'products' => $carts,
            'total' => $total
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCart(AddToCartRequest $request,$id)
    {
        $data = $request->validated();
        $data['product_id'] = $id;
        $data['total'] = Product::find($id)->price;
        $data = array_merge($data,$request->except('_token'));

        Cart::create($data);

        return to_route('index');
    }

    /**
     * Delete From Cart
     */
    public function deleteFromCart($id)
    {
        $cart = Cart::find($id)->delete();

        return back();
    }

    /**
     * Show Payment
    */
    public function paymentView()
    {
        return view('product.payment');
    }

    public function order(OrderRequest $request)
    {
        return to_route('index')->with(['success'=>'order done']);
    }
    

}
