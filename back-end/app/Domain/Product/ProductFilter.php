<?php

namespace App\Domain\Product;

class ProductFilter
{
    public static function seach($term = '')
    {
        return Product::where(function ($query) use ($term) {
            $query
                ->orWhere('name', 'like', "%{$term}%" )
                ->orWhere('sub_name', 'like', "%{$term}%" );
        })
            ->whereNull('deleted_at');
    }
}
