@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Nhà Phân Phối Hàng Seconhand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('get.admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.distributorseconhand.index')}}">Nhà Phân Phối</a></li>
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
                        <a class="btn btn-primary btn-sm" href="{{route('admin.distributorseconhand.create')}}">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped projects" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Thời gian tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($distributor))
                                    @foreach ($distributor as $k =>$data)
                                    <tr>
                                        <td>{{$k + 1}}</td>
                                        <td>{{$data->d_name}}</td>
                                        <td>{{$data->d_description}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.distributorseconhand.update',$data->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Sửa</a>
                                            <a href="{{route('admin.distributorseconhand.delete',$data->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-pencil-alt"></i> Xóa</a>
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
        $('#data_table').DataTable();
    } );
</script>
@endsection