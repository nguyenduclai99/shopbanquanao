<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attribute;
use App\Models\GroupAttribute;

class AdminAjaxController extends Controller
{
    public function getGroupAttribute(Request $request)
    {
        $category_id = $request->category_id;
        if($category_id){
           
            $group_attribute = DB::table('group_attribute')
            ->select('id','ga_name')
            ->where('ga_category_id',$category_id)->get();

            return response(['data'=> $group_attribute]);
        }
    }

    public function getAttribute(Request $request)
    {
        $category_id = $request->category_id;
        if($category_id){
           
            $attributes = Attribute::where('atb_category_id',$category_id)->get();
            
            if($attributes){
                $groupAttribute = [];
                foreach($attributes as $key => $attribute){
                    $key = GroupAttribute::where('id',$attribute->atb_type)->pluck('ga_name');
                    foreach ($key as $k => $v){
                        $groupAttribute[$v][] = $attribute->toArray();
                    }      
                }

            }
            
            return response(['data'=> $groupAttribute]);
        }
    }
}
