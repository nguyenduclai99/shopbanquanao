@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('get.admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.menu.index')}}">Menu</a></li>
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
                        <a class="btn btn-primary btn-sm" id="add_coursecontent" href="{{route('admin.menu.create')}}">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped projects" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Status</th>
                                    <th>Hot</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($menu))
                                    @foreach ($menu as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->mn_name}}</td>
                                        <td><img src="{{pare_url_file($data->mn_avatar)}}" alt="" width="80px" height="80px"></td>
                                        <td>
                                            @if ($data->mn_status == 1)
                                                <a href="{{route('admin.menu.active',$data->id)}}" class="btn btn-primary btn-sm">Show</a>
                                            @else
                                                <a href="{{route('admin.menu.active',$data->id)}}" class="btn btn-secondary btn-sm">Hide</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->mn_hot == 1)
                                                <a href="{{route('admin.menu.hot',$data->id)}}" class="btn btn-success btn-sm" >Active</a>
                                            @else
                                                <a href="{{route('admin.menu.hot',$data->id)}}" class="btn btn-secondary btn-sm">None</a>
                                            @endif
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.menu.update',$data->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a href="{{route('admin.menu.delete',$data->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-pencil-alt"></i> Delete</a>
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