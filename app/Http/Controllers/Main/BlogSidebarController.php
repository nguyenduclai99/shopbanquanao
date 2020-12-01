<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class BlogSidebarController extends Controller
{
    public function getProductTop()
    {
        $productsPay = Product::with('category:id,c_name,c_slug')
        ->where([
            'pro_active' => 1,
        ])
        ->where('pro_pay','>',0)
        ->orderByDesc('pro_pay')
        ->limit(6)
        ->select('id','pro_name','pro_slug','pro_category_id','pro_sale','pro_avatar','pro_price')
        ->get()->toArray();
           
        return $productsPay;
    }
}
