<?php

    namespace App\Observers;


    use App\Models\Product;

    class ProductObserver
    {

        public function created(Product $product): void
        {
            //
        }


        public function updated(Product $product): void
        {
            //
        }


        public function deleted(Product $product): void
        {
            //
        }


        public function restored(Product $product): void
        {
            //
        }


        public function forceDeleted(Product $product): void
        {
            //
        }
    }
