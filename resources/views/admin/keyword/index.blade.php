@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Keyword</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('get.admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.keyword.index')}}">Keyword</a></li>
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
                        <a class="btn btn-primary btn-sm" id="add_coursecontent" href="{{route('admin.keyword.create')}}">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped projects" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mô tả</th>
                                    <th>Hot</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($keyword))
                                    @foreach ($keyword as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->k_name}}</td>
                                        <td>{{$data->k_description}}</td>
                                        <td>
                                            @if ($data->k_hot == 1)
                                                <a href="{{route('admin.keyword.hot',$data->id)}}" class="btn btn-success btn-sm" >Active</a>
                                            @else
                                                <a href="{{route('admin.keyword.hot',$data->id)}}" class="btn btn-secondary btn-sm">None</a>
                                            @endif
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.keyword.update',$data->id)}}" class="btn btn-info btn-sm editProduct"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a href="{{route('admin.keyword.delete',$data->id)}}" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-pencil-alt"></i> Delete</a>
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
    });
</script>
@endsection