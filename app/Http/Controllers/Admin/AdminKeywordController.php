<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestKeyword;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Keyword;

class AdminKeywordController extends Controller
{
    public function index()
    {
        $keyword = Keyword::all();

        $viewData = [
            'keyword' => $keyword
        ];
        return view('admin.keyword.index', $viewData);
    }

    public function create()
    {
        return view('admin.keyword.create');
    }

    public function store(AdminRequestKeyword $request)
    { 
        $data = $request->except('_token');
        $data['k_slug'] = Str::slug($request->k_name);
        $data['created_at'] = Carbon::now();
        $id = Keyword::insertGetID($data);

        return redirect()->route('admin.keyword.index')->with('success','Thêm Mới Keyword Thành Công');
    }

    public function hot($id)
    {
        $keyword = Keyword::find($id);
        $keyword->k_hot =! $keyword->k_hot;
        $keyword->save();

        return redirect()->back()->with('success','Cập Nhật Thành Công');;
    }

    public function edit($id)
    {
        $keyword = Keyword::find($id);
        
        return view('admin.keyword.update', compact('keyword'));
    }

    public function update(AdminRequestKeyword $request, $id)
    {
        $keyword           = Keyword::find($id);
        $data               = $request->except('_token');
        $data['k_slug']     = Str::slug($request->k_name);
        $data['updated_at'] = Carbon::now(); 

        $keyword->update($data);
        return redirect()->route('admin.keyword.index')->with('success','Cập Nhật Thành Công');
    }

    public function delete($id)
    {
        $keyword = Keyword::find($id);
        if ($keyword) $keyword->delete();

        return redirect()->back()->with('success','Xóa Keyword Thành Công');;
    }
}
