<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequestAttribute;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::with('category:id,c_name','group_attribute:id,ga_name')->orderByDesc('id')->get();

        $viewData = [
            'attributes' => $attributes
        ];
        
        return view('admin.attribute.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.attribute.create',compact('categories'));
    }

    public function store(AdminRequestAttribute $request)
    { 
        $data = $request->except('_token');
        $data['atb_slug']     = Str::slug($request->atb_name);
        $data['created_at']   = Carbon::now();

        $id = Attribute::insertGetId($data);

        return redirect()->route('admin.attribute.index')->with('success','Thêm Mới Thuộc Tính Thành Công');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $attribute = Attribute::find($id);
        
        return view('admin.attribute.update', compact('attribute','categories'));
    }

    public function update(AdminRequestAttribute $request, $id)
    {
        $attribute           = Attribute::find($id);
        $data               = $request->except('_token');
        $data['atb_slug']     = Str::slug($request->atb_name);
        $data['updated_at'] = Carbon::now(); 

        $attribute->update($data);
        return redirect()->route('admin.attribute.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $attribute = Attribute::find($id);
        if ($attribute) $attribute->delete();

        return redirect()->back()->with('success','Xóa Thuộc Tính Thành Công');;
    }
}
