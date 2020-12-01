@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Mới Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.menu.index')}}">Menu</a></li>
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
                            <div class="form-group" {{$errors->first('mn_name') ? 'has-error' : ''}}>
                              <label for="lessonname" class="control-label">Tên Menu <span class="text-danger">(*)</span></label>
                              <input type="text" class="form-control" id="mn_name" name="mn_name" placeholder="Nhập tên Menu" value="{{$menu->mn_name}}">
                              @if ($errors->first('mn_name'))
                                <span class="text-danger">{{ $errors->first('mn_name') }}</span>
                              @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mx-auto">
                                <a type="button" class="btn btn-danger" href="{{route('admin.menu.index')}}">Hủy</a>
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