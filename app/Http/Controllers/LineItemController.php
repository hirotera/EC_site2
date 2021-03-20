<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\LineItem;


class LineItemController extends Controller
{
    // 引数にRequest $requestを指定しフォームの値をアクション内で使用
    public function create(Request $request)
    {
        // セッションの取得
        $cart_id = Session::get('cart');
        // Eloquentのwhereメソッドを使用し、line_itemsテーブルのレコードをカートIDと商品IDで絞り込み
        $line_item = LineItem::where('cart_id', $cart_id)
        // whereを繋げてAND検索
            ->where('product_id', $request->input('id'))
        // firstメソッドで最初にヒットしたレコードだけを返す
            ->first();

        // 追加した商品がカートに存在した場合
        if ($line_item) {
        // 元の個数($line_item->quantity)に追加した個数($request->input('quantity')を足して保存
            $line_item->quantity += $request->input('quantity');
        // 値を更新したあとsaveメソッドで保存
            $line_item->save();
        } else {
        // 追加した商品が新規の場合､createメソッド
            LineItem::create([
                'cart_id' => $cart_id,
                'product_id' => $request->input('id'),
                'quantity' => $request->input('quantity'),
            ]);
        }
        return redirect(route('cart.index'));
    }
    
    public function delete(Request $request)
    {
        // Eloquentのdestroyメソッドで引数に主キーを指定、レコードの削除
        // フォームからカートの商品IDを取得し引数に指定
        LineItem::destroy($request->input('id'));

        return redirect(route('cart.index'));
    }

}
