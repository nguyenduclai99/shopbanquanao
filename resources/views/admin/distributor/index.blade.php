@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Nhà Phân Phối</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('get.admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.distributor.index')}}">Nhà Phân Phối</a></li>
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
                        <a class="btn btn-primary btn-sm" href="{{route('admin.distributor.create')}}">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped projects" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($distributor))
                                    @foreach ($distributor as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->d_name}}</td>
                                        <td><img src="{{$data->d_name}}" alt="" width="80px" height="80px"></td>
                                        <td>{{$data->d_description}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.distributor.update',$data->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a href="{{route('admin.distributor.delete',$data->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-pencil-alt"></i> Delete</a>
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