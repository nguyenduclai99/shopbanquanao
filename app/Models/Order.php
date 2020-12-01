<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [''];

    public function product()
    {
        return $this->belongsTo(Product::class,'od_product_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'od_transaction_id');
    }
}
