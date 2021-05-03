<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Order;
use App\Models\ItemListing;

use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function read(string $id = ""){
        $arr = [];
        if($id===""){
            $orders = Order::all();
            foreach ($orders as $order) {
                $item_listings = $order->itemListings()->get();
                array_push($arr, [
                    'order_id' => $order->id,
                    'items' => $item_listings,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->created_at, 
                ]);
            }
            return response($arr , 200);
        }

        $order = Order::find($id);
        if($order){
            $item_listings = $order->itemListings()->get();
            array_push($arr, [
                'order_id' => $order->id,
                'items' => $item_listings,
                'created_at' => $order->created_at,
                'updated_at' => $order->created_at, 
            ]);
            return response($arr, 200);
        }

        return response(['error' => 'Order not found'], 404);
    }

    public function create(OrderRequest $request){
        DB::beginTransaction();
        try{
            $order = Order::create();
            $validated = $request->validated();
            foreach ($validated['items'] as $item) {
                $order->itemListings()->create([
                    'product_id' => $item['product_id'],
                    'qty' => -1* $item['qty'],
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
        $order = Order::find($id);
        if($order){
            $order->delete();
            return response('success', 200);
        }

        return response(['error' => 'Order not found'], 404);  
    }
}
