<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $viewData = [
            'users' => $users
        ];
        return view('admin.user.index', $viewData);
    }


    // public function edit($id)
    // {
    //     $keyword = Keyword::find($id);
        
    //     return view('admin.keyword.update', compact('keyword'));
    // }

    // public function update(AdminRequestKeyword $request, $id)
    // {
    //     $keyword           = Keyword::find($id);
    //     $data               = $request->except('_token');
    //     $data['k_slug']     = Str::slug($request->k_name);
    //     $data['updated_at'] = Carbon::now(); 

    //     $keyword->update($data);
    //     return redirect()->route('admin.keyword.index')->with('success','Cập Nhật Thành Công');
    // }

    public function delete($id)
    {
        $users = User::find($id);
        if ($users) $users->delete();

        return redirect()->back()->with('success','Xóa Thành Viên Thành Công');;
    }
}
