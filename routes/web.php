<?php


    use App\Models\Product;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        Product::query()->select('products.title', 'price', 'brands.title as brand', 'brand_id', 'products.id')
            ->join('brands', 'brands.id', '=', 'brand_id', 'left',)
            ->with('brand', 'categories')
            ->where('products.id', '=', 10);


        Product::query()->select('title', 'price', 'brand_id', 'id')
            ->with('brand', 'categories')
            ->where('id', '<=', 10)
            ->get();

        return view('welcome');
    });

