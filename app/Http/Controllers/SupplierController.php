<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    public function read(string $name = ""): Collection{
        return Supplier::where('name', 'LIKE', '%'.$name.'%')->get();
    }

    public function create(SupplierRequest $request){
        Supplier::create($request->validated());
        return response('success', 201);
    }

    public function update(SupplierRequest $request, int $id){
        $supplier = Supplier::find($id);
        if($supplier){
            $supplier->update();
            return response('success', 200);
        }
        return response(['error' => 'Supplier not found'], 404);
    }

    public function delete(int $id){
        $supplier = Supplier::find($id);
        if($supplier){
            $supplier->delete();
            return response('success', 200);
        }

        return response(['error' => 'Supplier not found'], 404);
    }
}
