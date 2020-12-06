@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Mới Nhà Phân Phối</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.distributorseconhand.index')}}">Nhà Phân Phối</a></li>
                        <li class="breadcrumb-item active">Sửa Mới</li>
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
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group" {{$errors->first('d_name') ? 'has-error' : ''}}>
                              <label for="d_name" class="control-label">Tên Nhà Phân Phối <span class="text-danger">(*)</span></label>
                              <input type="text" class="form-control" name="d_name" placeholder="Nhập Tên Nhà Phân Phối" value="{{$distributor->d_name}}">
                              @if ($errors->first('d_name'))
                                <span class="text-danger">{{ $errors->first('d_name') }}</span>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="d_description" class="control-label">Mô tả:</label>
                                <textarea style="height: 155px" type="text" class="form-control" name="d_description" placeholder="Mô tả">{{$distributor->d_description}}</textarea>
                                @if ($errors->first('d_description'))
                                <span class="text-danger">{{ $errors->first('d_description') }}</span> @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mx-auto">
                                <a type="button" class="btn btn-danger" href="{{route('admin.distributorseconhand.index')}}">Hủy</a>
                                <button type="submit" class="btn btn-primary">Lưu dữ Liệu</button>
                            </div>
                        </div>
                      </form>
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

@endsection