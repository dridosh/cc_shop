<?php

    namespace Database\Factories;

    use App\Models\Brand;
    use Illuminate\Database\Eloquent\Factories\Factory;


    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
     */
    class ProductFactory extends Factory
    {

        public function definition(): array
        {
            //  dd(Storage::path('img'));
            return [
                'title'     => ucfirst($this->faker->words(3, true)),
                'brand_id'  => Brand::query()->inRandomOrder()->value('id'),
                'thumbnail' => $this->faker->loremflickr('img', 500, 500, 'car'),
                'price'     => $this->faker->numberBetween(1000, 200000),

            ];
        }
    }