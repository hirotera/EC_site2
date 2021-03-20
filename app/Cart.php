<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products()
    {
        // belongsToMany･･･多対多のリレーション
        return $this->belongsToMany(
            Product::class,// 第一引数に関係するモデル名
            'line_items',// 第二引数の中間テーブル
            //中間テーブルの情報にアクセスするためにpivotプロパティを使う
        )->withPivot(['id', 'quantity']); 
    }
}
