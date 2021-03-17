<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index')
        // withメソッドではBladeテンプレートに値を渡す
        // Eloquentのgetメソッドを用いてproductsテーブルの全データ取得し、
        // productsという変数名でBladeテンプレートに渡す
        ->with('products',Product::get());
    }
}
