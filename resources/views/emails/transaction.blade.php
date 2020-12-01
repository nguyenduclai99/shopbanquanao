<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title>Báo giá sản phẩm Công ty máy tính Hà Nội</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="keywords" content=""/>
      <meta name="description" content=""/>
      <META name="revisit-after" content="2 days"/>
      <META NAME="ROBOTS" CONTENT= "INDEX, FOLLOW"/>
      <META NAME="author" CONTENT= "CÔNG TY MÁY TÍNH HÀ NỘI"/>
      <META NAME="distribution" content= "global"/>
      <META NAME="Copyright" content="www.hanoicomputer.vn"/>
      <link rel="stylesheet" href="/template/update_2020/script/style.css" type="text/css" />
      <style>
         .list_table {
         border-collapse:collapse;
         }
         .list_table td{border:solid 1px #aaa; padding:5px; text-algin:center; vertical-align:middle;}
         .cart_first_tr {
         background-color:#cccccc;
         }
         BODY, FORM, TABLE, TD, SPAN, DIV {
         font-family: Arial, Helvetica, sans-serif;
         font-size:12px;
         }
         .title a {
         color:#0000FF;
         font-family:Arial, Helvetica, sans-serif;
         font-size:12px;
         text-decoration:none;
         }
         .title a:hover {
         color:#0000FF;
         text-decoration:underline;
         }
      </style>
</head>
   <body>
      <div style="width: 700px;margin: 0 auto;">
        <table align="center" cellpadding="0" cellspacing="0" style="background-color:rgb(212,238,251);margin:auto;border-collapse:collapse;width:700px;font-family:verdana;color:rgb(34,34,34)">
            <tbody>
               <tr>
                  <td style="padding:20px 30px;width:auto">
                     <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;background-color:white;width:700px;margin:auto">
                        <tbody>
                           <tr>
                              <td style="background-color:rgb(0,192,241)">
                                 <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:100%">
                                    <tbody>
                                       <tr style="border:1px solid rgb(179,228,252)">
                                          <td style="width:80%;font-size:22px;font-family:arial;color:rgb(255,255,255);font-weight:bold;padding:25px 0px 20px 20px">
                                             Thông tin đơn đặt hàng,
                                             <br>
                                          </td>
                                          <td style="padding-right:20px;width:50%">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr style="border-left:1px solid rgb(179,228,252);border-right:1px solid rgb(179,228,252)">
                              <td height="5"></td>
                           </tr>
                           <tr style="border-left:1px solid rgb(179,228,252);border-right:1px solid rgb(179,228,252);border-bottom:1px solid rgb(179,228,252)">
                              <td>
                                 <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;font-size:12px">
                                    <tbody>
                                       <tr>
                                          <td style="padding:10px 20px 30px;font-family:verdana,arial">
                                             <h3>Thông tin khách hàng</h3>
                                             <table>
                                                <tbody>
                                                   <tr>
                                                      <td>Tên khách hàng: </td>
                                                      <td>{{$info->tst_name}}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Địa chỉ email: </td>
                                                      <td><a href="mailto:{{$info->tst_email}}" target="_blank">{{$info->tst_email}}</a></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Điện thoại: </td>
                                                      <td>{{$info->tst_phone}}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Địa chỉ: </td>
                                                      <td>{{$info->tst_address}}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Khách hàng ghi chú: </td>
                                                      <td>{{$info->tst_note}}</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             <h3>Nội dung đặt hàng</h3>
                                             <table style="border-collapse:collapse;width:100%;color:rgb(51,51,51)" border="1">
                                                <tbody>
                                                   <tr style="background-color:rgb(255,204,0);font-weight:bold">
                                                      <td style="padding:4px">STT</td>
                                                      <td style="padding:4px">Mã sản phẩm</td>
                                                      <td style="padding:4px; width:30%;">Sản phẩm</td>
                                                      <td style="padding:4px">Số lượng</td>
                                                      <td style="padding:4px">Đơn giá</td>
                                                      <td style="padding:4px">Tổng tiền</td>
                                                   </tr>
                                                   @php
                                                    $i = 1;
                                                   @endphp
                                                   @foreach ($shopping as $key => $data)
                                                   <tr>
                                                      <td style="padding:4px">{{$i++}}</td>
                                                      <td style="padding:4px">{{$data->id}}</td>
                                                      <td style="padding:4px">
                                                         <a href="{{route('get.product.detail',$data->options->slug.'-'.$data->id)}}" target="_blank"><b>{{$data->name}}</b></a>
                                                      </td>
                                                      <td style="padding:4px">{{$data->qty}}</td>
                                                      <td style="padding:4px">{{$data->price}} <u>đ</u> </td>
                                                      <td style="padding:4px;font-weight:bold">
                                                         {{number_format($data->price * $data->qty ,0,',','.')}}<u>đ</u> 
                                                      </td>
                                                   </tr>
                                                   @endforeach
                                                   <tr>
                                                      <td colspan="5" align="right" style="padding:4px">
                                                         Tổng tiền
                                                      </td>
                                                      <td colspan="2" style="padding:4px;font-weight:bold;color:rgb(238,0,0)">
                                                         {{ \Cart::subtotal(0)}} <u>đ</u>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td style="min-height:1px;max-height:1px;height:1px;line-height:1px;background:rgb(179,228,252)"></td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </body>
</html>
