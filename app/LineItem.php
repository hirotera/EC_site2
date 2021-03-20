<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    // LineItemモデルにホワイトリストを作成し、cart_id、product_id、quantityの登録更新を許可する
    protected $fillable = ['cart_id', 'product_id', 'quantity'];
}
