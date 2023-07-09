<?php

namespace App\Http\Controllers\api\V1;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\V1\BulkStoreRequest;
use App\Http\Requests\V1\StoreProductRequest;
use App\Http\Requests\V1\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $where = $request->where;


        // dd(Product::whereFullText('title','dr')->get());        

        if($request->all() != []) {
            return Product::where($where,$request->operator,$request->$where)->get();
        };

        return new ProductCollection(Product::paginate());
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
    public function store(StoreProductRequest $request)
    {
        return new ProductRequest([Product::create($request->all())]);
    }

    public function bulkStore(BulkStoreRequest $request)
    {

        $bulk = collect($request->all())->map(function ($arr,$key) {
            return Arr::except($arr,['supplierableType','supplierableId','supplierId']);
        });

        Product::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
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
    public function update(UpdateProductRequest $request,Product $product)
    {
        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
