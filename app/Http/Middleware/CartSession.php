<?php

namespace App\Http\Middleware;

use Closure;
// セッション機能使用のためsessionファサードを使用
use Illuminate\Support\Facades\Session;
use App\Cart;

class CartSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // セッションにカートIDがなければカートを作成する
        if (!Session::has('cart')) {
            // Eloquentのcreateメソッドで、インスタンスの作成 → 値の代入 → データの保存の順に処理をまとめて実行
            $cart = Cart::create();
            // セッションにカートIDを保存
            Session::put('cart', $cart->id);
        }
        return $next($request);
    }
}
