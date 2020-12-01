<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestAttribute;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\GroupAttribute;

class ProductController extends Controller
{
    public function index(Request $request)
    {   
        
        $slug = $request->c;
        $key = $request->key;

        if($request->c != null){
            return redirect()->route('get.category.search.list',[$slug,$key]);
        }

        $sidebar_category = Category::all();

        $paramAtbSearch = $request->except('price','page','key');
        $paramAtbSearch = array_values($paramAtbSearch);
        
        $products = Product::where('pro_active', 1);
        
        if($key = $request->key) {
            $products->where('pro_name','like','%'.$key.'%');
        }
        
        if($request->price){
            $price = $request->price;
            switch ($price){
                case '1':
                    $products->where('pro_price','<',1000000);
                break;
                 
                case '2':
                    $products->whereBetween('pro_price',[1000000,4000000]);
                break;

                case '3':
                    $products->whereBetween('pro_price',[4000000,8000000]);
                break;

                case '4':
                    $products->whereBetween('pro_price',[8000000,16000000]);
                break;

                case '5':
                    $products->whereBetween('pro_price',[16000000,24000000]);
                break;

                case '6':
                    $products->where('pro_price','>',24000000);
                break;
            }
        }
        
        if($request->sortby){
            $sortBy = $request->sortby;
            switch ($sortBy){
                case 'newest':
                    $products->orderBy('id','DESC');
                break;
                 
                case 'asc':
                    $products->orderBy('pro_name','ASC');
                break;

                case 'desc':
                    $products->orderBy('pro_name','DESC');
                break;

                case 'price_max':
                    $products->orderBy('pro_price','ASC');
                break;

                case 'price_min':
                    $products->orderBy('pro_price','DESC');
                break;

                case 'view':
                    $products->orderBy('pro_view','DESC');
                break;
            }
        }
        
        $products = $products->orderByDesc('id')
                            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
                            ->paginate(12);
        
                   
        $viewData = [
            'sidebar_category' => $sidebar_category,
            'products' => $products,
        ];

        return view('main.pages.product.index',$viewData);
    }

}
