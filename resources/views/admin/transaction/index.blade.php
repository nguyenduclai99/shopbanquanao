@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Đơn Hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('get.admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.transaction.index')}}">Đơn Hàng</a></li>
                        <li class="breadcrumb-item active">Danh Sách</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email.." value="{{ Request::get('email') }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Phân Loại Khách Hàng:</label>
                                        <select name="type" class="form-control">
                                            <option value="">Phân loại khách</option>
                                            <option value="1" {{ Request::get('type') == 1 ? "selected='selected'" : ""}}>Thành Viên</option>
                                            <option value="2" {{ Request::get('type') == 2 ? "selected='selected'" : ""}}>Khách</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Trạng Thái Đơn Hàng:</label>
                                        <select name="status"  class="form-control">
                                            <option value="">Trạng thái</option>
                                            <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : ""}}>Tiếp Nhận</option>
                                            <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : ""}}>Đang giao</option>
                                            <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : ""}}>Đã giao</option>
                                            <option value="4" {{ Request::get('status') == 4 ? "selected='selected'" : ""}}>Đã hủy</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="button-padding d-inline-block">
                                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Lọc Đơn Hàng"><i class="fas fa-search"></i></button>
                                    </div>
                                    <div class="button-padding d-inline-block">
                                        <a href="{{Request::url()}}" class="btn btn-primary" data-toggle="tooltip" title="Làm mới"><i style="color: white;" class="fas fa-redo-alt"></i></a>
                                    </div>
                                    <div class="button-padding d-inline-block float-right">
                                        <button type="submit" name="export" value="true" class="btn btn-success" data-toggle="tooltip" title="Xuất File Excel"><i class="fas fa-file-excel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped projects" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Thông Tin</th>
                                    <th>Tổng Tiền</th>
                                    <th>Khách Hàng</th>
                                    <th>Trạng Thái</th>
                                    <th>Thời Gian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($transactions))
                                    @foreach ($transactions as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td style="text-align:left !important">
                                            <ul>
                                                <li>Tên: {{$data->tst_name}}</li>
                                                <li>Email: {{$data->tst_email}}</li>
                                                <li>SĐT: {{$data->tst_phone}}</li>
                                                <li>Địa Chỉ: {{$data->tst_address}}</li>
                                                <li>Ghi Chú: {{$data->tst_note}}</li>
                                            </ul>
                                        </td>
                                        <td>{{ number_format($data->tst_total_money,0,',','.') }}</td>
                                        <td>
                                            @if ($data->tst_user_id)
                                                <span class="btn btn-success btn-sm">Thành Viên</span>
                                            @else
                                                <span class="btn btn-secondary btn-sm">Khách</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn {{ $data->getStatus($data->tst_status)['class'] }} btn-sm">{{ $data->getStatus($data->tst_status)['name'] }}</button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn {{ $data->getStatus($data->tst_status)['class'] }} dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" title="Chuyển đổi trạng thái đơn hàng"></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('admin.action.transaction',['process',$data->id])}}">Đang giao</a>
                                                        <a class="dropdown-item" href="{{route('admin.action.transaction',['success',$data->id])}}">Đã giao</a>
                                                        <a class="dropdown-item" href="{{route('admin.action.transaction',['cancel',$data->id])}}">Đã Hủy</a>
                                                        <a class="dropdown-item" href="{{route('admin.action.transaction',['active',$data->id])}}">Tiếp Nhận</a>
                                                    </div>
                                                </div>
                                            </div>  
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a data-id="{{$data->id}}" href="{{route('ajax.admin.transaction.detail',$data->id)}}" class="btn btn-primary btn-sm viewProduct" data-toggle="modal" data-target="#previewProduct"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('admin.transaction.delete',$data->id)}}" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="previewProduct">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết đơn hàng <b id="idTransaction"></b> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function() {
        $('#data_table').DataTable({
           
        });
       
    });


    $(".viewProduct").click(function(event){
        event.preventDefault();
        let $this = $(this);
        let URL = $this.attr('href');
        let ID =  $this.attr('data-id');
        $("#idTransaction").html("#"+ID);

        $.ajax({
            method: "GET",
            url: URL
        })
        
        .done(function(results){
            $("#previewProduct .modal-body").html(results.html)
            $("#previewProduct").modal({
                show: true
            })
        });      
    });

    $('body').on("click",'.deleteOrderItem',function(event){
        event.preventDefault();
        let url = $(this).attr('href');
        let $this = $(this);

        $.ajax({
            method: "GET",
            url: url
        })

        .done(function(results){
            if (results.code == 200){
                $this.parent("tr").remove();
            }
            
        });
       
        $('#data_table').load(" #data_table");
        $('#order_table').load(" #order_table");
    });
</script>
@endsection