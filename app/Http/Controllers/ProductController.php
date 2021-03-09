<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(16);
        return ProductResource::collection($products);
    }
    public function distinctAll()
    {
        $products = Product::groupBy('name')->paginate(16);
        // $products = DB::table('products')->groupBy('name')->get();
        // return response()->json($products);
        return ProductResource::collection($products);
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return new ProductResource($product);
    }
}
