@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Mới Keyword</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.keyword.index')}}">Keyword</a></li>
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
                            <div class="form-group" {{$errors->first('k_name') ? 'has-error' : ''}}>
                              <label for="k_name" class="control-label">Tên Keyword <span class="text-danger">(*)</span></label>
                              <input type="text" class="form-control" id="k_name" name="k_name" placeholder="Nhập tên keyword" value="{{$keyword->k_name}}">
                              @if ($errors->first('k_name'))
                                <span class="text-danger">{{ $errors->first('k_name') }}</span>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="k_description" class="control-label">Mô tả: <span class="text-danger">(*)</span></label>
                                <textarea type="text" class="form-control" id="k_description" name="k_description" placeholder="Mô tả">{{$keyword->k_description}}</textarea>
                                @if ($errors->first('k_description'))
                                  <span class="text-danger">{{ $errors->first('k_description') }}</span>
                                @endif
                              </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mx-auto">
                                <a type="button" class="btn btn-danger" href="{{route('admin.keyword.index')}}">Hủy</a>
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