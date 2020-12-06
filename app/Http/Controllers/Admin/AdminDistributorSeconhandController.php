<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestDistributor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Distributor;


class AdminDistributorSeconhandController extends AdminController
{
    public function index()
    {
        $distributor = Distributor::where('d_type', 1)->get();
        $viewData = [
            'distributor' => $distributor
        ];
        return view('admin.distributorseconhand.index', $viewData);
    }

    public function create()
    {
        return view('admin.distributorseconhand.create');
    }

    public function store(AdminRequestDistributor $request)
    { 
        $data = $request->except('_token');
        $data['d_slug'] = Str::slug($request->d_name);
        $data['created_at'] = Carbon::now();
        $data['d_type'] = 1;
        $id = Distributor::insertGetID($data);

        return redirect()->route('admin.distributorseconhand.index')->with('success','Thêm Mới Nhà phân phối Thành Công');
    }


    public function edit($id)
    {
        $distributor = Distributor::find($id);
        
        return view('admin.distributorseconhand.update', compact('distributor'));
    }

    public function update(AdminRequestDistributor $request, $id)
    {
        $distributor        = Distributor::find($id);
        $data               = $request->except('_token');
        $data['d_slug']     = Str::slug($request->d_name);
        $data['updated_at'] = Carbon::now(); 
        $data['d_type'] = 1;

        $distributor->update($data);
        return redirect()->route('admin.distributorseconhand.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $distributor = Distributor::find($id);
        if ($distributor) $distributor->delete();

        return redirect()->back()->with('success','Xóa Nhà phân phối Thành Công');;
    }
}
