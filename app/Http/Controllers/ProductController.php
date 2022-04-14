<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index()
    {
        return ProductResource::collection(Product::paginate(20));
        // return ProductCollection::collection(Product::all());
    }


    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->save();
        return response([ProductResource::make($product)], Response::HTTP_CREATED);
    }


    public function show(Product $product)
    {
        // return new ProductResource($product);
        return ProductResource::make($product);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->save();
        return response(ProductResource::make($product), Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
