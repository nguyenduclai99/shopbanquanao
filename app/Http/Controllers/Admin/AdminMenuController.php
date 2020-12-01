<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestMenu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Menu;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();

        $viewData = [
            'menu' => $menu
        ];
        return view('admin.menu.index', $viewData);
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(AdminRequestMenu $request)
    { 
        $data = $request->except('_token');
        $data['mn_slug'] = Str::slug($request->mn_name);
        $data['created_at'] = Carbon::now();
        $id = Menu::insertGetID($data);

        return redirect()->route('admin.menu.index')->with('success','Thêm Mới Menu Thành Công');
    }
    public function active($id)
    {
        $menu = Menu::find($id);
        $menu->mn_status =! $menu->mn_status;
        $menu->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function hot($id)
    {
        $menu = Menu::find($id);
        $menu->mn_hot =! $menu->mn_hot;
        $menu->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        
        return view('admin.menu.update', compact('menu'));
    }

    public function update(AdminRequestMenu $request, $id)
    {
        $menu               = Menu::find($id);
        $data               = $request->except('_token');
        $data['mn_slug']    = Str::slug($request->mn_name);
        $data['updated_at'] = Carbon::now(); 

        $menu->update($data);
        return redirect()->route('admin.menu.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        if ($menu) $menu->delete();

        return redirect()->back()->with('success','Xóa Menu Thành Công');;
    }
}
