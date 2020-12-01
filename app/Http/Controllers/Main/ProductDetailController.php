<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProcessViewService;

class ProductDetailController extends Controller
{
    public function index(Request $request, $slug)
    {   
        $arraySlug = explode('-',$slug);
        $id = array_pop($arraySlug);

        if ($id){
            
            $product = Product::with('category:id,c_name,c_slug','keywords')->findOrFail($id);
            
            ProcessViewService::view('products','pro_view','product',$id);

            $viewData = [
                'product' => $product,
                'title_page' => $product->pro_name,
                'productSuggests' => $this->getProductSuggests($product->pro_category_id)
            ];
            return view('main.pages.product_detail.index',$viewData);
        }
        
        return redirect()->route('get.404');
    }

    private function getProductSuggests($categoryID){

        $products = Product::where([
            'pro_active' => 1,
            'pro_category_id' => $categoryID,
            ])
            ->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
            ->limit(12)->get();

        return $products;
    }
}
