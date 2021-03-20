<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;

class CartController extends Controller
{
    public function index()
    {
        // セッションからカートIDを取得し、$cart_id変数へ代入
        $cart_id = Session::get('cart');
        // 取得したカートIDでcartsテーブルのレコードを検索し、取得したレコードを$cart変数へ代入
        $cart = Cart::find($cart_id);

        $total_price = 0;
        foreach ($cart->products as $product) {
            // $total_price変数に商品の価格 * 商品の個数を足し合わせて、合計金額を算出
            $total_price += $product->price * $product->pivot->quantity;
        }

        return view('cart.index')
            ->with('line_items', $cart->products)
            ->with('total_price', $total_price);
    }
}
