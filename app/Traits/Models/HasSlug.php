<?php

    namespace App\Traits\Models;


    use Illuminate\Database\Eloquent\Model;

    trait HasSlug
    {

        // TODO сделать счетчик для уникальности slug
        protected static function bootHasSlug(): void
        {
            static::creating(function (Model $item) {
                $item->slug = $item->slug ?? str($item->{self::slugFrom()})->append(time())->slug();
            });
        }

        public static function slugFrom(): string
        {
            return 'title';
        }

    }