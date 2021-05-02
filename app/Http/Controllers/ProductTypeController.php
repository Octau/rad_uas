<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\ProductType;
use App\Http\Requests\ProductTypeRequest;

class ProductTypeController extends Controller
{
    public function read(string $name = ""): Collection{
        return ProductType::where('name', 'LIKE', '%'.$name.'%')->get();
    }

    public function create(ProductTypeRequest $request){
        ProductType::create($request->validated());
        return response('success', 201);
    }

    public function update(ProductTypeRequest $request, int $id){
        $product_type = ProductType::find($id);
        if($product_type){
            $product_type->update();
            return response('success', 200);
        }
        return response(['error' => 'Product Type not found'], 404);
    }

    public function delete(int $id){
        $product_type = ProductType::find($id);
        if($product_type){
            $product_type->delete();
            return response('success', 200);
        }

        return response(['error' => 'Product Type not found'], 404);
    }
}
