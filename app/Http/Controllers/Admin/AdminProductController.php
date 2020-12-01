<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Distributor;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Keyword;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name','distributor:id,d_name');
        
        if($name = $request->name) {
            $products->where('pro_name','like','%'.$name.'%');
        }

        if($category = $request->category) {
            $products->where('pro_category_id',$category);
        }

        if($distributor = $request->distributor) {
            $products->where('pro_distributor_id',$distributor);
        }
        
        if($status = $request->status){
            
            $products->where('pro_active',$status);
        }

        $products = $products->orderByDesc('id')->get();
        
        $categories = Category::all();
        $distributor = Distributor::all();

        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'distributor' => $distributor
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();
        $distributor = Distributor::all();
        $attributes = Attribute::with('category:id,c_name')->orderByDesc('id')->get();
        $keywords = Keyword::all();

        return view('admin.product.create',compact('categories','attributes','keywords','distributor'));
    }

    public function store(AdminRequestProduct $request)
    { 
        $data = $request->except('_token','pro_avatar','attribute','keywords');
        
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();
        
        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1) 
                $data['pro_avatar'] = $image['name'];
        } 

        if(get_data_user('admins','id')){
            $data['pro_admin_id'] = get_data_user('admins','id');
        }
        
        $id = Product::insertGetId($data);
        
        if($id){
            $this->syncAttribute($request->attribute, $id);
            $this->syncKeyword($request->keywords, $id);
        }
        return redirect()->route('admin.product.index')->with('success','Thêm Mới Sản Phẩm Thành Công');
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->pro_active =! $product->pro_active;
        $product->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function hot($id)
    {
        $product = Product::find($id);
        $product->pro_hot =! $product->pro_hot;
        $product->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function edit($id)
    {
        $categories = Category::all();
        $distributor = Distributor::all();
        $product = Product::findOrFail($id);
        $keywords = Keyword::all();
        $attributeOld = \DB::table('product_attributes')->where('pa_product_id',$id)
                                                        ->pluck('pa_attribute_id')
                                                        ->toArray();

        if(!$attributeOld) $attributeOld = [];

        $keywordOld = \DB::table('products_keywords')->where('pk_product_id',$id)
                                                        ->pluck('pk_keyword_id')
                                                        ->toArray();

        if(!$keywordOld) $keywordOld = [];

        $category_id = $product->pro_category_id;

        // if($category_id){
           
        //     $attributes = Attribute::where('atb_category_id',$category_id)->get();
            
        //     if($attributes){
        //         $groupAttribute = [];
        //         foreach($attributes as $key => $attribute){
        //             $key = GroupAttribute::where('id',$attribute->atb_type)->pluck('ga_name');
        //             foreach ($key as $k => $v){
        //                 $groupAttribute[$v][] = $attribute->toArray();
        //             }      
        //         }

        //     }
        // }

        $viewData = [
            'categories' => $categories,
            'product' => $product,
            'keywords' => $keywords,
            'attributeOld' => $attributeOld,
            'keywordOld' => $keywordOld,
            'distributor' => $distributor
        ];

        return view('admin.product.update', $viewData);
    }

    public function update(AdminRequestProduct $request, $id)
    {
        $product = Product::find($id);
        $data = $request->except('_token','pro_avatar','attribute','keywords');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1) 
                $data['pro_avatar'] = $image['name'];
        } 
        
        $update = $product->update($data);
        if($update){
            $this->syncAttribute($request->attribute, $id);
            $this->syncKeyword($request->keywords, $id);
        }

        return redirect()->route('admin.product.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) $product->delete();

        return redirect()->back()->with('success','Xóa Sản Phẩm Thành Công');
    }

    protected function syncKeyword($keywords, $idProduct)
    {
       if(!empty($keywords)){
           $datas = [];
           
            foreach ($keywords as $key => $keyword){
                $datas = [
                    'pk_product_id' => $idProduct,
                    'pk_keyword_id' => $keyword
                ];
            }
           
            \DB::table('products_keywords')->where('pk_product_id',$idProduct)->delete();
            \DB::table('products_keywords')->insert($datas);
       }
    }

    protected function syncAttribute($attributes,$idProduct)
    {
        
        if(!empty($attributes)){
            $datas = [];
            foreach ($attributes as $key => $value){
                $datas[]= [
                    'pa_product_id'=>$idProduct,
                    'pa_attribute_id'=>$value
                ];
            }
            
            // if(!empty($datas)){
            \DB::table('product_attributes')->where('pa_product_id',$idProduct)->delete();
            \DB::table('product_attributes')->insert($datas);
            //}
        }
    }
}
