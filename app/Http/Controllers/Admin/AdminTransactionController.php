<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::whereRaw(1);
        
        if($email = $request->email){
            $transactions->where('tst_email','like','%'.$email.'%');
        }
        
        if($type = $request->type){
            if($type == 1){
                $transactions->where('tst_user_id','<>',null);               
            }else{
                $transactions->where('tst_user_id',null);
            }
        }

        if($status = $request->status){
            $transactions->where('tst_status',$status);
        }

        $transactions = $transactions->orderbyDesc('id')->get();

        if($request->export){
            return \Excel::download(new TransactionExport($transactions), 'don-hang.xlsx');
        }

        $viewData = [
            'transactions' => $transactions,
            'query' =>$request->query()
        ];
        return view('admin.transaction.index', $viewData);
        
    }

    public function delete($id)
    {
        $transactions = Transaction::find($id);
        if ($transactions) {
            $transactions->delete();
            \DB::table('orders')->where('od_transaction_id', $id)->delete();
        }

        return redirect()->back()->with('success','Xóa Đơn Hàng Thành Công');
    }

    public function getTransactionDetail(Request $request, $id)
    {
        if($request->ajax()){
            $orders = Order::with('product:id,pro_name,pro_slug,pro_avatar')->where('od_transaction_id',$id)->get();
            $html = view("components.orders",compact('orders'))->render();

            return response([
                'html' => $html,
            ]);
        }
    }

    public function deleteOrderItem(Request $request, $id)
    {
        if($request->ajax()){
            $order = Order::find($id);
            if($order){
                $money = $order->od_qty * $order->od_price;

                \DB::table('transactions')->where('id',$order->od_transaction_id)
                                        ->decrement('tst_total_money',$money);
                $order->delete();                        
            }
            
            return response(['code' => 200]);
        }
    }

    public function getAction(Request $request,$action,$id)
    {
        $transactions = Transaction::find($id);
        if($transactions){
            switch ($action){
                case 'process':
                    $transactions->tst_status = 2;
                    break;
                case 'success':
                    $transactions->tst_status = 3;
                    break;   
                case 'cancel':
                    $transactions->tst_status = 4;
                    break;  
                case 'active':
                    $transactions->tst_status = 1;
                    break;
            }

            $transactions->save();
        }

        return redirect()->back();
    }
}
