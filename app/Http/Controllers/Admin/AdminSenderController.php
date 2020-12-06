<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\User;

class AdminSenderController extends Controller
{
    public function index()
    {
        $users = User::where('role', 0)->get();

        $viewData = [
            'users' => $users
        ];
        return view('admin.user.index', $viewData);
    }

    public function delete($id)
    {
        $users = User::find($id);
        if ($users) $users->delete();

        return redirect()->back()->with('success','Xóa Thành Viên Thành Công');;
    }
}
