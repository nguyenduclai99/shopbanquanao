<table id="order_table" class="table table-condensed">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Tổng Tiền</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td><a href="">{{$data->product->pro_name ?? "[N\A]"}}</a></td>
                <td>
                    <img style="height:120px; width:200px;" src="{{pare_url_file($data->product->pro_avatar)}}" alt="">
                </td>
                <td>{{ number_format($data->od_price,0,',','.')}} VNĐ</td>
                <td>{{ $data->od_qty}}</td>
                <td>{{ number_format($data->od_price * $data->od_qty,0,',','.')}} VNĐ</td>
                <td>
                    <a href="{{ route('ajax.admin.transaction.order_item',$data->id)}}" class="btn btn-danger btn-sm deleteOrderItem"><i class="fas fa-trash-alt"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>