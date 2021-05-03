<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Purchase;
use App\Models\ItemListing;

use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    public function read(string $id = ""){
        $arr = [];
        if($id===""){
            $purchases = Purchase::all();
            foreach ($purchases as $purchase) {
                $item_listings = $purchase->itemListings()->get();
                $supplier = $purchase->supplier()->first();
                array_push($arr, [
                    'order_id' => $purchase->id,
                    'supplier' => $supplier->name,
                    'items' => $item_listings,
                    'created_at' => $purchase->created_at,
                    'updated_at' => $purchase->created_at, 
                ]);
            }
            return response($arr , 200);
        }

        $purchase = Purchase::find($id);
        if($purchase){
            $item_listings = $purchase->itemListings()->get();
            $supplier = $purchase->supplier()->get();
            array_push($arr, [
                'order_id' => $purchase->id,
                'supplier' => $supplier->name,
                'items' => $item_listings,
                'created_at' => $purchase->created_at,
                'updated_at' => $purchase->created_at, 
            ]);
            return response($arr, 200);
        }

        return response(['error' => 'Purchase not found'], 404);
    }

    public function create(PurchaseRequest $request){
        DB::beginTransaction();
        try{
            $validated = $request->validated();
            $purchase = Purchase::create([
                'supplier_id' => $validated['supplier_id'],
            ]);
            foreach ($validated['items'] as $item) {
                $purchase->itemListings()->create([
                    'product_id' => $item['product_id'],
                    'qty' => 1* $item['qty'],
                ]);
            }
            DB::commit();
            return response('success', 200);
        }catch(Exception $e){
            DB::rollback();
            return response(['error' => 'Something unexpected happened. Transaction Failed.'], );
        }
    }

    public function delete(int $id){
        $purchase = Purchase::find($id);
        if($purchase){
            $purchase->delete();
            return response('success', 200);
        }

        return response(['error' => 'Purchase not found'], 404);  
    }
}
