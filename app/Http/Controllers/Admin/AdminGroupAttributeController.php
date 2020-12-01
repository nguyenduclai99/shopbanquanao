<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestGroupAttribute;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\GroupAttribute;

class AdminGroupAttributeController extends Controller
{
    public function index()
    {
        $group_attributes = GroupAttribute::with('category:id,c_name')->orderByDesc('id')->get();

        $viewData = [
            'group_attributes' => $group_attributes
        ];
        
        return view('admin.group_attribute.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.group_attribute.create',compact('categories'));
    }

    public function store(AdminRequestGroupAttribute $request)
    { 
        $data = $request->except('_token');
        $data['ga_slug']     = Str::slug($request->ga_name);
        $data['created_at']   = Carbon::now();

        $id = GroupAttribute::insertGetId($data);

        return redirect()->route('admin.group_attribute.index')->with('success','Thêm Mới Nhóm Thuộc Tính Thành Công');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $group_attributes = GroupAttribute::find($id);
        
        return view('admin.group_attribute.update', compact('group_attributes','categories'));
    }

    public function update(AdminRequestGroupAttribute $request, $id)
    {
        $group_attributes           = GroupAttribute::find($id);
        $data               = $request->except('_token');
        $data['ga_slug']     = Str::slug($request->ga_name);
        $data['updated_at'] = Carbon::now(); 

        $group_attributes->update($data);
        return redirect()->route('admin.group_attribute.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $group_attributes = GroupAttribute::find($id);
        if ($group_attributes) $group_attributes->delete();

        return redirect()->back()->with('success','Xóa Nhóm Thuộc Tính Thành Công');;
    }
}
