<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [''];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'a_menu_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'a_admin_id');
    }
}
