<?php

namespace App\Domain\Product;

use App\Domain\Category\Category;
use App\Jobs\ProcessImportProduct;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use JWTAuth;
use App\Domain\Product\Import\Import;

class ProductService
{
    public function getList(Request $request)
    {
        return ProductFilter
            ::seach($request->search)
            ->paginate($request->perPage ?: 10);
    }

    public function store(Request $request)
    {
        self::validate($request);

        $product = factory(Product::class)->create();
        $product->name = $request->name;
        $product->sub_name = $request->subName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image1 = $request->image1;
        $product->image2 = $request->image2;
        $product->image3 = $request->image3;
        $product->image4 = $request->image4;
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
            'subName' => 'required|min:1|max:255',
            'price' => 'required',
            'description' => 'required',
        ]);
    }

    public static function salvar(UploadedFile $file)
    {
        $user = JWTAuth::toUser(JWTAuth::getToken());

        $import = new Import();
        $import->name = $file->getClientOriginalName();
        $import->user_id = $user->id;
        $import->save();

        $file->storeAs('import', $import->id . '.csv');

        ProcessImportProduct::dispatch($import)
            ->delay(now()->addMinute(5));

        return $import;
    }

    public static function category($count = 1)
    {
        $result = [];
        $categories = Category::all();

        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->id)
                ->limit($count)
                ->get();

            $result = array_merge($result, $products->toArray());
        }

        return $result;
    }
}
