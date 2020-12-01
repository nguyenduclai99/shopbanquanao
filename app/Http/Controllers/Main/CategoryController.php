<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\GroupAttribute;

class CategoryController extends Controller
{
    public function index(Request $request,$slug)
    {   
        $url = $request->url();
        $arraySlug = explode('-',$slug);
        $id = array_pop($arraySlug);
        
        $category = Category::findOrFail($id);
        
        $paramAtbSearch = $request->except('price','page','key','sortby');
        $paramAtbSearch = array_values($paramAtbSearch);
        
        $products = Product::where([
                            'pro_active' => 1,
                            'pro_category_id' => $id,
                            ]);
        
        if($key = $request->key) {
            $products->where('pro_name','like','%'.$key.'%');
        }
        
        if(!empty($paramAtbSearch)){
            $products->whereHas('attributes',function($query) use($paramAtbSearch){
                $count = count($paramAtbSearch);
                $query->whereIn('pa_attribute_id',$paramAtbSearch)->havingRaw("COUNT(DISTINCT product_attributes.pa_attribute_id) = ".$count);
                
            });           
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
        
        $products = $products->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
                            ->paginate(9);
        
        $attributes = $this->synAttributeGroup($id);
        
        $viewData = [
            'category' => $category,
            'attributes' => $attributes,
            'products' => $products,
            'title_page' => $category->c_name,
            'url' => $url,
            'query' =>$request->query()
        ];

        return view('main.pages.product.index',$viewData);
    }

    public function synAttributeGroup($id)
    {
        
        $attributes = Attribute::where('atb_category_id',$id)->get();
        $groupAttributes = [];
        foreach($attributes as $key => $attribute){
            $key = GroupAttribute::where('id',$attribute->atb_type)->pluck('ga_name');
            foreach ($key as $k => $v){
                $groupAttributes[$v][] = $attribute->toArray();
            } 
        }

        return $groupAttributes;
    }
}
