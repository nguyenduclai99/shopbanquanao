@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Sản Phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('get.admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản Phẩm</a></li>
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
                                        <label for="name">Tên sản phẩm:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên.." value="{{ Request::get('name') }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Nhà Phân Phối:</label>
                                        <select name="distributor" class="form-control">
                                            <option value="">Nhà Phân Phối</option>
                                            @foreach ($distributor as $data)
                                                <option value="{{$data->id}}" {{ Request::get('distributor') == $data->id ? "selected='selected'" : ""}}>{{$data->d_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Danh Mục:</label>
                                        <select name="category" class="form-control">
                                            <option value="">Danh Mục</option>
                                            @foreach ($categories as $data)
                                                <option value="{{$data->id}}" {{ Request::get('category') == $data->id ? "selected='selected'" : ""}}>{{$data->c_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Trạng Thái Sản Phẩm:</label>
                                        <select name="status"  class="form-control">
                                            <option value="">Trạng thái</option>
                                            <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : ""}}>Active</option>
                                            <option value="0" {{ Request::get('status') == 0 ? "selected='selected'" : ""}}>None</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="button-padding d-inline-block">
                                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Lọc Sản Phẩm"><i class="fas fa-search"></i></button>
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
                        <a class="btn btn-primary btn-sm" href="{{route('admin.product.create')}}">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped projects" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th style="width:20%;">Name</th>
                                    <th style="width:10%;">Nhà Phân Phối</th>
                                    <th>Danh Mục</th>
                                    <th>Avatar</th>
                                    <th>Price</th>
                                    <th>Số Lượng</th>
                                    <th>Status</th>
                                    <th>Hot</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($products))
                                    @foreach ($products as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->pro_name}}</td>
                                        <td>{{$data->distributor->d_name}}</td>
                                        <td>{{$data->category->c_name ?? "[N\A]"}}</td>
                                        <td><img src="{{pare_url_file($data->pro_avatar)}}" alt="" width="100px" height="100px"></td>
                                        <td>
                                            @if ($data->pro_sale == 0)
                                                <span class="price-new">{{number_format($data->pro_price,0,',','.')}} VNĐ</span>
                                            @elseif($data->pro_sale)
                                                @php
                                                    $price = $data->pro_price - ((($data->pro_price) * $data->pro_sale) / 100);
                                                @endphp
                                                <span class="price-sale">Sale: {{ $data->pro_sale}} %</span>
                                                <br>
                                                <span class="price-old">{{number_format($data->pro_price,0,',','.')}} VNĐ</span>
                                                <br>
                                                <span class="price-new">{{number_format($price,0,',','.')}} VNĐ</span>
                                            @endif
                                        </td>
                                        <td>{{$data->pro_quantity}}</td>
                                        <td>
                                            @if ($data->pro_active == 1)
                                                <a href="{{route('admin.product.active',$data->id)}}" class="btn btn-primary btn-sm">Show</a>
                                            @else
                                                <a href="{{route('admin.product.active',$data->id)}}" class="btn btn-secondary btn-sm">Hide</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->pro_hot == 1)
                                                <a href="{{route('admin.product.hot',$data->id)}}" class="btn btn-success btn-sm" >Active</a>
                                            @else
                                                <a href="{{route('admin.product.hot',$data->id)}}" class="btn btn-secondary btn-sm">None</a>
                                            @endif
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.product.update',$data->id)}}" class="btn btn-info btn-sm editProduct"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a href="{{route('admin.product.delete',$data->id)}}" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-pencil-alt"></i> Delete</a>
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
<script>
    $(document).ready(function() {
        $('#data_table').DataTable({
            
        });
    } );
</script>
@endsection