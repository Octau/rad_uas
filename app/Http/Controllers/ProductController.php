<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function read(string $name = ""){
        $arr = [];
        $products = Product::where('name', 'LIKE', '%'.$name.'%')->get();
        foreach ($products as $product) {
            $sum_item = $product->itemListings()->sum('qty');
            $product_type = $product->productType()->first();
            array_push($arr, [
                'product_name' => $product->name,
                'product_type' => $product_type->name,
                'stock' => $sum_item, 
            ]);
        }
        return response($arr , 200);
    }

    public function create(ProductRequest $request){
        Product::create($request->validated());
        return response('success', 201);
    }

    public function update(ProductRequest $request, int $id){
        $product = Product::find($id);
        if($product){
            $product->update();
            return response('success', 200);
        }
        return response(['error' => 'Product not found'], 404);
    }

    public function delete(int $id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response('success', 200);
        }

        return response(['error' => 'Product not found'], 404);
    }
}
