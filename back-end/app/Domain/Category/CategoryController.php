<?php

namespace App\Domain\Category;

use App\Http\Controllers\Controller;
use App\Domain\Category\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response($categories);
    }

}
