<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $guarded = [''];

    public function group_attribute()
    {
        return $this->belongsTo(GroupAttribute::class,'atb_type');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'atb_category_id');
    }
}
