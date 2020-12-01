<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request,$id)
    {   
        $transactionID = Transaction::find($id);
        
        if($transactionID){
            $info = Transaction::where('id',$id)->first();
            $productOrder = Order::with('product')->where('od_transaction_id',$id)->get();
            $viewData = [
                'info' => $info,
                'productOrder' => $productOrder
            ];
            
            return view('main.pages.transaction.index',$viewData);
        }
        return view('main.404');
    }
}
