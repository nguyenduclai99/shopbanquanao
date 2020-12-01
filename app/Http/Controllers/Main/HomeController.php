<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        
        $productsNew = Product::where('pro_active',1)
            ->orderByDesc('id')
            ->limit(8)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
            ->get();
        
        $productsHot = Product::where([
                'pro_active' => 1,
                'pro_hot' => 1,
            ])
            ->orderByDesc('id')
            ->limit(8)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
            ->get();

        $productsPay = Product::with('category:id,c_name,c_slug')
            ->where([
                'pro_active' => 1,
            ])
            ->where('pro_pay','>',0)
            ->orderByDesc('pro_pay')
            ->limit(6)
            ->select('id','pro_name','pro_slug','pro_category_id','pro_sale','pro_avatar','pro_price')
            ->get()->toArray();
        
        $productsDaiLy = Product::where('pro_active',1)
            ->orderBy('pro_price','asc')
            ->limit(5)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
            ->get();

        $viewData = [
            'productsNew' => $productsNew,
            'productsHot' => $productsHot,
            'productsPay' => $productsPay,
            'productsDaiLy' => $productsDaiLy,
            'title_page' => "KTComputer"
        ];
        
        return view('main.pages.home.index',$viewData)->with('success','Cập Nhật Thành Công');
    }

    public function error404()
    {
        return view('main.404');
    }
}
