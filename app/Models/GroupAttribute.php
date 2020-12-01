<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupAttribute extends Model
{
    protected $table = 'group_attribute';
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class,'ga_category_id');
    }
}
