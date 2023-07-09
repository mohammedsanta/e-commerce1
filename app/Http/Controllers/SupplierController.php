<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user()->id);

        $products = Product::where('supplier_id',Auth::user()->id)->get();

        $orders = Order::all()->filter(function ($p) {
            return $p->product()->get()[0]->supplier_id == Auth::user()->id;
        });

        $solds = 0;

        foreach ($orders as $order) {
            $solds += $order->total;
        }

        return view('supplier.dashboard',[
            'products' => $products,
            'orders' => $orders,
            'solds' => $solds
        ]);
    }

    /**
     * Display a listing of the Products.
     */
    public function myProducts()
    {
        $products = Product::where('supplier_id',Auth::guard('supplier')->user()->id)->get();

        $cart = [];
        $order = [];

        foreach($products as $product) {
            $cart[$product->id] = Cart::where('product_id',$product->id)->get();
            $order[$product->id] = Order::where('product_id',$product->id)->get();
        }

        return view('supplier.myProducts',[
            'products' => $products,
            'cart' => $cart,
            'order' => $order
        ]);
    }

    /**
     * Display Profile
     */
    public function profile()
    {

        $profile = Auth::guard('supplier')->user();

        return view('supplier.profile',[
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
