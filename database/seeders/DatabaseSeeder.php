<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\ItemListing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Supplier::factory(100)->create();
        ProductType::create(['name' => 'default']);
        Product::factory(100)->create();
        Order::factory(200)->create();
        Purchase::factory(200)->create();
        ItemListing::factory(500)->create();
    }
}
