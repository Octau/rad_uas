<?php

namespace Database\Factories;

use App\Models\ItemListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemListing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->numberBetween(0,1);
        return [
            'product_id' => $this->faker->numberBetween(1,100),
            'qty' => $this->faker->numberBetween(1,100),
            'order_id' => ($type == 0) ? $this->faker->numberBetween(1,200) : null,
            'purchase_id' => ($type == 1) ? $this->faker->numberBetween(1,200) : null,
        ];
    }
}
