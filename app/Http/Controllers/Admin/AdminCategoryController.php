<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestCategory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;


class AdminCategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::all();

        $viewData = [
            'categories' => $categories
        ];
        return view('admin.category.index', $viewData);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(AdminRequestCategory $request)
    { 
        $data = $request->except('_token');
        $data['c_slug'] = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now();
        $id = Category::insertGetID($data);

        return redirect()->route('admin.category.index')->with('success','Thêm Mới Danh Mục Thành Công');
    }

    public function active($id)
    {
        $category = Category::find($id);
        $category->c_status =! $category->c_status;
        $category->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function hot($id)
    {
        $category = Category::find($id);
        $category->c_hot =! $category->c_hot;
        $category->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function edit($id)
    {
        $category = Category::find($id);
        
        return view('admin.category.update', compact('category'));
    }

    public function update(AdminRequestCategory $request, $id)
    {
        $category           = Category::find($id);
        $data               = $request->except('_token');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['updated_at'] = Carbon::now(); 

        $category->update($data);
        return redirect()->route('admin.category.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) $category->delete();

        return redirect()->back()->with('success','Xóa Danh Mục Thành Công');;
    }
}
