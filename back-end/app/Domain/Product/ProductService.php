<?php

namespace App\Domain\Product;

use Illuminate\Http\Request;

class ProductService
{
    public function getList(Request $request)
    {
        return ProductFilter
            ::seach($request->search)
            ->paginate($request->pérPage ?: 15);
    }

    public function store(Request $request)
    {
        self::validate($request);

        $product = factory(Product::class)->create();
        $product->name = $request->name;
        $product->sub_name = $request->sub_name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
    }

    public function update(Product $product, Request $request)
    {
        self::validate($request);

        $product->name = $request->name;
        $product->sub_name = $request->sub_name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
    }

    private function validate(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:1|max:255',
            'sub_name' => 'required|min:1|max:255',
            'price' => 'required|float',
        ]);
    }
}
