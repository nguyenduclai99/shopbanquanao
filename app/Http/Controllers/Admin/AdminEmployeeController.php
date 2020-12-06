<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminEmployeeController extends Controller
{
    public function index()
    {
    	$admins = Admin::all();
        $viewData = [
            'admins' => $admins
        ];
        return view('admin.admin.index', $viewData);
    }

    public function create() 
    {
    	return view ('admin.admin.create');
    }

    public function store(Request $request)
    {
    	try {
    		$data = $request->except('_token');
	    	$messages = [
	    		'email.unique'	=> "Tài khoản email đã tồn tại.",
	    	];

	    	$validator = Validator::make($data,[
	    		'email'	=> 'unique:admins',
	    	], $messages);

	    	if($validator->fails()) {
	    		$errors = $validator->errors();
	    		return redirect()->back()->with('error', 'Tài khoản email đã tồn tại.');
	    	}else {
	    		$admin = new Admin();
				$admin->name = $request->name;
				$admin->email = $request->email;
				$admin->password = bcrypt($request->password);
				$admin->role = $request->role;
				$admin->save();
				return redirect()->back()->with('success','Thêm mới tài khoản thành công');
			}
    	} catch (Exception $e) {
    		return redirect()->back()->with('error','Đã xảy ra lỗi vui lòng thử lại');
    	}
		
    }
}
