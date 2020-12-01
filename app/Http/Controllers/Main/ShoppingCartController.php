<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\RequestShoppingCart;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Transaction;
use App\Mail\TransactionEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class ShoppingCartController extends Controller
{
    public function index()
    {
        $shopping = \Cart::content();
        $viewData =[
            'shopping' => $shopping,
            'title_page' => 'Giỏ Hàng',
        ];
        return view('main.pages.shopping.index',$viewData);
    }

    public function add($id)
    {
        $product = Product::find($id);
        if(!$product) return redirect()->to('/');

        if($product->pro_quantity < 1 ){
            \Session::flash('toastr',[
                'type' => 'error',
                'message' => 'Sản phẩm đã hết hàng'
            ]);

            return redirect()->back();
        }
        
        \Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => number_price($product->pro_price, $product->pro_sale),
            'weight' => '0',
            'options' => [
                'slug' => $product->pro_slug,
                'sale' => $product->pro_sale,
                'price_old' =>$product->pro_price,
                'image' => $product->pro_avatar
            ]
        ]);

        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Thêm sản phẩm vào giỏ hàng thành công'
        ]);
        
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $qty = $request->qty ?? 1;

            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            if(!$product){
                return response(['messages'=>'Không tồn tại sản phẩm']);
            }

            if($product->pro_quantity < $qty) {
                return response(['messages'=>'Số lượng sản phẩm không đủ']);
            }

            \Cart::update($id, $qty);
            

            return response(['messages' => 'Cập nhật giỏ hàng thành công']);
        }
    }

    public function delete($id)
    {
        \Cart::remove($id);
        \Session::flash('toastr',[
            'type' => 'error',
            'message' => 'Đã xóa sản phẩm trong giỏ hàng'
        ]);
        return redirect()->back();
    }

    public function postPay(RequestShoppingCart $request)
    {
        
        $data = $request->except('_token');
        if(isset(Auth::user()->id)){
            $data['tst_user_id'] = Auth::user()->id;
        }
        
        $data['tst_total_money'] = str_replace(',','', \Cart::subtotal(0));
        $data['created_at'] = Carbon::now();

        $transactionID = Transaction::insertGetId($data);

        if( $transactionID) {
           $shopping = \Cart::content();
           foreach ($shopping as $key => $data){

               Order::insert([
                    'od_transaction_id' => $transactionID,
                    'od_product_id'     => $data->id,
                    'od_sale'           => $data->options->sale,
                    'od_qty'            => $data->qty,
                    'od_price'          => $data->price
               ]);

               \DB::table('products')->where('id',$data->id)->decrement('pro_quantity',$data->qty);
               \DB::table('products')->where('id',$data->id)->increment('pro_pay');
           }
           // \Mail::to($request->tst_email)->send(new TransactionEmail($shopping,$transactionID));
        }

        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Đặt hàng thành công'
        ]);

        \Cart::destroy();

        return redirect()->route('get.transaction',$transactionID);
    }


}
