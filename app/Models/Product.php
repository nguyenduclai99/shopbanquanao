<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class,'pro_distributor_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class,'products_keywords','pk_product_id','pk_keyword_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'product_attributes','pa_product_id','pa_attribute_id');
    }
}

