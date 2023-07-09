<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $products = Product::paginate(25)->fragment('products');

        return view('product.home',[
            'products' => $products
        ]);
    }

    public function search($tag)
    {
        $products = Product::where('type',$tag)->paginate(25)->fragment('products');

        return view('product.home',[
            'products' => $products
        ]);
    }

    public function contact()
    {
        return view('product.contact');
    }



    // For Suppliers |
    //               V 


    /**
     * Display a listing of the resource.
     */
    public function indexAsSupplier()
    {        
        $products = Product::all();

        return view('supplier.ecommerce',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except('_token');
        $data['picture'] = $request->file('picture')->store('products');

        Product::create($data);

        return to_route('supplier.index')->with(['success' => 'Product Has Been Created']);
    }

    public function reportView($id)
    {
        $product = Product::find($id);

        return view('product.report',[
            'product' => $product 
        ]);
    }

    public function report(Request $request)
    {

        $data = $request->validate([
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['to'] = 'admin';

        Message::create($data);

        return to_route('index')->with(['success' => 'Report Sent']);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        $colors = explode(',',$product->color);

        return view('product.details',[
            'product' => $product,
            'colors' => $colors
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showAsSupplier(string $id)
    {
        $product = Product::findOrFail($id);

        return view('supplier.details',[
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('product.edit',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);

        if($request->has('picture')) {
            if(Storage::exists($product->picture)) {
                Storage::delete($product->picture);
            }
            $data['picture'] = $request->file('picture')->store('products');
        } else {
            unset($request->picture);
        }

        $product->update($data);
        
        return to_route('supplier.product.show',$product->id)->with(['success' => 'Update Done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();

        return to_route('supplier.index')->with(['success','Product Deleted']);
    }
}
