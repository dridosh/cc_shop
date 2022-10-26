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
                //                'thumbnail' => $this->faker->loremflickr('img', 500, 500, 'car'), // реализация через сервис loremflickr.com
                'thumbnail' => $this->faker->file('tests/Fixtures/products',
                    storage_path('/app/public/images/products'), false), //выбор случайного файла кортинки


                'price' => $this->faker->numberBetween(1000, 200000),

            ];
        }
    }
