<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUpdateUserInfo;
use App\Models\Transaction;
use Carbon\Carbon;
use App\User;

class UserDashboardController extends Controller
{
    public function dashboard(Request $request,$id)
    {
        $userID = User::find($id);
        if($userID){

            $transaction = Transaction::all();
            $info = User::where('id',$id)->first();
           
            $viewData = [
                'transaction' => $transaction,
                'info'=> $info
            ];
            return view('main.user.dashboard',$viewData);
        }
        return view('main.404');
    }

    public function updateInfo(RequestUpdateUserInfo $request,$id)
    {
        $infoUser = User::find($id);
        if($infoUser){
            $data = $request->except('_token');
            $data['updated_at']   = Carbon::now();
            
            $update = $infoUser->update($data);
            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Cập nhật thành công'
            ]);
            return redirect()->back();
        }
        \Session::flash('toastr',[
            'type' => 'error',
            'message' => 'Có lỗi xảy ra'
        ]);
        return redirect()->route('get.home');
    }
}
