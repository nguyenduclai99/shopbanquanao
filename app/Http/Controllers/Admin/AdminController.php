<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Helpers\date;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();
        
        $products = DB::table('products')->count();

        $transactions = DB::table('transactions')->count();

        $articles = DB::table('articles')->count();

        $distributors = DB::table('distributor')->count();

        $categories = DB::table('categories')->count();

        $listDayofMonth = Date::getListDayofMonth();



        $transactionDefault = Transaction::where('tst_status',1)->select('id')->count();

        $transactionProcess = Transaction::where('tst_status',2)->select('id')->count();

        $transactionSuccess = Transaction::where('tst_status',3)->select('id')->count();

        $transactionCancel = Transaction::where('tst_status',4)->select('id')->count();

        $statusTransaction = [
            [
                'Tiếp Nhận',$transactionDefault,null
            ],
            [
                'Đang Vận Chuyển',$transactionProcess,null
            ],
            [
                'Hoàn tất',$transactionSuccess,null
            ],
            [
                'Hủy bỏ',$transactionCancel,null
            ],
        ];

        $transactionsList = Transaction::orderbyDesc('id')->limit(6)->get();
       
        $viewData = [
            'users' => $users,
            'products' => $products,
            'transactions' => $transactions,
            'articles' => $articles,
            'categories' => $categories,
            'distributors' => $distributors,
            'transactionsList'=> $transactionsList,
            'statusTransaction' =>json_encode($statusTransaction),
            'listDayofMonth' => json_encode($listDayofMonth)
        ];

        return view('admin.home',$viewData);
    }
}
